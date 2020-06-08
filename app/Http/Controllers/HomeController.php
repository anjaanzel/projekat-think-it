<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Notification;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $notifications = Auth::user()->notifications()->orderBy('created_at', 'desc')->get();
        return view ('home')->with('notifications', $notifications);
    }


     /**
     * Mark the notification as read.
     *
     * @return void
     */
    public function markAsRead($id)
    {   
        $notification = Notification::find($id);

        if (is_null($notification->user()->where('user_id', Auth::user()->id)->first()->pivot->read_at)) {
            $notification->user()->where('user_id', Auth::user()->id)->first()->pivot->forceFill(['read_at' => $notification->user()->where('user_id', Auth::user()->id)->first()->pivot->freshTimestamp()])->save();
        }

        return redirect()->route('home');
    }

    /**
     * Mark the notification as unread.
     *
     * @return void
     */
    public function markAsUnread()
    {
        if (! is_null($this->read_at)) {
            $this->forceFill(['read_at' => null])->save();
        }
    }
}
