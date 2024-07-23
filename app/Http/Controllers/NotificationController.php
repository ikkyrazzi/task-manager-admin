<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the notifications.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $notifications = Notification::with('user')->get();
        return view('notifications.index', compact('notifications'));
    }

    /**
     * Show the form for creating a new notification.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('notifications.create');
    }

    /**
     * Store a newly created notification in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'type' => 'required|in:task_assigned,task_completed,comment_added',
            'data' => 'required|json',
        ]);

        Notification::create($request->all());

        return redirect()->route('notifications.index')->with('success', 'Notification created successfully.');
    }

    /**
     * Display the specified notification.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $notification = Notification::with('user')->findOrFail($id);
        return view('notifications.show', compact('notification'));
    }

    /**
     * Remove the specified notification from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->delete();

        return redirect()->route('notifications.index')->with('success', 'Notification deleted successfully.');
    }
}