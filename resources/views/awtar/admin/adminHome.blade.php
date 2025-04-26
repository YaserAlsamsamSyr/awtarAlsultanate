<!DOCTYPE html>
<html class="html yes-js js_active js" dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
    <link href="{{ asset('css/products.css') }}" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/aawtar.jpg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- icon library -->     
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!---->
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@400..700&display=swap" rel="stylesheet">

</head>
<body>
@auth
@if($accType=="aaddmmii0n0n")
     @include('awtar.admin.nav')
     <div class="container-fluid">
        <?php
           $count=1;
        ?>
       <div class="view-products">
        @foreach ($products as $i)
            @if($count==1)
               <div class="row">
            @endif
            <div class="col-sm-12 col-md-6 col-lg-3 pt-4">
              
              <a href="{{ env('APP_URL') }}getBarcode/{{ $i->name }}/{{ $i->id }}" style="color:rgb(231, 120, 120);">get barcode</a><br><br>
              <a href="{{ env('APP_URL') }}product/{{ $i->id }}"><img src='{{ $i->imgs[0]->img }}'class="p-2"  /></a>
              <a href="{{ env('APP_URL') }}product/{{ $i->id }}"><h2>{{ $i->name }}</h2></a>
              <div class="price">          
                @if($i->newPrice==0)      
                   <br><div class="height" style="height:17px;"></div>
                   <h5 class="offer">{{ $i->oldPrice }} OMR</h5>
                @else
                   <p class="no-offer">{{ $i->oldPrice }} OMR</p>
                   <h5 class="offre">{{ $i->newPrice }} OMR</h5>
                @endif
              </div>
              <a href="{{ env('APP_URL') }}product/{{ $i->id }}" class="more-info">قراءة المزيد</a>
              
            </div>
            @if($count==4)
                </div>
            @endif
            @if($count==4)
                <?php $count=1;?>
            @else
                <?php $count++;?>
            @endif
        @endforeach
          @if($count!=1)
            </div>
          @endif
          </div>
     </div>
     <br><br>
     <br><br>
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
@endif
@endauth
</body>
</html>