<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Role;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $roles = Role::where('name', '!=', 'admin')->get();
        return view ('admin.roles.index')->with('roles', $roles);
    }


    public function create()
    {

        return view('admin.roles.create');
    }

    public function store(Request $request)
    {
        $role = new Role();
        $role->name = $request->input('name');

  		
        $role->save();


         return redirect()->route('admin.roles.index');
    }

    public function edit(Role $role)
    {

        return view('admin.roles.edit')->with([

            'role' => $role


        ]);
    }

    public function update(Request $request, Role $role)
    {
        $role->name = $request->input('name');

  

        $role->save();

        return redirect()->route('admin.roles.index');
    }

    public function destroy(Role $role)
    {

        $role->delete();

        return redirect()->route('admin.roles.index');
    }
}
