<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class SharedBaseController extends Controller
{
    protected $user;



    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            $this->setShared();
            return $next($request);
        });
    }

    public function setShared()
    {
        if(!$this->user) return;
        $nav_links = json_encode($this->getNavLinks());

        $is_admin = $this->user->hasRole('admin');
        if(!$is_admin) $is_admin = $this->user->hasRole('board_member');
        $shared = [
            "avatar" => $this->user->avatar(),
            "name" => $this->user->name,
            "id" => $this->user->id,
            "home" => $is_admin ? route("voyager.dashboard") : route("members-area.home"),
            "is_admin" => $is_admin,
            "logout" => route('logout'),
            "base" => url('/')."/",
            "donated_count" => 0,
            "balance" => 0,
        ];

        try {
            $shared['donated_count'] = $is_admin ? 0 : $this->user->memberDetails->donated_count;
            $shared['balance'] = $is_admin ? 0 : $this->user->memberDetails->balance;
        } catch (\Throwable $th) { }

        $user = json_encode($shared);

        $member = (object) $shared;

        View::share(compact('user', 'member', 'nav_links'));
    }

    public function getNavLinks(){
        return [
            [
                "name" => "Dashboard",
                "route" => route('members-area.home'),
                "icon" => "nc-bank"
            ],
            [
                "name" => "Obituaries",
                "route" => route('members-area.obituary'),
                "icon" => "nc-sound-wave"
            ],
            [
                "name" => "Deposits",
                "route" => route('members-area.deposits'),
                "icon" => "nc-share-66"
            ],
            [
                "name" => "Payments",
                "route" => route('members-area.payments'),
                "icon" => "nc-money-coins"
            ],
            [
                "name" => "Member Profile",
                "route" => route('members-area.profile'),
                "icon" => "nc-circle-10"
            ],
            [
                "name" => "Next of Kin",
                "route" => route('members-area.nok'),
                "icon" => "nc-single-02"
            ],
            [
                "name" => "Nominees",
                "route" => route('members-area.nominees'),
                "icon" => "nc-favourite-28"
            ],
            [
                "name" => "Notifications",
                "route" => route('members-area.notifications'),
                "icon" => "nc-bell-55"
            ],
            [
                "name" => "Change Password",
                "route" => route('members-area.password'),
                "icon" => "nc-key-25"
            ]
        ];
    }
}
