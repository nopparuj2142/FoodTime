<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Store;
use App\Food;
use App\Typestore;
use App\Blog;
use App\Favorite;
use Image;
use Storage;
use DB;
use Auth;


class SearchController extends Controller
{
    public function indexstore()
    {
        return view('search.searchstore');
    }

public function indexfood()
    {
        return view('search.searchfood');
    }
    
    public function search(Request $request)
    {
        if ($request->ajax())
        {
            $output="";
            $stores=DB::table('stores')
            ->where('namestore','LIKE','%'.$request->search.'%')
            ->get();
            if ($stores)
            {
                foreach ($stores as $key => $store) {
                    $output.=
                    '<tbody>'.
                        '<tr>'.
                        '<td>'.$store->namestore.'</td>'.
                        '<td>'.$store->detail.'</td>'.
                        '<td><a class="btn btn-primary" href="#" role="button">ดูเพิ่มเติม &raquo;></a></td>'.
                        '</tr>'.
                    '</tbody>';
                }
                return Response($output);
            }
        }
    }

    public function search_get_store(Request $request)
    {
        if ($request->ajax())
        {
            $output="";
            $stores=DB::table('stores')
            ->where('stores.status','=',1)
            ->where('namestore','LIKE','%'.$request->search.'%')
            ->get();
            if ($stores)
            {
                foreach ($stores as $key => $store) {
                    $output.='<tbody>'.
                        '<tr>'.
                        '<td>'.$store->namestore.'</td>'.
                        '<td>'.$store->detail.'</td>'.
                        '<td><a class="btn btn-primary" href="#" role="button">ดูเพิ่มเติม &raquo;></a></td>'.
                        '</tr>'.
                    '</tbody>';

                }
                return Response($output);
            }
        }
    }

    public function search_get_food(Request $request)
    {
        if ($request->ajax())
        {
            $output="";
            $foods=DB::table('stores')
            ->join('foods','stores.id_store','=','foods.id_store')
            ->where('stores.status','=',1)
            ->where('namefood','LIKE','%'.$request->search.'%')
            ->get();
            if ($foods)
            {
                foreach ($foods as $key => $food) {
                    $output.='<tbody>'.
                        '<tr>'.
                        '<td>'.$food->namefood.'</td>'.
                        '<td>'.$food->detail.'</td>'.
                        '<td><a class="btn btn-primary" href="#" role="button">ดูเพิ่มเติม &raquo;></a></td>'.
                        '</tr>'.
                    '</tbody>';

                }
                return Response($output);
            }
        }
    }


    // public function getstores()
    // {
    //     return view('search.searchstore');
    // }

    // public function getstores_bysearch(Request $request)
    // {
    //     // dd($request);
    //     if($request->ajax())
    //     {
    //         // dd('เข้า IF');
    //         $stores=$this->data($request['search']);
    //         if (count($stores)>0){
    //             $search=array('search'=>$request['search']);
    //         $view = view('search.getsearchstore',compact('stores','search'))->render();
    //         return response($view);
    //         }
    //     }
    //     //   dd('ไม่เข้า IF');
    // }

    // public function data($search)
    // {
    //     return $stores = Store::where('stores.status',$search)
    //     ->paginate(5);
    // }



    // public function search(Request $request){
        
    //     $term = $request->term;
    //     $item = Store::where("namestore","LIKE","%".$term."%")
    //     ->take(4)
    //     ->get();
        
    //     $result = array();

    //     // if(count($item) == 0){
    //     //     $result[] = "Not Found.";
    //     // }else{
    //         foreach ($item as  $i) {
    //              $result[] = $i->namestore;
    //          }
    //     // }
       
    //     // return response()->json($result);
    //     return json_encode($result);
    // }
}

