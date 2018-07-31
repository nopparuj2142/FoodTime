<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Typestore;

class TypestoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typestore = Typestore::all();
        
        return view('managetype.typestore.managetypestore')->with('typestore',$typestore);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('managetype.typestore.createtypestore');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'typename'=>'required'
        ]);
        $insert = new Typestore;
        $insert->typename = $request->typename;
        $insert->save();
        return redirect('typestore');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $typestore = Typestore::find($id);
        return view('managetype.typestore.edittypestore',compact('typestore'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'typename'=>'required'
        ]);
        $typestore = Typestore::find($id);
        $typestore->typename = $request->typename;
        $typestore->save();
        return redirect('typestore');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $typestore = Typestore::find($id);
        $typestore->delete();
        return redirect('typestore');
    }
}
