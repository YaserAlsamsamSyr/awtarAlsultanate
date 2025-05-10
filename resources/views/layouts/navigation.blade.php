@if(Auth::user()->accountType=="aaddmmii0n0n" )
    <header>
        <nav class="navbar navbar-expand-lg">
            <div>
               <a class="nav-link" href={{ route('adminHome') }}><img  src="{{ asset('images/footerAndNav/awtar.png') }}"class="navbar-brand"/></a>
            </div>
            
        </nav>
    </header>
 @else
<nav x-data="{ open: false }" class="bg-white dark:bg-black"  dir="rtl">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('index') }}" class="aa">
                        <img src="{{ asset('images/footerAndNav/awtar.png') }}" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>

@endif