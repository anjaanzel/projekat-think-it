<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Role;
use App\User;
use App\Notification;

class NotificationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function create()
    {
        $roles = Role::orderBy('name','asc')->get();

        return view('admin.notifications.create')->with([
            'roles' => $roles
        ]);
    }


    public function store(Request $request)
    {
        $notificaion = new Notification();
        $notificaion->content = $request->input('content');
        $notificaion->save();


        $roles = $request->input('roles');

        $notificaion->role()->attach($roles);



        $users = User::whereHas('role', static function ($query) use ($roles) {
                    return $query->whereIn('id', $roles);
                })->get('id');
     

        $notificaion->user()->attach($users);
        return redirect()->route('admin.notifications.create');

    }


}
