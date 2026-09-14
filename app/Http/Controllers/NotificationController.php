<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{

    public function markAsRead(){
        auth()->user()->unreadNotifications->markAsRead();
        $notification = array(
            'message' => __('app.messages.notifications_marked_read'),
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }

    public function read(){
        auth()->user()->unreadNotifications->markAsRead();
        $notification = array(
            'message' => __('app.messages.notification_marked_read'),
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }


    public function destroy($id)
    {
        auth()->user()->notifications()->delete();
        $notification = array(
            'message' => __('app.messages.notification_deleted'),
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }
}
