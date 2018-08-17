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
use Auth;
use App\Favorite;


class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // $stores = Store::all();
        $stores = Store::orderBy('created_at','detail')
        ->where('id_user','=',auth()->user()->id)
        ->get();
        $ct = count($stores);
        
        return view('stores.mystore', compact('stores','ct'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $typestore = Typestore::all();
        return view('stores.createstore')->with('default','default.jpg')->with('typestores',$typestore);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->type);
        $this->validate($request,[
            'namestore'=>'required',
            'detail'=>'required',
            'address'=>'required',
            'timeopen'=>'required',
            'timeclose'=>'required',
            'urlvideo'=>'required'
        ]);
        $insert = new Store;
        $insert->id_user = auth()->user()->id;
        $insert->id_typestore = $request->type;
        $insert->namestore = $request->namestore;
        $insert->detail = $request->detail;
        $insert->address = $request->address;
        $insert->timeopen = $request->timeopen;
        $insert->timeclose = $request->timeclose;
        $insert->urlvideo = $request->urlvideo;
        $insert->lat = $request->lat;
        $insert->lng = $request->lng;
        $insert->urlvideo = $request->urlvideo;
        if($request->hasfile('picstore')){
            $picstore = $request->file('picstore');
            $filename = time() . '.' . $picstore->getClientOriginalExtension();
            Image::make($picstore)->resize(750,450)->save(public_path('uploads/profilestore/' . $filename));
            $insert->profilestore = $filename;
            

        }
        $insert->save();
        return redirect('stores');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //dd($id);
        
        $select = DB::table('stores')
        ->join('typestore','stores.id_typestore','=','typestore.id')
        ->where('stores.id_store','=',$id)
        ->select('stores.*','typestore.typename')
        ->first();
        // dd($select);
        

        $foods = Food::where('id_store','=',$id)
        ->paginate(4);

        $blogs = DB::table('blogs')
        ->join('stores','blogs.id_store','=','stores.id_store')
        ->join('users','blogs.id_user','=','users.id')
        ->where('blogs.id_store','=',$id)
        ->select('blogs.*','users.name')
        ->paginate(5);
        // dd($blogs);

        $ctb = count($blogs);

        if (Auth::guest()) {
            //
        } else {
            $check  = Favorite::where('id_store','=',$id)
            ->where('id_user','=',auth()->user()->id)

            ->get();
            // dd($check);
            if(count($check) > 0 ){
                $sttfvr = "yes";
            }else{
                $sttfvr = "no";
            }
        }
        
        

        return view('stores.store',compact('select','foods','blogs','sttfvr','ctb'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

   
        $select = DB::table('stores')
        ->join('typestore','stores.id_typestore','=','typestore.id')
        ->where('stores.id_store','=',$id)
        ->select('stores.*','typestore.typename')
        ->first();
        $typestores = Typestore::all();
        // dd($select);

        return view('stores.editstore', compact('select','typestores'));
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
            'namestore'=>'Required',
            'detail'=>'Required',
            'urlvideo'=>'Required',
            'address'=>'Required',
            'timeopen'=>'Required',
            'timeclose'=>'Required',
            'urlvideo'=>'Required'
        ]);
        // $store = Store::where('stores.id_store','=',$id)->first();
        
        // $store->namestore = $request->namestore;
        // $store->detail = $request->detail;
        // $store->address = $request->address;
        // $store->id_typestore = $request->type;
        // $store->lat = $request->lat;
        // $store->lng = $request->lng;

        

        $image = null;
        if($request->hasfile('picstore')){
            $picstore = $request->file('picstore');
            $filename = time() . '.' . $picstore->getClientOriginalExtension();
            Image::make($picstore)->resize(750,450)->save(public_path('uploads/profilestore/' . $filename));
            
            $image = $filename;
            // $store->profilestore = $filename;

        }
        // $store->save();

        
        $store = Store::where('id_store',$id)
            ->update([
                'namestore' => $request->namestore,
                'detail' => $request->detail,
                'urlvideo' => $request->urlvideo,
                'address' => $request->address,
                'timeopen' => $request->timeopen,
                'timeclose' => $request->timeclose,
                'id_typestore' => $request->type,
                'lat' => $request->lat,
                'lng' => $request->lng,
                'profilestore' => $image,
                'urlvideo' => $urlvideo
            ]);
        return redirect('stores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $foods = Food::where('id_store',$id)
        ->delete();
        // $store = Store::find($id);
        $store = Store::where('stores.id_store','=',$id)->first();
        dd($store);
        $store->delete();
        return redirect('stores');
    }
    /**
     * Show StoreList 
     */
    public function storelist(){
        
        $storelist = store::where('stores.status','=',1)->paginate(4);
        $ct = count($storelist);
        return view('storeslist')->with('storelist',$storelist)->with('ct',$ct);

    }

}
    //***TEST JOIN TABLE***
    //$users = DB::table('foods')
    //->join('stores', 'foods.id_store', '=', 'stores.id')
    //->select('foods.*', 'stores.namestore')
    //->get();