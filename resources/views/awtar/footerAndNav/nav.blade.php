<header>
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a href="{{ route('index') }}" class="nav-link"><img  src="{{ asset('images/footerAndNav/awtar.png') }}"class="navbar-brand"/></a>
       <div class="db d-flex">
        <a class="nav-link text-color d-flex justify-content-center border-nav-part-2-element icon sh a-small" href="{{ route('viewCard') }}">
          <img src="{{ asset('images/footerAndNav/shippingIcon.png') }}" class="shipping-icon"/>
          <img src="{{ asset('images/footerAndNav/msg_icon.png') }}" class="msg-icon"/>
          <p>
            @if (session('quan'))
                {{ session('quan') }}
            @endif
          </p>
       </a>
       <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
        <div class="collapse navbar-collapse nav-part-2" id="navbarTogglerDemo01">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            @auth
            @if(auth()->user()->accountType=="aaddmmii0n0n")
              <li class="nav-item">
                <a class="nav-link text-color border-nav-part-2-element"  href="{{ route('adminHome') }}"><span>admin</span></a>
              </li>
            @endif
            <li class="nav-item">
               <form action="{{ route('logout') }}" method="POST">
                @csrf
               <a class="nav-link text-color border-nav-part-2-element with-in"><input type="submit" value="تسجيل الخروج"  /></a> 
               </form>
            </li>
            @endauth
            <li class="nav-item">
              <a class="nav-link text-color border-nav-part-2-element"  href="{{ route('index') }}"><span>الصفحة الرئيسية</span></a>
            </li>
            {{-- <li class="nav-item">
              <a class="nav-link text-color border-nav-part-2-element" href="{{ env('APP_URL') }}product?id=-1">جميع المنتجات</a>
            </li> --}}
            <li class="nav-item dropdown">
              <a class="nav-link text-color border-nav-part-2-element  dropdown-hidden" href="#" role="button" aria-expanded="false">
                عطور ومجموعات دار السلطنة
                <i class="arrow down"></i>
              </a>
              <ul class="dropdown-menu  text-color bg-black dropdown-menu-border">
                @foreach ($categories as $c)
                    <li><a class="dropdown-item text-color dropdown-menu-item" href="{{ env('APP_URL') }}product?id={{ $c->id }}">{{ $c->category }}</a></li>
                @endforeach
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link text-color border-nav-part-2-element" href="{{ route('log') }}">حسابي</a>
            </li>
            @auth
                  <li class="nav-item">
                    <a class="nav-link text-color border-nav-part-2-element" href="{{ route('myOrders') }}">طلباتي</a>
                  </li>
            @else
                  <li class="nav-item">
                    <a class="nav-link text-color border-nav-part-2-element" href="{{ route('register') }}">انشاء حساب</a>
                  </li>
            @endauth
            <li class="nav-item">
              <a class="nav-link text-color d-flex justify-content-center border-nav-part-2-element icon sh a-large" href="{{ route('viewCard') }}" >
                <img src="{{ asset('images/footerAndNav/shippingIcon.png') }}" class="shipping-icon"/>
                <img src="{{ asset('images/footerAndNav/msg_icon.png') }}" class="msg-icon"/>
                <p>
                  @if (session('quan'))
                      {{ session('quan') }}
                  @endif
                </p>
            </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
   </header>
