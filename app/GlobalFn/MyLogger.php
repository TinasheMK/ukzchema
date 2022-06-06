<?php

use App\Notifications\TelegramLogger;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

function my_log($title, $message){
    logger("Failed to send notifications", [$message]);
    $user = Auth::user() ?? new User(['email' => "admin@ukz.co.uk","id"=>0, "name" => "Not Logged In"]);
    Notification::send($user, new TelegramLogger($title, $message));
}