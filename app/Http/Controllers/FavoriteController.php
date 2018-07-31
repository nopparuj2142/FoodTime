<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use App\Food;
use App\Typestore;
use App\Favorite;
use App\Blog;
use Image;
use Storage;
use DB;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $favoritelist = DB::table('favorites')
        ->join('stores','favorites.id_store','=','stores.id_store')
        ->where('favorites.id_user','=',auth()->user()->id)
        ->select('favorites.*','stores.*')
        ->paginate(4);
        $ct = count($favoritelist);
        // dd($favoritelist);
        return view('favorite.managefavorite', compact('favoritelist','ct'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $favorite = Favorite::find($id);
        $favorite->delete();
        return back();
    }

        public function add_favorite(Request $request, $id_store)
    {
        // dd($id_store);
        $insert = new Favorite;
        $insert->id_store = $request->id_store;
        $insert->id_user = auth()->user()->id;
        $insert->save();
        return back();
    }
}
