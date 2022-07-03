<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePassword;
use App\Http\Requests\StoreCompleteRegistration;
use App\Models\PasswordReset;
use App\Notifications\ResetPasswordEmail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;

class AuthController extends SharedBaseController
{
    public function loginForm(){
        return view('auth.login');
    }

    public function changePasswordForm(){
        return view('auth.change-password');
    }

    public function forgotPassword(){
        return view('auth.forgot-password');
    }

    public function sendResetLink(Request $request){
        $user = User::whereEmail($request->email)->first();
        if(!isset($user)){
            $user = new User(['email' => $request->email]);
        }else{
            $reset = PasswordReset::create([
                'user_id' => $user->id,
                'token' => "token-".Str::random(45),
                'used' => 0
            ]);
            try {
                Notification::send($user, new ResetPasswordEmail($reset));
            } catch (\Throwable $th) {
                //throw $th;
                logger("failed_to_send_reset_link", [$th->getMessage()]);
                return redirect()->back()->withErrors(['error' => 'A Network Error occurred. Please try again.']);
            }
        }

        return back()->with([
            "message" => "A reset link has been sent to your email address."
        ]);
    }

    public function resetPassword($token){
        $reset = PasswordReset::whereUsedAndToken(0, $token)->first();
        abort_if(!isset($reset), 404);
        abort_if($reset->tokenExpired(), 403, "Token Expired");
        return view('auth.reset-password', compact('token'));
    }

    public function storeResetPassword(StoreCompleteRegistration $request){
        $reset = PasswordReset::whereUsedAndToken(0, $request->token)
            ->with('user')
            ->first();
        abort_if(!isset($reset->user), 404);
        $reset->user()->update(['password' => bcrypt($request->password)]);
        $reset->update(['used' => 1, 'token' => null]);
        Auth::loginUsingId($reset->user->id, true);
        return redirect(route('members-area.home'));
    }

    public function changePassword(ChangePassword $request){
        $user = User::find(Auth::id());
        $user->password = bcrypt($request->new_password);
        $user->save();
        return back()->with([
            "message" => "Password updated successfully"
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('login'));
    }

    public function login(Request $request){
        $credentials = $request->only('email', 'password');
        if($request->password=="password"){
            return redirect()->route('forgot.password');
        }

        if (Auth::attempt($credentials, true)) {
            return redirect()->intended('member');
        }
        return back()->withErrors(["message" => "Invalid Credentials"]);
    }


}
