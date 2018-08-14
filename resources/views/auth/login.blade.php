@extends('layouts.applog')

@section('contentlogin')
        <div class="container2">
            <div class="bg">
                    <div class="row">
                            <div class="col-md-4 col-md-offset-7">
                                <div class="panel panel-default">
                                    <center><div class="panel-heading">
                                        <label >เข้าสู่ระบบ</label>
                                        </div></center>
                    
                                    <div class="panel-body">
                                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                            {{ csrf_field() }}
                    
                                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                <label for="email" class="col-md-4 control-label">ที่อยู่ อีเมล์</label>
                    
                                                <div class="col-md-6">
                                                    <input id="email" type="email" class="form-control" name="email" placeholder="ที่อยู่ อีเมล์" value="{{ old('email') }}" required autofocus>
                    
                                                    @if ($errors->has('email'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                    
                                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                <label for="password" class="col-md-4 control-label">รหัสผ่าน</label>
                    
                                                <div class="col-md-6">
                                                    <input id="password" type="password" class="form-control" name="password" placeholder="รหัสผ่าน"  required>
                    
                                                    @if ($errors->has('password'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                    
                                            <div class="form-group">
                                                <div class="col-md-6 col-md-offset-4">
                                                    <div class="checkbox">  
                                                        <label>
                                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> บันทึกฉันไว้
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                    
                                            <div class="form-group">
                                                <div class="col-md-8 col-md-offset-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        เข้าสู่ระบบ
                                                    </button>
                    
                                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                                        ลืมรหัสผ่าน ?
                                                    </a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>
        </div>
@endsection
