<?php

use App\Models\BoardMember;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;


Route::group(['middleware' => ['guest']], function () {
    Route::get('/', function () {
        $testimonials = Testimonial::whereShow(1)->get();
        $board_members = BoardMember::all();
        return view('splash',compact('testimonials', 'board_members') );
    })->name("splash");
    Route::get('/login', 'AuthController@loginForm')->name('login');
    Route::post('/login', 'AuthController@login');
    Route::get('/forgot-password', 'AuthController@forgotPassword')->name('forgot.password');
    Route::post('/forgot-password', 'AuthController@sendResetLink');

    Route::get('/reset-password/{token?}', 'AuthController@resetPassword')->name('reset.password');
    Route::post('/reset-password', 'AuthController@storeResetPassword');

    Route::get('/join-now', 'ApplicantController@form')->name('apply');
    Route::get('/submitted-{code}', 'ApplicantController@submitted')->name('submitted');
    Route::get('/complete/{applicant?}', 'ApplicantController@completeRegForm')->name('applicant.complete');
    Route::post('/complete', 'ApplicantController@complete');

});


/**
 * New user when they clicked apply
 */
Route::get('/contact-us/{subject?}', 'ContactUsController@form')->name('contact.us');
Route::post('/contact-us', 'ContactUsController@store');
Route::get('/about-us', 'AboutUsController@index')->name('about.us');
Route::get('/constitution', 'ConstitutionController@index')->name('constitution');

Route::get('/account','AccountController@index')->name('account.index');
Route::get('/account/next-of-kin', 'AccountController@nextOfKinForm')->name('account.nextofkin');
Route::get('/account/notifications', 'AccountController@notificationsForm')->name('account.notifications');
Route::get('/account/change-password', 'AccountController@changePasswordForm')->name('account.cpassword');


Route::group(['prefix' => 'admin'], function () {
    Route::post('/reject-applicant','ApplicantController@reject')->name("applicant.reject");
    Route::post('/accept-applicant', 'ApplicantController@accept')->name("applicant.accept");
    Voyager::routes();
});

Route::group(['middleware' => ['auth', /*'role:member'*/], "prefix" => "member"], function () {
    Route::get('/', 'MemberController@index')->name('members-area.home');
    Route::get('/obituaries', 'ObituaryController@index')->name('members-area.obituary');
    Route::get('/obituaries/{obituary}', 'ObituaryController@show')->name('members-area.obituary-show');

    Route::get('/payments', 'DonationsController@index')->name('members-area.payments');
    Route::post('/payments', 'DonationsController@store')->name('members-area.submit_donation');
    Route::get('/deposits', 'DepositController@index')->name('members-area.deposits');
    Route::post('/deposit', 'DepositController@store')->name('members-area.submit_deposit');

    Route::get('/member-profile', 'ProfileController@index')->name('members-area.profile');
    Route::post('/member-profile', 'ProfileController@update');

    Route::get('/next-of-kin', 'NextofKinController@index')->name('members-area.nok');
    Route::post('/next-of-kin', 'NextofKinController@update');
    Route::get('/notifications', 'NotificationController@index')->name('members-area.notifications');
    Route::get('/notifications/{notification}', 'NotificationController@show')->name('members-area.notifications.show');
    Route::get('/delete-notification/{notification}', 'NotificationController@destroy')->name('members-area.notifications.delete');

    Route::get('/nominees', 'NomineeController@index')->name('members-area.nominees');
    Route::post('/nominees', 'NomineeController@update');
    Route::delete('/nominees/{nominee}', 'NomineeController@destroy');

    Route::get('/change-password', 'AuthController@changePasswordForm')
        ->name('members-area.password');
    // ->middleware(['password.confirm']);
    // Route::get('/confirm-password', 'ApplicantController@confirmPassword')->name('password.confirm');
    Route::post('/change-password', 'AuthController@changePassword');

    Route::get('/logout', 'AuthController@logout')->name('logout');
});