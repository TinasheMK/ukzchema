<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationController extends SharedBaseController
{
    public function index(){
        $member = Auth::user()->memberDetails;
        $all = null;
        $admin = null;
        $payment = null;
        $obituary = null;
        if (isset($member)) {
            $all = $member->notifications;
            $admin = $this->filterType($all, "admin");
            $payment = $this->filterType($all, "payment");
            $obituary = $this->filterType($all, "obituary");
        }
        return view('notifications.index', compact('all', 'admin', 'payment', 'obituary'));
    }

    private function filterType($notifications, $type){
        return $notifications->filter(function ($notification) use ($type){
            return notification_type($notification->type) === $type;
        });
    }

    private function getUserNotification($id){
        $member = Auth::user()->memberDetails;
        abort_if(!isset($member), 403, 'Account not Found');

        $notification = $member->notifications()->whereId($id)->first();

        abort_if(!isset($notification), 404);
        return $notification;
    }

    public function show($id)
    {
        
        $notification = $this->getUserNotification($id);
        $notification->markAsRead();
        return view('notifications.read', 
            ['notification' => $notification->data, 'notif_id' => $id]);
    }

    public function destroy($id)
    {
        $notification = $this->getUserNotification($id);
        $notification->delete();
        return redirect(route('members-area.notifications'));
    }
}
