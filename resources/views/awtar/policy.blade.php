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
    <h1>{{ __('policy.care') }}</h1>
    </div>  
    <img src="{{ asset('images/whiteWave.png') }}" class="wave-img" alt="no image"/>
    <section>
      <div class="container" id="text">
        <P>
            {{ __('policy.privacy') }}
            <br>
            {{ __('policy.s1') }}
        </P>
        <p>
           {{ __('policy.s2') }}
        </p>
        <p>
           {{ __('policy.s3') }}
        </p>
        <p>
           {{ __('policy.a') }}
           <br>
           {{ __('policy.s4') }}
        </p>
        <p>
           {{ __('policy.s5') }}
           <br>
           {{ __('policy.s6') }}
        </p>
        <p>
           {{ __('policy.s7') }}
        </p>
        <p>
           {{ __('policy.s8') }}
        </p>
        <p>
           {{ __('policy.s9') }}
           <br>
           {{ __('policy.s10') }}
        </p>
        <p>
           {{ __('policy.s11') }}
           <br>
           {{ __('policy.s12') }}
           <br>
           {{ __('policy.s13') }}
           <br>
           {{ __('policy.s14') }}
           <br>
           {{ __('policy.s15') }}
           <br>
           {{ __('policy.s16') }}
           <br>
           {{ __('policy.s17') }}
        </p>
        <p>
           {{ __('policy.s18') }}
           <br>
           {{ __('policy.s19') }}
        </p>
        <p>
          {{ __('policy.s20') }}
        <br>
           {{ __('policy.s21') }}
        </p>
        <p>
           {{ __('policy.s22') }}
        </p>
        <p>
       {{ __('policy.s23') }}
      </p>
      <p>
       {{ __('policy.s24') }}
        <br>
        {{ __('policy.s25') }}
      </p>
      <p>
        {{ __('policy.s26') }}
      </p>
      <p>
        {{ __('policy.s27') }}
      </p>
      <p>
        {{ __('policy.s28') }}
      </p><p>
        {{ __('policy.s29') }}
      </p><p>
        {{ __('policy.s30') }}
      </p><p>
        {{ __('policy.s31') }}
      </p><p>
        {{ __('policy.s32') }}
        <br>
        {{ __('policy.s33') }}
      </p><p>
        {{ __('policy.s34') }}
      </p><p>
        {{ __('policy.s35') }}
      </p><p>
        {{ __('policy.s36') }}
      </p><p>
        {{ __('policy.s37') }}
      </p><p>
        {{ __('policy.s38') }}
      </p><p>
        {{ __('policy.s39') }}
      </p><p>
        {{ __('policy.s40') }}
      </p><p>
        {{ __('policy.s41') }}
        <br>
        {{ __('policy.s42') }}
      </p><p>
        {{ __('policy.s43') }}
      </p>
      </div>
    </section>
    
 @include('awtar.footerAndNav.footer')
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
</body>
</html>