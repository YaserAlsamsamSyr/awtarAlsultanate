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
        video {
            object-fit: fill;
        }
      </style>
</head>
<body>
    @include('awtar.footerAndNav.nav')    
    @if($alrohId=='')
    <h1 style="color:white;background-color:black;">قم بإدخال 6 منتجات اولا ومن بينهم عجم و ميكس عود و عطر الروح و هزام</h1>
    @else      
     <section class="video">
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
     </section>
     <div style="background-color: black;">
     <section class="img-slider">
       <!-- Slideshow container -->
           <div class="slideshow-container">
           
             <!-- Full-width images with number and caption text -->
             <div class="mySlides fade">
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
           
             <div class="mySlides fade">
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
           
             <div class="mySlides fade">
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
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                      </div>
           </div>
           <br>       
     </section>
     <section>
      <div class="card" style="background-color: black">
        <div class="card-header m-5">
            <h1 align="center" style="color:#B89761">لمحة عن الشركة</h1>
        </div>
        <div class="card-body" >
          <h3 align="center">qw'dqwpdokqwpdokqwpodk wqpodk pwqok dpqwok dpwqokd poqwk </h3>
        </div>
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
     {{-- <section class="list-img" >
      <div class="container-fluid">
        <div class="d-flex justify-content-center">
             <img src="{{ asset('images/home/slide1.jpg') }}" class="navbar-brand ps-4" />
             <img src="{{ asset('images/home/slide2.jpg') }}" class="navbar-brand" />
             <img src="{{ asset('images/home/slide3.jpg') }}" class="navbar-brand pe-4" />
            </div>
        </div>
        <div class="empty2">

        </div>
     </section> --}}
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
     <section class="preview1">
         <div class="container">
             <div class="row">
                <div class="col-md-8">
                      <h1>{{ $products[2]->name }}</h1>
                      <br>
                      <h4>{{ $products[2]->desc }}</h4>
                </div>
                <div class="col-md-4">
                     <a href="{{ env('APP_URL') }}product/{{ $products[2]->id }}"><img src="{{ $products[2]->imgs[0]->img }}" class="navbar-brand"/></a>
                </div>
              </div>
         </div>
     </section>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <section>
      <div class="today-perfume d-flex flex-column justify-content-center">
              <h2>متوفر الأن</h2>
              <div class="container-fluid items-today view-products">
                      <div class="row">
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
                    <div class="col-sm-12 col-md-6 col-lg-3">
                      <a href="{{ env('APP_URL') }}product/{{ $products[4]->id }}"><img src="{{ $products[4]->imgs[0]->img }}" class="navbar-brand" /></a>
                      <a href="{{ env('APP_URL') }}product/{{ $products[4]->id }}"><h2>{{ $products[4]->name }}</h2></a>
                      <div class="price">
                       @if($products[4]->newPrice==0)
                           <h5 class="offre">{{ $products[4]->oldPrice }} OMR</h5>
                       @else
                           <h5 class="offre">{{ $products[4]->newPrice }} OMR</h5>
                       @endif
                      </div>
                      <a href="{{ env('APP_URL') }}product/{{ $products[4]->id }}" class="more-info">قراءة المزيد</a>
                </div>

                      </div>
                 </div>             
              </div>
  </section>
     <section class="preview2">
      <div class="container">
          <div class="row">
             <div class="col-md-3">
                 <a href="{{ env('APP_URL') }}product/{{ $products[5]->id }}"><img src="{{ $products[5]->imgs[0]->img }}" class="navbar-brand"/></a>
             </div>
             <div class="col-md-2"></div>
             <div class="col-md-7">
                   <h1>{{ $products[5]->name }}</h1>
                   <br>
                   <h4>{{ $products[5]->desc }}</h4>
             </div>

      </div>
    </div>
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
      <script>
                    // Next/previous controls
            function plusSlides(n) {
              showSlides(slideIndex += n);
            }
            
            // Thumbnail image controls
            function currentSlide(n) {
              showSlides(slideIndex = n);
            }
            let slideIndex = 0;
            showSlides();

            function showSlides() {
              let i;
              let slides = document.getElementsByClassName("mySlides");
              for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
                document.getElementsByClassName('dot')[i].style.backgroundColor="#1d1c1c";
              }
              slideIndex++;
              if (slideIndex > slides.length) {slideIndex = 1}
              slides[slideIndex-1].style.display = "block";
              document.getElementsByClassName('dot')[slideIndex-1].style.backgroundColor="#e2ad56";
              setTimeout(showSlides, 20000); // Change image every 2 seconds
            }
      </script>
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  
</body>
</html>