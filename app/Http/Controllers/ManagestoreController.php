<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\Mail;
use App\Mail\Mailtrap;
use App\Store;
use App\Food;
use App\Typestore;
use App\Blog;
use Image;
use Storage;
use DB;

class ManagestoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rsto = Store::where('stores.status','=',0)->get();
        $ct1 = count($rsto);

        $managestore = store::where('stores.status','=',1)->get();
        $ct2 = count($managestore);
        return view('stores.manage.managestore',compact('managestore','rsto','ct1','ct2'));
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
        //
    }

        /**
     * Confirmed Store Admin 
     */
    public function confirm_store(Request $request,$id){

        $mail = DB::table('stores')
        ->join('users','stores.id_user','=','users.id')
        ->where('stores.id_store','=',$id)
        ->select('users.email')
        ->first();
        
        $text = $request->message;
        $title = 'ร้านของท่านได้รับการยืนยันเสร็จเรียบร้อย';
        $info = 'ร้านของท่านจะถูกนำขึ้นแสดงสาธารณะ
                โปรดแก้ไขและเพิ่มข้อมูลอย่างระมัดระวัง หากข้อมูลไม่เหมาะสม ผู้พัฒนาจะแจ้งเตือกก่อน 1 ครั้ง
                หากยังไม่มีการแก้ไข ผู้พัฒนาจะลบร้านของท่านออกจากระบบ';

        Mail::to($mail->email)->send(new Mailtrap($title,$info,$text));
        
        // dd('test send');

        $store = Store::where('id_store', $id)
            ->update(['status' => 1]);
        // $store->status = 1;
        // $store->save();

        return redirect('managestore');

    }

    public function confirm_show($id){
        $store = Store::where('stores.id_store','=',$id)->first();
        // dd($store);
        return view('stores.manage.confirmstore',compact('store'));

        /**
     * Delete Store Admin 
     */       
    }
    public function delete_store(Request $request,$id){
        $mail = DB::table('stores')
        ->join('users','stores.id_user','=','users.id')
        ->where('stores.id_store','=',$id)
        ->select('users.email')
        ->first();
        
        
        $text = $request->message;
        $title = 'ร้านของท่านไม่ผ่านการตรวจสอบ.';
        $info = 'หากผิดพลาดทางผู้พัฒนาขออภัยเป็นอย่างยิ่ง 
                ระบบจะลบร้านออกโดยอัตโนมัติ การสร้างร้านอาหารจะต้องกรอกข้อมูลที่เป็นความจริง
                นี้เป็นข้อมความอัตโนมัติโปรดอย่าตอบกลับ';

        Mail::to($mail->email)->send(new Mailtrap($title,$info,$text));

        Store::where('id_store', $id)
            ->delete();

        return redirect('managestore');

    }

    public function delete_show($id){
        $store = Store::where('stores.id_store','=',$id)->first();
        return view('stores.manage.deletestore',compact('store'));

    }
    public function sendmail(Request $request,$id){
        $mail = DB::table('stores')
        ->join('users','stores.id_user','=','users.id')
        ->where('stores.id_store','=',$id)
        ->select('users.email')
        ->first();
        
        
        $text = $request->message;
        $title = 'คุณได้รับข้อความจากผู้ดูแลระบบ';
        $info = 'โปรดอย่าตอบกลับข้อความนี้';

        Mail::to($mail->email)->send(new Mailtrap($title,$info,$text));

        return redirect('managestore');

    }

    public function sendmailshow($id){
        $store = Store::where('stores.id_store','=',$id)->first();
        return view('stores.manage.sendmail',compact('store'));

    }
}
