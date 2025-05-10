<!DOCTYPE html>
<html class="html yes-js js_active js" dir="rtl" lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('index.app_name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
    <link href="{{ asset('css/contactUs.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/aawtar.jpg') }}">
    <!-- icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!---->
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@400..700&display=swap" rel="stylesheet">
</head>
<body>
    
  @include('awtar.footerAndNav.nav') 
  <div class="color-space"></div>
    <!-- <div class="empty"></div> -->
     <section class="container contact-us d-flex flex-column justify-content-center" >
         
              <div class="fisrt-part">
                    <p>{{ __('contact.phone') }}</p>
                    <a href="tel:0096895310290">+968-95310290</a>
                    <br>
                    <br>
                    <p>{{ __('contact.E_mail') }}</p>
                    <a href="mailto:awtaralstanate@gmail.com" class="email">awtaralstanate@gmail.com</a>
              </div>
        
         <div class="second-part">
                         <div class="container ul flex-nowrap">
                           <div class="li">
                             <a class="facebook" href="https://m.facebook.com/p/awtar__alstanate-100067601478316/">
                                <span></span>
                               <span></span>
                               <span></span>
                               <span></span>
                               <i class="fa fa-facebook" aria-hidden="true"></i>
                             </a>
                           </div>
                           <div class="li">
                            <a class="tiktok" href="https://www.tiktok.com/@awtaralsltanate?_r=1&_d=e6ahfc65517hk1&sec_uid=MS4wLjABAAAAumHwlNzRRMofpFbUpxec0KZywbqAf_EMpzibHAxSjrEZmdmB6FIkk0ZbogRefW5T&share_author_id=7378892867537830918&sharer_language=ar&source=h5_m&u_code=d3kgcmae5gab81&ug_btm=b2001,b5836&sec_user_id=MS4wLjABAAAANSQNfUJ2-6pgCm7O4EXdgDNPdE7FALBItCQDdj7mQH0tut9ZzPainQOqq099tsjc&utm_source=whatsapp&social_share_type=5&utm_campaign=client_share&utm_medium=ios&tt_from=whatsapp&user_id=6637958970638991365&enable_checksum=1&share_link_id=36F2F7B4-4516-4B0C-A263-E05F31E7B23D&share_app_id=1233">
                               <span></span>
                              <span></span>
                              <span></span>
                              <span></span>
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="fa-tiktok" aria-hidden="true" viewBox="0 0 16 16">
                                <path d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3z"/>
                              </svg>
                            </a>
                          </div>
                           <div class="li">
                             <a class="twitter" href="https://x.com/awtaralsltanate?s=11&t=YX3fD1Eoa4binVwHohzecA">
                               <span></span>
                               <span></span>
                               <span></span>
                               <span></span>
                               <i class="fa fa-twitter" aria-hidden="true"></i>
                             </a>
                           </div>
                     <div class="li">
                       <a class="whatsApp-con" href="https://wa.me/message/UHQFIUY6L7AHC1">
                         <span></span>
                         <span></span>
                         <span></span>
                         <span></span>
                         <i class="fa fa-whatsapp" aria-hidden="true"></i>
                       </a>
                     </div>
                     <div class="li">
                       <a class="youtube-con" href="https://youtube.com/@awtaralsltanate9145?si=5LjrNPP1Y0vKFJSe">
                         <span></span>
                         <span></span>
                         <span></span>
                         <span></span>
                         <i class="fa fa-youtube-play" aria-hidden="true"></i>
                       </a>
                     </div>
                       <div class="li">
                         <a class="instagram" href="https://www.instagram.com/awtar_alsultanate?igsh=YjdwY3J3ZTBrdXEx">
                           <span></span>
                           <span></span>
                           <span></span>
                           <span></span>
                           <i class="fa fa-instagram" aria-hidden="true"></i>
                         </a>
                       </div>
                       
                     </div>
         </div>
     </section>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
</body>
</html>