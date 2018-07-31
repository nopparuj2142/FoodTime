<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use App\Food;
use App\Typestore;
use App\Blog;
use Image;
use Storage;
use DB;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = DB::table('blogs')
        ->where('blogs.id_user','=',auth()->user()->id)
        ->join('stores','blogs.id_store','=','stores.id_store')
        ->select('blogs.*','stores.namestore')
        ->get();
        $s = count($blogs);
        // dd($s);


        return view('blog.manageblog', compact('blogs','s'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stores.store');
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
            'comment'=>'Required'
        ]);
        
        $insert = new Blog;
        $insert->id_user = auth()->user()->id;
        $insert->id_store = $request->id_store;
        $insert->comment = $request->comment;
        $insert->save();
        return back();
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
        $blog = Blog::find($id);
        return view('blog.editblog', compact('blog'));
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
            'comment'=>'Required'
        ]);
        $blog = Blog::find($id);
        $blogUpdate = $request->all();
        $blog->update($blogUpdate);
        return redirect('blog');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        return redirect('blog');
    }
}
