<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use App\Food;
use App\Typefood;
use Image;
use DB;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typefood = Typefood::all();
        return view('foods.createfood')->with('default','default.jpg')->with('typefood',$typefood);
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
            'namefood'=>'required',
            'detail'=>'required'
        ]);
        $insert = new Food;
        $insert->id_store = $request->id_store;
        $insert->id_typefood = $request->type;
        $insert->namefood = $request->namefood;
        $insert->detail = $request->detail;
        if($request->hasfile('picfood')){
            $picfood = $request->file('picfood');
            $filename = time() . '.' . $picfood->getClientOriginalExtension();
            Image::make($picfood)->resize(750,450)->save(public_path('uploads/foodpicture/' . $filename));
 
            $insert->picturefood = $filename;
        }
        $insert->save();
        return redirect()->action('FoodController@show',['id_store' => $request->id_store]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_store)
    {
        $food = Food::orderBy('created_at','detail')
        ->where('id_store','=',$id_store)
        ->get();
        return view('foods.myfood', compact('food','id_store'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $food = Food::find($id);
        return view('foods.editfood', compact('food'));
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
            'namefood'=>'Required',
            'detail'=>'Required'
        ]);
        $food = Food::find($id);
        $food->namefood = $request->namefood;
        $food->detail = $request->detail;

       if($request->hasfile('picfood')){
            $picfood = $request->file('picfood');
            $filename = time() . '.' . $picfood->getClientOriginalExtension();
            Image::make($picfood)->resize(750,450)->save(public_path('uploads/foodpicture/' . $filename));
            $food->picturefood = $filename;

        }
        $food->save();
        $select_food = Food::where('id','=',$id)->first();
        return redirect()->action('FoodController@show',['id_store' => $select_food->id_store]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $select_food = Food::where('id','=',$id)->first();
        $food = Food::find($id);
        // dd($food);
        $food->delete();
        return redirect()->action('FoodController@show',['id_store' => $select_food->id_store]);
    }
    /**
     * Show FoodList
     */
    public function foodlist(){
        
        $foodlist = DB::table('foods')
        ->join('stores','foods.id_store','=','stores.id_store')
        ->select('foods.*','stores.status')
        ->where('stores.status','=',1)
        ->paginate(4);

        $s = count($foodlist);

        return view('foodslist')->with('foodlist',$foodlist)->with('s',$s);

    }
    /**
     * Show FoodList Index Form
     */
    public function navfoodlist(){
        
        $navfoodlist = DB::table('foods')
        ->join('stores','foods.id_store','=','stores.id_store')
        ->select('foods.*','stores.status')
        ->where('stores.status','=',1)
        ->paginate(4);
        return view('dashboard')->with('navfoodlist',$navfoodlist);

    }
    // public function navstorelist(){
        
    //     $navstorelist = store::paginate(4);
    //     return view('dashboard')->with('navstorelist',$navstorelist);

    // }

    public function create_food($create_food)
    {
        $typefood = Typefood::all();
        return view('foods.createfood')->with('default','default.jpg')->with('id_store',$create_food)->with('typefood',$typefood);
    }

    // public function show_id_stroe($id){
    //     $select_food = Food::where('id','=',$id)->first();
    //     return $select_food->id_store;
    // }
    
    //show store single form list
    public function formlist($id)
    {   
        $select = DB::table('foods')
        ->join('stores','foods.id_store','=','stores.id_store')
        ->join('typefoods','foods.id_typefood','=','typefoods.id')
        ->where('foods.id','=',$id)
        ->select('foods.*','typefoods.typename','stores.id_store','stores.namestore')
        ->get();
        // dd($select);
        return view('foods.food',compact('select'));
    }

}
