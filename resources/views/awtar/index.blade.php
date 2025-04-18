<!DOCTYPE html>
<html class="html yes-js js_active js" dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">  
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
    <link href="{{ asset('css/products.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/aawtar.jpg') }}">
    <!-- icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!---->
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@400..700&display=swap" rel="stylesheet">
      <style>
        .a-large{
            margin-top:0px;
        }
        .a-large p{
            top:52%;
        }
        /* video {
            object-fit: fill;
        } */
      </style>
</head>
<body>
    @include('awtar.footerAndNav.nav')    
    @if($alrohId=='')
    <h1 style="color:white;background-color:black;">قم بإدخال 6 منتجات اولا ومن بينهم عجم و ميكس عود و عطر الروح و هزام</h1>
    @else      
     {{-- <section class="video">
          <img width="100%" height="600" src="{{ asset('video/intro.jpg') }}" />
          <div class="d-flex flex-column ps">
            <p class="p1">
              <span>الحكاية..ابتدت من هالسؤال… ؟ شلون أجمع ذكرياتي؟أغنياتي..وبعض إحساسي وحبي…وجزء من ذاتي..؟ كان أشبه</span>
        
              <span>بالخيال…وصارت أسألتي حقيقة..! في زجاجة حب شفافة.. رقيقة..هي خلاصة هالسنين…! حب وإحساس وحنين مو محال…</span>
            
              <span>لما احساسي عطرسميته (عطر الروح)</span>
            </p>
            <a href="{{ env('APP_URL') }}product/{{ $alrohId }}" class="me-auto p-2">عطر الروح</a>
          </div>
          <div class="empty">

          </div>
     </section> --}}
     <div style="background-color: black;">
     <section class="img-slider">
       <!-- Slideshow container -->
           <div class="slideshow-container">
           
             <!-- Full-width images with number and caption text -->
             <div class="mySlides fade mmmySlides">
               <img src="{{ asset('images/home/slide1.jpg') }}" style="width:100%">
               <div class="text d-flex flex-column">
                <h2>ميكس عود</h2>
                <p>إنها عطور تنبض  بطابع مترف وبعبير قوي ساحر لتفرض وجودها في أي مكان و مناسبة .</p>
                @foreach ($slider as $s)
                      @if($s['name']=="ميكس عود")
                          <a href="{{ env('APP_URL') }}product/{{ $s['id'] }}">احصل عليها الأن</a>
                      @endif
                @endforeach
         </div>
             </div>
           
             <div class="mySlides fade mmmySlides">
                <img src="{{ asset('images/home/slide2.jpg') }}" style="width:100%">
                <div class="text d-flex flex-column ">
                    <h2>هزام</h2>
                    <p>تخيّل شعورك وأنت محاط بالفخامة من كل جانب وصوب، وأنت تجول في قصرٍ تزدان ردهاته بأريج يحبس الأنفاس بعبق الأصالة الشرقية .</p>
                    @foreach ($slider as $s)
                        @if($s['name']=="هزام")
                           <a href="{{ env('APP_URL') }}product/{{ $s['id'] }}">احصل عليها الأن</a>
                        @endif
                    @endforeach
                </div>
             </div>
           
             <div class="mySlides fade mmmySlides">
               <img src="{{ asset('images/home/slide3.jpg') }}" style="width:100%">
               <div class="text d-flex flex-column ">
                <h2>عجم</h2>
                <p>عندما تُصنع العطور من أعماق الطبيعة وتتغنى بسحرها وانتعاشهاو تخاطب الأحاسيس بمكوناتهما .</p>
                @foreach ($slider as $s)
                       @if($s['name']=="عجم")
                          <a href="{{ env('APP_URL') }}product/{{ $s['id'] }}">احصل عليها الأن</a>
                       @endif
                @endforeach
               </div>
             </div>
                      <!-- The dots/circles -->
                      <div style="text-align:center" class="circle">
                        <span class="dot dddot"></span>
                        <span class="dot dddot"></span>
                        <span class="dot dddot"></span>
                      </div>
           </div>
           <br>       
     </section>
     {{--  --}}
         <!-- Carousel Start -->
         
    <h1 style="color:#B89761" align="center" class="m-4">المجموعات</h1>
    {{-- <div class="container-fluid p-0 mb-5 mt-5" id="parentdevheader">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @for ($i=0;$i<count($categories);$i++)
                      <div id="topheader" class="carousel-item active" align="center" style="background-color: black;">
                          <div class="row">
                            <div class="col-4">
                          <a href="{{ env('APP_URL') }}product?id={{ $categories[$i]->id }}" class="nav-link"><img id="headerimg" class="w-50" src="{{ $categories[$i]->img }}" alt="Image"/></a>
                          {{-- <div class="carousel-caption"> --}}
                              {{-- <div class="container">
                                  <div class="row justify-content-center">
                                      <div class="col-lg-7 pt-5">
                                        <a href="{{ env('APP_URL') }}product?id={{ $categories[$i]->id }}" class="nav-link"><h4 class="display-7 text-white animated slideInDown" style="color:white;" align="center">{{ $categories[$i]->category }}</h4></a>
                                      </div>
                                  </div>
                              </div> --}}
                          {{-- </div> --}}
                            {{-- </div>
                            <div class="col-4">
                                <a href="{{ env('APP_URL') }}product?id={{ $categories[$i]->id }}" class="nav-link"><img id="headerimg" class="w-50" src="{{ $categories[$i]->img }}" alt="Image"/></a> --}}
                                {{-- <div class="carousel-caption"> --}}
                                    {{-- <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-7 pt-5">
                                              <a href="{{ env('APP_URL') }}product?id={{ $categories[$i]->id }}" class="nav-link"><h4 class="display-7 text-white animated slideInDown" style="color:white;" align="center">{{ $categories[$i]->category }}</h4></a>
                                            </div>
                                        </div>
                                    </div> --}}
                                {{-- </div> --}}
                            {{-- </div>
                            <div class="col-4">
                                <a href="{{ env('APP_URL') }}product?id={{ $categories[$i]->id }}" class="nav-link"><img id="headerimg" class="w-50" src="{{ $categories[$i]->img }}" alt="Image"/></a> --}}
                                {{-- <div class="carousel-caption"> --}}
                                    {{-- <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-7 pt-5">
                                              <a href="{{ env('APP_URL') }}product?id={{ $categories[$i]->id }}" class="nav-link"><h4 class="display-7 text-white animated slideInDown" style="color:white;" align="center">{{ $categories[$i]->category }}</h4></a>
                                            </div>
                                        </div>
                                    </div> --}}
                                {{-- </div> --}}
                            {{-- </div>
                          </div>
                        </div>
                @endfor
              </div>
              <button id="headernextpre" class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                  data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
              </button>
              <button id="headernextpre" class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                  data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
              </button>
        </div>
    </div> --}}
     <div class="container">
        <div class="row">
            @foreach ($categories as $i)
                <div class="col-4 p-5" align="center">
                    <a href="{{ env('APP_URL') }}product?id={{ $i->id }}" class="nav-link"><img id="headerimg" class="w-100" src="{{ $i->img }}" alt="Image"/></a>
                    <br>
                    <br>
                    <a href="{{ env('APP_URL') }}product?id={{ $i->id }}" class="nav-link"><h4 class="display-9 text-white animated slideInDown" style="color:white;" align="center">{{ $i->category }}</h4></a>
                </div>
            @endforeach
        </div>
     </div>
    <br>
    <br>
    <!-- Carousel End -->
     {{--  --}}
     <section>
        <div class="container" style="background-color: black" align="center">
            <h1 align="center" style="color:#B89761">لمحة عن الشركة</h1>
            <br>
            <br>
            <p id="companyOverviewText" class="py-2" align="center"> أوتار السلطنة للعطور التي انطلقت في عام 2007 متخصصة في ابتكار عطور فاخرة تجمع بين الأناقة و روح التقاليد العريقة
             تقع الشركة في مسقط، عمان، وتتخصص في ابتكار العطور الفاخرة ومنتجات العود المستوحاة من التراث الثقافي الغني للمنطقة
             من خلال التزام عميق بالجودة، تجمع أوتار السلطنة بين الحرفية التقليدية واﻻبتكار الحديث لتقديم روائح تتميز باﻷصالة والرقي و
             تشمل قيمها اﻷساسية التميز , اﻹبداع ، والحفاظ على جوهر الثقافة العمانية . اكتسبت الشركة سمعة مرموقة بفضل منتجاتها المتميزة
             المتوفرة في جميع فروعها في سلطنة عمان ، والتي تلبي احتياجات اﻷفراد الباحثين عن عطور فريدة طويلة اﻷمد . <a href="{{ route('company') }}" >المزيد ...</a></p>
        </div>
     </section>
     <section>
         <div class="today-perfume d-flex flex-column justify-content-center">
                 <h2>عطر الاسبوع</h2>
                 <div class="container-fluid items-today view-products">
                         <div class="row">
                               <div class="col-sm-12 col-md-6 col-lg-3">
                                     <a href="{{ env('APP_URL') }}product/{{ $products[0]->id }}"><img src="{{ $products[0]->imgs[0]->img }}" class="navbar-brand" /></a>
                                     <a href="{{ env('APP_URL') }}product/{{ $products[0]->id }}"><h2>{{ $products[0]->name }}</h2></a>
                                     <div class="price">
                                      @if($products[0]->newPrice==0)
                                          <h5 class="offre">{{ $products[0]->oldPrice }} OMR</h5>
                                      @else
                                          <h5 class="offre">{{ $products[0]->newPrice }} OMR</h5>
                                      @endif
                                     </div>
                                     <a href="{{ env('APP_URL') }}product/{{ $products[0]->id }}" class="more-info">قراءة المزيد</a>
                               </div>
                               <div class="col-sm-12 col-md-6 col-lg-3">
                                     <a href="{{ env('APP_URL') }}product/{{ $products[1]->id }}"><img src="{{ $products[1]->imgs[0]->img }}" class="navbar-brand" /></a>
                                     <a href="{{ env('APP_URL') }}product/{{ $products[1]->id }}"><h2>{{ $products[1]->name }}</h2></a>
                                     <div class="price">
                                      @if($products[1]->newPrice==0)
                                          <h5 class="offre">{{ $products[1]->oldPrice }} OMR</h5>
                                      @else
                                          <h5 class="offre">{{ $products[1]->newPrice }} OMR</h5>
                                      @endif
                                     </div>
                                     <a href="{{ env('APP_URL') }}product/{{ $products[1]->id }}" class="more-info">قراءة المزيد</a>
                               </div>

                         </div>
                    </div>             
                 </div>
     </section>
     <section class="preview1">
         <div class="container">
             <div class="row">
                <div class="col-md-8">
                      <h1>{{ $alrohname }}</h1>
                      <br>
                      <h4>يجسد عطر روح توازن الأصالة و الإبداع , مستوحى من التراث العماني وسحر الطبيعة ليقدم تجربة عطرية لاتنسى تعكس هوية أوتار السلطنة</h4>
                </div>
                <div class="col-md-4">
                     <a href="{{ env('APP_URL') }}product/{{ $alrohId }}"><img src="{{ $alrohimg }}" class="navbar-brand"/></a>
                </div>
              </div>
         </div>
     </section>
     <div class="empty2">

     </div> 
     <section>
      <div class="today-perfume d-flex flex-column justify-content-center">
              <h2>متوفر الأن</h2>
              <div class="container-fluid items-today view-products">
                      <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-3">
                          <a href="{{ env('APP_URL') }}product/{{ $products[2]->id }}"><img src="{{ $products[2]->imgs[0]->img }}" class="navbar-brand" /></a>
                          <a href="{{ env('APP_URL') }}product/{{ $products[2]->id }}"><h2>{{ $products[2]->name }}</h2></a>
                          <div class="price">
                           @if($products[2]->newPrice==0)
                               <h5 class="offre">{{ $products[2]->oldPrice }} OMR</h5>
                           @else
                               <h5 class="offre">{{ $products[2]->newPrice }} OMR</h5>
                           @endif
                          </div>
                          <a href="{{ env('APP_URL') }}product/{{ $products[2]->id }}" class="more-info">قراءة المزيد</a>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-3">
                      <a href="{{ env('APP_URL') }}product/{{ $products[3]->id }}"><img src="{{ $products[3]->imgs[0]->img }}" class="navbar-brand" /></a>
                      <a href="{{ env('APP_URL') }}product/{{ $products[3]->id }}"><h2>{{ $products[3]->name }}</h2></a>
                      <div class="price">
                       @if($products[3]->newPrice==0)
                           <h5 class="offre">{{ $products[3]->oldPrice }} OMR</h5>
                       @else
                           <h5 class="offre">{{ $products[3]->newPrice }} OMR</h5>
                       @endif
                      </div>
                      <a href="{{ env('APP_URL') }}product/{{ $products[3]->id }}" class="more-info">قراءة المزيد</a>
                </div>

                      </div>
                 </div>             
              </div>
  </section>
     <section class="preview2">
      <div class="container">
          <div class="row">
             <div class="col-md-3">
                 <a href="{{ env('APP_URL') }}product/{{ $products[4]->id }}"><img src="{{ $products[4]->imgs[0]->img }}" class="navbar-brand"/></a>
             </div>
             <div class="col-md-2"></div>
             <div class="col-md-7">
                   <h1>{{ $products[4]->name }}</h1>
                   <br>
                   <h4>{{ $products[4]->desc }}</h4>
             </div>

      </div>
    </div>
    <div class="empty2">

    </div>
     {{--  --}}
  
  <h1 align="center" style="color:#B89761">فروعنا</h1>
  <div class="empty2">

  </div>  
  <section class="img-slider">
    <!-- Slideshow container -->
        <div class="slideshow-container">
        
          <!-- Full-width images with number and caption text -->
          <div class="mySlides fade mySlidesss">
            <img src="{{ asset('images/home/slide1.jpg') }}" style="width:100%">
            <div class="text d-flex flex-column">
             <h2>ميكس عود</h2>
             <p>إنها عطور تنبض  بطابع مترف وبعبير قوي ساحر لتفرض وجودها في أي مكان و مناسبة .</p>
             @foreach ($slider as $s)
                   @if($s['name']=="ميكس عود")
                       <a href="{{ env('APP_URL') }}product/{{ $s['id'] }}">احصل عليها الأن</a>
                   @endif
             @endforeach
      </div>
          </div>
        
          <div class="mySlides fade mySlidesss">
             <img src="{{ asset('images/home/slide2.jpg') }}" style="width:100%">
             <div class="text d-flex flex-column ">
                 <h2>هزام</h2>
                 <p>تخيّل شعورك وأنت محاط بالفخامة من كل جانب وصوب، وأنت تجول في قصرٍ تزدان ردهاته بأريج يحبس الأنفاس بعبق الأصالة الشرقية .</p>
                 @foreach ($slider as $s)
                     @if($s['name']=="هزام")
                        <a href="{{ env('APP_URL') }}product/{{ $s['id'] }}">احصل عليها الأن</a>
                     @endif
                 @endforeach
             </div>
          </div>
        
          <div class="mySlides fade mySlidesss">
            <img src="{{ asset('images/home/slide3.jpg') }}" style="width:100%">
            <div class="text d-flex flex-column ">
             <h2>عجم</h2>
             <p>عندما تُصنع العطور من أعماق الطبيعة وتتغنى بسحرها وانتعاشهاو تخاطب الأحاسيس بمكوناتهما .</p>
             @foreach ($slider as $s)
                    @if($s['name']=="عجم")
                       <a href="{{ env('APP_URL') }}product/{{ $s['id'] }}">احصل عليها الأن</a>
                    @endif
             @endforeach
            </div>
          </div>
                   <!-- The dots/circles -->
                   <div style="text-align:center" class="circle">
                     <span class="dot dottt"></span>
                     <span class="dot dottt"></span>
                     <span class="dot dottt"></span>
                   </div>
        </div>
        <div class="empty2">

        </div>     
  </section>
  {{--  --}}
      <div class="empty2">

      </div>
  </section>

</div>
     <section class="gold-section">
          <div class="container">
              <div class="elementor-background-overlay">
                  <div class="space">
                          
                  </div>
               </div>
          </div>
      </section>
      @endif
      
       @include('awtar.footerAndNav.footer')

     <script src="{{ asset('js/slideshow.js') }}"></script>
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  
</body>
</html>