<header>
        <div id="app">
                <nav class="navbar navbar-default navbar-static-top">
                {{-- <nav class="navbar navbar-toggleable-sm navbar-trans navbar-inverse"> --}}
                    <div class="container">
                        <div class="navbar-header">
        
                            <!-- Collapsed Hamburger -->
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                                <span class="sr-only">Toggle Navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
        
                            <!-- Branding Image -->
                            <a class="navbar-brand" href="{{ url('/dashboard') }}">
                                {{-- {{ config('app.name', 'Laravel') }} --}}
                            </a>
                        </div>
                
                        <div class="collapse navbar-collapse" id="app-navbar-collapse">
                            <!-- Left Side Of Navbar -->
                            <ul class="nav navbar-nav">
                                <li class="{{Request::is('dashboard') ? 'active' : ''}}">
                                     <a href="/dashboard" style="padding-left:50px;">
                                        <img src="/uploads/icon/home1.png" style="width:28px; height:28px; position:absolute; top:10px; left:10px; ">
                                        หน้าแรก</a>
                                </li>
                                {{-- <li class="{{Request::is('promotions') ? 'active' : ''}}">
                                    <a class="" href="/promotions">Promotion</a>
                                </li> --}}
                                <li class="{{Request::is('storeslist') ? 'active' : ''}}">
                                    <a href="/storeslist" style="padding-left:50px;">
                                        <img src="/uploads/icon/store1.png" style="width:28px; height:28px; position:absolute; top:10px; left:10px; ">
                                        ร้านอาหาร</a>
                                </li>
                                <li class="{{Request::is('foodslist') ? 'active' : ''}}">
                                    <a href="/foodslist" style="padding-left:50px;">
                                        <img src="/uploads/icon/foods1.png" style="width:28px; height:28px; position:absolute; top:10px; left:10px; ">
                                        อาหาร</a>
                                </li>
                                <li class="{{Request::is('about') ? 'active' : ''}}">
                                    <a href="/about" style="padding-left:50px;">
                                        <img src="/uploads/icon/about1.png" style="width:28px; height:28px; position:absolute; top:10px; left:10px; ">
                                        เกี่ยวกับเรา</a>
                                </li>
                            </ul>
        
                            <!-- Search Navbar -->
                            {{-- <form class="navbar-form navbar-left">
                                <div class="form-group">
                                    {!! Form::text('searchItem', '',['class'=>'form-control','id'=>'searchItem','placeholder'=>'SearchNameStore']) !!}
                                </div>
                                <script>
                                    $( function() {
                                    $( "#searchItem" ).autocomplete({
                                        source: 'http://localhost:8000/searchname'
                                    });
                                    } );
                                </script>
                            </form> --}}
        
        
                            <!-- Right Side Of Navbar -->
                            <ul class="nav navbar-nav navbar-right">
                                <!-- Authentication Links -->
                                @if (Auth::guest())
                                    <li><a href="{{ route('login') }}">เข้าสู่ระบบ</a></li>
                                    <li><a href="{{ route('register') }}">สมัครสมาชิก</a></li>
                                @else
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position:rerative; padding-left:50px;">
                                            <img src="/uploads/avatars/{{ Auth::user()->avatar}}" style="width:32px; height:32px; position:absolute; top:10px; left:10px; border-radius:50%">
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>
        
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="{{ url('/favorite') }}">
                                                    <i class="fa fa-btn fa-user"></i>
                                                    รายการโปรดของฉัน
                                                </a>
                                            </li>
        
                                            <li>
                                                <a href="{{ url('/blog') }}">
                                                    <i class="fa fa-btn fa-user"></i>
                                                    ความคิดเห็นของฉัน
                                                </a>
                                            </li>
                                            
                                            <li>
                                                <a href="{{ url('/stores') }}">
                                                    <i class="fa fa-btn fa-user"></i>
                                                    ร้านอาหารของฉัน
                                                </a>
                                            </li>
                                            
                                            <li>
                                                <a href="{{ url('/profile') }}">
                                                    <i class="fa fa-btn fa-user"></i>
                                                    บัญชีผู้ใช้
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                    ออกจากระบบ
                                                </a>
        
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </nav>
        <header>