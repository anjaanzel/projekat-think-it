<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Gate;
use App\User;
use App\Role;
use App\Ship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail; 
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        return view ('admin.users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::orderBy('name','asc')->get();
        $ships = Ship::orderBy('name','asc')->get();

        return view('admin.users.create')->with([
            'roles' => $roles,
            'ships' =>$ships
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public static $createUrlCallback;
    public function store(Request $request)
    {

        $user = new User();

        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->email = $request->input('email');
        $user->role_id = $request->input('role');
        $user->ship_id = $request->input('ship');
        $to_name = $request->input('name');
        $to_email = $request->input('email');
        
        $token = app('auth.password.broker')->createToken($user);
        if (static::$createUrlCallback) {
            $url = call_user_func(static::$createUrlCallback, $notifiable, $this->token);
        } else {
            $url = url(route('password.reset', [
                'token' => $token,
                'email' => $to_email,
            ], false));
        }

        

        $data = array('name'=>$to_name, "body" => "Test mail", 'url'=>$url);
        

        Mail::send('email', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                ->subject('Registration link');
            $message->from('anjatestprojekat@gmail.com','Admin Team');
        });

        $user->save();

        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if(Gate::denies('edit-users')){
            return redirect(route('admin.users.index')); 
        }

        $roles = Role::all();
        $ships = Ship::all();

        return view('admin.users.edit')->with([
            'user' => $user,
            'ships' => $ships,
            'roles' => $roles

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->email = $request->input('email');
        $user->role_id = $request->input('role');
        $user->ship_id = $request->input('ship');
        $user->save();

        return redirect()->route('admin.users.index');
    }


    public function inputPassword($user)
    {
        return view ('password')->with('user', $user);
    }


    public function updatePassword(Request $request, User $user)
    {
        $user->password = $request->input(Hash::make('password'));
        $user->save();

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if(Gate::denies('delete-users')){
            return redirect(route('admin.users.index')); 
        }

        $user->delete();

        return redirect()->route('admin.users.index');
    }
}
