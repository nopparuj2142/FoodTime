<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use App\Food;
use App\Typefood;
use App\Typestore;
use Image;
use DB;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = Store::where('stores.status','=',1)->paginate(4);
        $foods = DB::table('foods')
        ->join('stores','foods.id_store','=','stores.id_store')
        ->select('foods.*','stores.status')
        ->where('stores.status','=',1)
        ->paginate(4);

        $ct1 = count($stores);
        $ct2 = count($foods);
        
        return view('home')
        ->with('stores',$stores)
        ->with('ct1',$ct1)
        ->with('ct2',$ct2)
        ->with('foods',$foods);;
    }
}
