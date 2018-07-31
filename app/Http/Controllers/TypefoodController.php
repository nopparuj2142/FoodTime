<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Typefood;

class TypefoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typefood = Typefood::all();
        
        return view('managetype.typefood.managetypefood')->with('typefood',$typefood);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('managetype.typefood.createtypefood');
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
        $insert = new Typefood;
        $insert->typename = $request->typename;
        $insert->save();
        return redirect('typefood');
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
        $typefood = Typefood::find($id);
        return view('managetype.typefood.edittypefood',compact('typefood'));
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
        $typefood = Typefood::find($id);
        $typefood->typename = $request->typename;
        $typefood->Save();
        return redirect('typefood');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $typefood = Typefood::find($id);
        $typefood->delete();
        return redirect('typefood');
    }
}
