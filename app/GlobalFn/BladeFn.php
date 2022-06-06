<?php

use App\Models\BoardMember;
use App\Models\Member;

function ses($var){
    return session($var);
}

function target_group($group)
{
    $members = null;
    switch ($group) {
        case 'all':
            $members = Member::all();
            break;
        case 'board_members':
            $members = BoardMember::all()->map(function ($board_member ){
                return $board_member->member;
            });
            break;
        case 'non_board_members':
            $board_members_ids = BoardMember::pluck('member_id');
            $members = Member::all()->diff(Member::whereIn('id', $board_members_ids)->get());
            break;
        default:
            $members = Member::whereMemberId("Non-Existent")->get();
            break;
    }
    return $members;
}

function str_limit($string, $len = 150){
    return \Illuminate\Support\Str::limit($string, $len);
}

/**
 * Returns type of notification
 */
function notification_type($n_type){
    logger($n_type);
    $type = null;
    switch ($n_type) {
        case 'App\Notifications\AdminNotification':
            $type = 'admin';
            break;
        case 'App\Notifications\ObituaryAddedNotification':
            $type = 'obituary';
            break;
        case 'App\Notifications\NewDonationReceived':
            $type = 'payment';
            break;
        default:
            # code...
            break;
    }
    return $type;
}

function format_date($date, $format = "d-m-Y"){
    return date($format, strtotime($date));
}
