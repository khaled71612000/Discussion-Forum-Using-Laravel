<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function notifications () {
        // mark all as read
        auth() -> user() -> unreadNotifications->markAsRead();

        return view('users.notifications',[
            // dont use relation use builder
            'notifications' => auth() -> user()->notifications()->paginate(5)
        ]);
    }
}
