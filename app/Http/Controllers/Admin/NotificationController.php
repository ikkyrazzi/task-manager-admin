<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::all();
        return view('_admins.notifications.index', compact('notifications'));
    }

    public function show($id)
    {
        if (is_null($notification->read_at)) {
            $notification->update(['read_at' => now()]);
        }
        
        return view('_admins.notifications.show', compact('notification'));
    }

    public function destroy($id)
    {
        $notification->delete();

        return redirect()->route('_admins.notifications.index');
    }
}
