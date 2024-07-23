<header>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
           <a class="nav-link"><img  src="{{ asset('images/footerAndNav/awtar.png') }}"class="navbar-brand"/></a>
           <div class="db d-flex">
            
           <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        
        </div>
        <div class="collapse navbar-collapse nav-part-2" id="navbarTogglerDemo01">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
               <form action="{{ route('logout') }}" method="POST">
                @csrf
               <a class="nav-link text-color border-nav-part-2-element with-in"><input type="submit" value="تسجيل الخروج"  /></a> 
               </form>
            </li>
            <li class="nav-item">
              <a class="nav-link text-color border-nav-part-2-element"  href="{{ env('APP_URL') }}/product/create"><span>اضافة منتج</span></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link text-color border-nav-part-2-element  dropdown-hidden" href="#" role="button" aria-expanded="false">
                الفئات
                <i class="arrow down"></i>
              </a>
              <ul class="dropdown-menu  text-color bg-black dropdown-menu-border">
                @foreach ($categories as $c)
                    <li><a class="dropdown-item text-color dropdown-menu-item" href="{{ env('APP_URL') }}/adminHome?id={{ $c->id }}">{{ $c->category }}</a></li>
                @endforeach
              </ul>
            </li>
            <li class="nav-item">
               <a class="nav-link text-color border-nav-part-2-element"  href="{{ env('APP_URL') }}/category"><span>عرض الفئات</span></a>
             </li>
             <li class="nav-item">
               <a class="nav-link text-color border-nav-part-2-element"  href="{{ route('viewUsers') }}"><span>عرض المستخدمين</span></a>
             </li>
            <li class="nav-item">
              <a class="nav-link text-color border-nav-part-2-element" href="{{ route('log') }}">حسابي</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
   </header>
