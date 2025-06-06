<!DOCTYPE html>
<html class="html yes-js js_active js" dir="rtl" lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{--  --}}
        <!-- Google / Search Engine Tags -->
        <meta itemprop="name" content="Awtar Alsultanate For Perfume" />
        <meta itemprop="description" content="{{ __('index.overview') }}" />
        <meta itemprop="image" content="{{ asset('images/aawtar.jpg') }}" />
        {{-- SEO --}}
        <meta name="keywords" content="اوتار , اوتار السلطنة , اوتار السلطنة للعطور , awtar , awtar alsultanate , awtar alsultanate for perfume">
    {{--  --}}
    <title>{{ __('index.app_name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">  
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
    <link href="{{ asset('css/products.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/whats.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/aawtar.png') }}">
    <!-- icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!---->
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@400..700&display=swap" rel="stylesheet">
            @if(session('lang') =="en") 
                <link href="{{ asset('css/EN/style.css') }}" rel="stylesheet">
                <style>
                     #aa a h4{
                         font-size: 25px;
                     }
                    .more-info{
                        font-size:20px;
                    }
                </style>
            @endif
</head>
<body>
    @include('awtar.footerAndNav.nav')    
    
    @if($alrohId=='')
    <h1 style="color:white;background-color:black;">قم بإدخال 6 منتجات اولا ومن بينهم عجم و نهاوند و عطر الروح و هزام</h1>
    @else  
    @include('awtar.whats')
     <div id="cateee">
        {{--  --}}
                <section class="img-slider">
                  <!-- Slideshow container -->
                    <div class="slideshow-container">
                    
                          <!-- Full-width images with number and caption text -->
                          <div class="mySlides fade first-mySlides">
                            <img src="{{ asset('images/home/index1.jpg') }}" style="width:100%">
                          </div>
                        
                          <div class="mySlides fade first-mySlides">
                            <img src="{{ asset('images/home/index2.jpg') }}" style="width:100%">
                         </div>

                         <div class="mySlides fade first-mySlides">
                            <img src="{{ asset('images/home/index3.jpg') }}" style="width:100%">
                         </div>
                    
                    </div>    
                </section>
        {{--  --}}
        <div class="empty2"></div> 
        {{--  --}}
        
        <div class="container" align="center">
              <div id="h11">
                <h1 align="center">{{ __('index.cat_name') }}</h1>
              </div>
        </div>
            <div class="container">
                <div class="row" dir="ltr">
                    @for ($i=0;$i<count($categories);$i++)
                        <div id="aa" class="col-sm-12 col-md-6 col-lg-4 py-5" align="center">
                            <a href="{{ env('APP_URL') }}product?id={{ $categories[$i]->id }}" class="nav-link"><img id="headerimg" class="w-75" src="{{ $categories[$i]->img }}" alt="Image"/></a>
                            <br>
                            @if(session()->has('lang'))
                                  @if (session('lang')=="ar")
                                      <a href="{{ env('APP_URL') }}product?id={{ $categories[$i]->id }}" class="nav-link"><h4 class="display-9 text-white animated slideInDown" id="categorytext" style="color:white;" align="center">{{ $categories[$i]->category }}</h4></a>
                                  @else
                                      <a href="{{ env('APP_URL') }}product?id={{ $categories[$i]->id }}" class="nav-link"><h4 class="display-9 text-white animated slideInDown" id="categorytext" style="color:white;" align="center">{{ $categories[$i]->enName }}</h4></a>
                                  @endif
                            @endif
                        </div>
                    @endfor
                </div>
             </div>
    <br>
    <br>
    <!-- Carousel End -->
     {{--  --}}
     
  <div class="empty2">

  </div>
     <section>
      <div class="container" align="center">
            <div id="h11_thisweek">
                <h1 align="center">{{ __('index.perfume_week') }}</h1>
            </div>
      </div>
         <div class="today-perfume d-flex flex-column justify-content-center">
                 <div class="container-fluid items-today view-products">
                         <div class="row">
                               <div class="col-sm-12 col-md-6">
                                     <a href="{{ env('APP_URL') }}product/{{ $products[0]->id }}"><img src="{{ $products[0]->imgs[0]->img }}"/></a>
                                     
                                      @if(session()->has('lang'))
                                         @if (session('lang')=="ar")
                                              <a href="{{ env('APP_URL') }}product/{{ $products[0]->id }}"><h2>{{ $products[0]->name }}</h2></a>
                                          @else
                                              <a href="{{ env('APP_URL') }}product/{{ $products[0]->id }}"><h2>{{ $products[0]->enName }}</h2></a>
                                          @endif
                                      @endif
                                     <div class="price">
                                      @if($products[0]->newPrice==0)
                                          <h5 class="offre">{{ $products[0]->oldPrice }} OMR</h5>
                                      @else
                                          <h5 class="offre">{{ $products[0]->newPrice }} OMR</h5>
                                      @endif
                                     </div>
                                     <a href="{{ env('APP_URL') }}product/{{ $products[0]->id }}" class="more-info">{{ __('index.read_more') }}</a>
                               </div>
                               <div class="col-sm-12 col-md-6">
                                     <a href="{{ env('APP_URL') }}product/{{ $products[1]->id }}"><img src="{{ $products[1]->imgs[0]->img }}" class="navbar-brand" /></a>
                                     @if(session()->has('lang'))
                                        @if (session('lang')=="ar")
                                              <a href="{{ env('APP_URL') }}product/{{ $products[1]->id }}"><h2>{{ $products[1]->name }}</h2></a>
                                         @else
                                              <a href="{{ env('APP_URL') }}product/{{ $products[1]->id }}"><h2>{{ $products[1]->enName }}</h2></a>
                                         @endif
                                     @endif
                                     <div class="price">
                                      @if($products[1]->newPrice==0)
                                          <h5 class="offre">{{ $products[1]->oldPrice }} OMR</h5>
                                      @else
                                          <h5 class="offre">{{ $products[1]->newPrice }} OMR</h5>
                                      @endif
                                     </div>
                                     <a href="{{ env('APP_URL') }}product/{{ $products[1]->id }}" class="more-info">{{ __('index.read_more') }}</a>
                               </div>

                         </div>
                    </div>             
                 </div>
     </section>
     
     <div class="empty2">

     </div>
     {{-- ----------------------------------------------------------------------------------------------- --}}
     <section>
        <div class="today-perfume d-flex flex-column justify-content-center" id="isdisplay" >
                    <div class="container-fluid items-today view-products">
                        <div class="row">
                              <div class="col-sm-12 col-md-6">
                                    <a href="{{ env('APP_URL') }}product/{{ $alrohId }}"><img src="{{ $alrohimg }}" /></a>
                              </div>
                              <div class="col-sm-12 col-md-6 d-flex align-items-center">
                                    <div>
                                        <h1>{{ $alrohname }}</h1>
                                        <br>
                                        <h4 style="color:white;padding-left:30px;">{{ __('index.alroh_desc') }}</h4>
                                    </div>
                              </div>

                        </div>
                   </div>             
                </div>
    </section>
    
     <div class="empty2">

     </div>
     
     <section>
      <div class="container" align="center">
            <div id="h11_valid">
                 <h2 align="center">{{ __('index.valid_now') }}</h2>
            </div>
      </div>
      <div class="today-perfume d-flex flex-column justify-content-center">
              <div class="container-fluid items-today view-products">
                      <div class="row">
                        <div class="col-sm-12 col-md-6">
                          <a href="{{ env('APP_URL') }}product/{{ $products[2]->id }}"><img src="{{ $products[2]->imgs[0]->img }}" class="navbar-brand" /></a>
                          @if(session()->has('lang'))
                              @if (session('lang')=="ar")
                                    <a href="{{ env('APP_URL') }}product/{{ $products[2]->id }}"><h2>{{ $products[2]->name }}</h2></a>
                               @else
                                    <a href="{{ env('APP_URL') }}product/{{ $products[2]->id }}"><h2>{{ $products[2]->enName }}</h2></a>
                               @endif
                           @endif
                          <div class="price">
                           @if($products[2]->newPrice==0)
                               <h5 class="offre">{{ $products[2]->oldPrice }} OMR</h5>
                           @else
                               <h5 class="offre">{{ $products[2]->newPrice }} OMR</h5>
                           @endif
                          </div>
                          <a href="{{ env('APP_URL') }}product/{{ $products[2]->id }}" class="more-info">{{ __('index.read_more') }}</a>
                    </div>
                    <div class="col-sm-12 col-md-6">
                      <a href="{{ env('APP_URL') }}product/{{ $products[3]->id }}"><img src="{{ $products[3]->imgs[0]->img }}" class="navbar-brand" /></a>
                      @if(session()->has('lang'))
                          @if (session('lang')=="ar")
                                 <a href="{{ env('APP_URL') }}product/{{ $products[3]->id }}"><h2>{{ $products[3]->name }}</h2></a>
                           @else
                                 <a href="{{ env('APP_URL') }}product/{{ $products[3]->id }}"><h2>{{ $products[3]->enName }}</h2></a>
                           @endif
                       @endif
                      <div class="price">
                       @if($products[3]->newPrice==0)
                           <h5 class="offre">{{ $products[3]->oldPrice }} OMR</h5>
                       @else
                           <h5 class="offre">{{ $products[3]->newPrice }} OMR</h5>
                       @endif
                      </div>
                      <a href="{{ env('APP_URL') }}product/{{ $products[3]->id }}" class="more-info">{{ __('index.read_more') }}</a>
                </div>

                      </div>
                 </div>             
              </div>
  </section>
  
  <div class="empty2">

  </div>
<section>
    <div class="today-perfume d-flex flex-column justify-content-center" id="isdisplay" >
            <div class="container-fluid items-today view-products">
                    <div class="row">
                          <div class="col-sm-12 col-md-6">
                            <a href="{{ env('APP_URL') }}product/{{ $products[4]->id }}"><img src="{{ $products[4]->imgs[0]->img }}"/></a>
                          </div>
                          <div class="col-sm-12 col-md-6 d-flex align-items-center justify-content-start">
                                @if(session()->has('lang'))
                                    @if (session('lang')=="ar")
                                        <div>
                                            <h1>{{ $products[4]->name }}</h1>
                                            <br>
                                            <h4 style="color:white;padding-left:30px;">{{ $products[4]->desc }}</h4>
                                        </div>
                                     @else
                                        <div>
                                            <h1>{{ $products[4]->enName }}</h1>
                                            <br>
                                            <h4 style="color:white;padding-left:30px;">{{ $products[4]->enDesc }}</h4>
                                        </div>
                                     @endif
                                 @endif
                          </div>

                    </div>
               </div>             
            </div>
</section>
 
<div class="empty2">

</div>
     {{--  --}}
  <div class="container" align="center">
        <div id="h11_branchs">
            <h1 align="center" >{{ __('index.branches') }}</h1>
        </div>
  </div>
  <div class="empty2"></div>
  <section class="img-slider">
    <!-- Slideshow container -->
        <div class="slideshow-container">
        
          <!-- Full-width images with number and caption text -->
          <div class="mySlides fade mySlidesss">
            <img src="{{ asset('images/home/slide1.jpg') }}" style="width:100%">
            <div class="text d-flex flex-column ">
                <h2 style="color: white">{{ __('index.Muscat_Al_Ghubrah') }}</h2>
                <h2 style="color: white">{{ __('index.Avenues_Mall') }}</h2>
            </div>
          </div>
        
          <div class="mySlides fade mySlidesss">
             <img src="{{ asset('images/home/slide2.jpg') }}" style="width:100%">
             <div class="text d-flex flex-column ">
                <h2 style="color: white">{{ __('index.Muscat_Seeb') }}</h2>
                <h2 style="color: white">{{ __('index.Al_Araimi_Boulevard') }}</h2>
             </div>
          </div>
        
          <div class="mySlides fade mySlidesss">
            <img src="{{ asset('images/home/slide3.jpg') }}" style="width:100%">
            <div class="text d-flex flex-column ">
                <h2 style="color: white">{{ __('index.Muscat_Seeb') }}</h2>
                <h2 style="color: white">{{ __('index.Al_Araimi_Boulevard') }}</h2>
            </div>
          </div>
          <div class="mySlides fade mySlidesss">
            <img src="{{ asset('images/home/slide4.jpg') }}" style="width:100%">
            <div class="text d-flex flex-column ">
                <h2 style="color: white">{{ __('index.Muscat_Qurum') }}</h2>
                <h2 style="color: white">{{ __('index.Al_Araimi_Boulevard_Complex') }}</h2>
            </div>
          </div>
          <div class="mySlides fade mySlidesss">
            <img src="{{ asset('images/home/slide5.jpg') }}" style="width:100%">
            <div class="text d-flex flex-column ">
                <h2 style="color: white">{{ __('index.Muscat_Qurum') }}</h2>
                <h2 style="color: white">{{ __('index.Boulevard_in_front_of_the_Opera_House') }}</h2>
            </div>
          </div>
        </div>    
  </section>
  {{--  --}}
      <div class="empty2">

      </div>
      <section>
        <div class="container" align="center">
              <div id="h11_branchs">
                   <h1 align="center">{{ __('index.Company_Profile') }}</h1>
              </div>  
        </div>
        <div class="container" align="center">
            <br>
            <br>
            <p id="companyOverviewText" class="py-2" align="center">
                {{ __('index.overview') }}<a href="{{ route('company') }}" >{{ __('index.more') }}</a></p>
        </div>
     </section>

     <div class="empty2">

     </div>
     <section class="gold-section">
          <div class="container">
              <div class="elementor-background-overlay">
                  <div class="space">
                          
                  </div>
               </div>
          </div>
      </section>
    </div>
      @endif
      
       @include('awtar.footerAndNav.footer')

     <script src="{{ asset('js/slideshow.js') }}"></script>
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  
</body>
</html>