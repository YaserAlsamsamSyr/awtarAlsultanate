<!DOCTYPE html>
<html class="html yes-js js_active js" dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('index.app_name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
    <link href="{{ asset('css/termsAndConditions.css') }}" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/aawtar.jpg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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
         #text{
          font-size:20px;
          direction:ltr; 
        }
    </style>
@endif
</head>
<body>
    
  @include('awtar.footerAndNav.nav')  
      <div class="container">
    <h1>{{ __('terms.title') }}</h1>
    </div>  
    <img src="{{ asset('images/whiteWave.png') }}" class="wave-img" alt="no image"/>
    <section>
      <div class="container" id="text" >
        <p>
           {{ __('terms.s1') }}
        <br>
           {{ __('terms.s2') }}
        </p>
        <p>
           {{ __('terms.s3') }}
        </p>
        <p>
           {{ __('terms.s4') }}
        </p>
        <p>
           {{ __('terms.s5') }}
            <br>
            {{ __('terms.s6') }}
        </p>
        <p>
            {{ __('terms.s7') }}
        </p>
        <p>
            {{ __('terms.s8') }}
            <br>
            {{ __('terms.s9') }}
        </p>
        <p>
            {{ __('terms.s10') }}
            <br>
            {{ __('terms.s11') }}
        </p>
        <p>
           {{ __('terms.s12') }}
        <br>
           {{ __('terms.s13') }}
        </p>
        <p>
           {{ __('terms.s14') }}
           <br>
           {{ __('terms.s15') }}
           <br>
           {{ __('terms.s16') }}
           <br>
           {{ __('terms.s17') }}
        </p>
        <p>
         {{ __('terms.s18') }}
        </p>
        <p>
        {{ __('terms.s19') }}
        <br>
        {{ __('terms.s20') }}
      </p>
      <p>
        {{ __('terms.s21') }}
        <br>
        {{ __('terms.s22') }}
        <br>
        {{ __('terms.s23') }}
        <br>
          {{ __('terms.s24') }}
        <br>
        {{ __('terms.s25') }}
      </p>
      <p>
        {{ __('terms.s26') }}
      </p>
      <p>
        {{ __('terms.s27') }}
      </p>
      <p>
       {{ __('terms.s28') }}
      </p>
      <p>
        iFrames
        <br>
        {{ __('terms.s29') }}
      </p>
      <p>
        {{ __('terms.s30') }}
        <br>
        {{ __('terms.s31') }}
      </p>
      <p>
        {{ __('terms.s32') }}
      </p>
      <p>
        {{ __('terms.s33') }}
        <br>
        {{ __('terms.s34') }}
      </p>
      <p>
        {{ __('terms.s35') }}
        <br>
        {{ __('terms.s36') }}
      </p>
      <p>
        {{ __('terms.s37') }}
      </p>
      <p>
        {{ __('terms.s38') }}
        <br>
        {{ __('terms.s39') }}
        <br>
        {{ __('terms.s40') }}
        <br>
        {{ __('terms.s41') }}
        <br>
        {{ __('terms.s42') }}
      </p>
      <p>
        {{ __('terms.s43') }}
      </p>
      </div>
    </section>
    @include('awtar.footerAndNav.footer')
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
</body>
</html>