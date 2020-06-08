<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Ship;

class ShipsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $ships = Ship::all();
        return view ('admin.ships.index')->with('ships', $ships);
    }


    public function create()
    {

        return view('admin.ships.create');
    }

    public function store(Request $request)
    {


        $ship = new Ship();
        $ship->name = $request->input('name');
        $ship->serial_no = $request->input('serial_no');
        
        // if( $request->hasFile('image') ){
            
        //     //get filename with extension
        //     $filenameWithExt = $request->file('image')->getClientOriginalName();
            
        //     //get just filename
        //     $filename = pathInfo($filenameWithExt,PATHINFO_FILENAME);
            
        //     // get just extension
        //     $extension = $request->file('image')->getClientOriginalExtension();
            
        //     $fileNameToStore = $filename.'.'.$extension;
            
        //     //upload the image
        //     $path = $request->file('image')->storeAs('/img/ships',$fileNameToStore);
        //     $ship->image = $fileNameToStore;
        // }
        
  

        $ship->image = time().'.'.request()->file('image')->getClientOriginalExtension();



        request()->file('image')->move(public_path('img/ships'), $ship->image);


        $ship->save();


         return redirect()->route('admin.ships.index');
    }

    public function edit(Ship $ship)
    {

        return view('admin.ships.edit')->with([

            'ship' => $ship


        ]);
    }

    public function update(Request $request, Ship $ship)
    {
        $ship->name = $request->input('name');
        $ship->serial_no = $request->input('serial_no');
        

        // if( $request->hasFile('image') ){
            
        //     //get filename with extension
        //     $filenameWithExt = $request->file('image')->getClientOriginalName();
            
        //     //get just filename
        //     $filename = pathInfo($filenameWithExt,PATHINFO_FILENAME);
            
        //     // get just extension
        //     $extension = $request->file('image')->getClientOriginalExtension();
            
        //     $fileNameToStore = $filename.'.'.$extension;
            
        //     //upload the image
        //     $path = $request->file('image')->storeAs('/img/ships',$fileNameToStore);
        //     $ship->image = $fileNameToStore;
        // }
        
        
        $ship->image = time().'.'.request()->file('image')->getClientOriginalExtension();



        request()->file('image')->move(public_path('img/ships'), $ship->image);


        $ship->save();

        return redirect()->route('admin.ships.index');
    }

    public function destroy(Ship $ship)
    {

        $ship->delete();

        return redirect()->route('admin.ships.index');
    }
}