@extends('layouts.app')

@section('content')
<div class="container">
    <h1>ส่วนผู้ดูแลระบบ!</h1>
    <hr>
    <h3>การจัดการ</h3>
    <form class="form-horizontal">
        <div class="form-group">
            <label class="control-label col-sm-2" for="managetype">จัดการประเภทร้านอาหาร:</label>
            <div class="col-sm-10">
                <a href="/typestore" class="btn btn-primary">ประเภทร้านอาหาร</a>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="managetype">จัดการประเภทอาหาร:</label>
            <div class="col-sm-10">
                <a href="/typefood" class="btn btn-primary">ประเภทอาหาร</a>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="managetype">จัดการร้านอาหาร:</label>
            <div class="col-sm-10">
                <a href="/managestore" class="btn btn-primary">ร้านอาหาร</a>
            </div>
        </div>
    </form> 
 
</div>
@endsection
