<header>
        <div class="main-menu-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="logo">
                            <a href="/"><img src="img/logo/logo1.png" style="width:224px; height:230px; "></a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="main-menu text-right">
                            <nav>
                                <ul>
                                    <li class="{{Request::is('dashboard') ? 'active' : ''}}">
                                        <a href="/dashboard">                                  
                                           หน้าแรก
                                        </a>
                                </li>
                                <li class="{{Request::is('storeslist') ? 'active' : ''}}">
                                        <a href="/storeslist">
                                          ร้านอาหาร
                                        </a>
                                </li>
                                <li class="{{Request::is('foodslist') ? 'active' : ''}}">
                                        <a href="/foodslist">
                                        อาหาร
                                        </a>
                                </li>
                                <li class="{{Request::is('about') ? 'active' : ''}}">
                                         <a href="/about">
                                        เกี่ยวกับเรา
                                         </a>
                                </li>
                                
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
                            </nav>
                        </nav>       
                    </div>
                </div>
            </div>
        </div>
</header>
