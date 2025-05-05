<!DOCTYPE html>
<html class="html yes-js js_active js" dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('index.app_name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!---->
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@400..700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
    <link href="{{ asset('css/shippingCard.css') }}" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/aawtar.jpg') }}">
</head>
<body>
  
  @include('awtar.footerAndNav.nav') 
     <h1 class="h1-delivery"><a href="#">{{ __('shiping.pay') }}</a></h1>
      @if(Session::has('card'))
     <section>
            <div class="container shipping-card">

              @if(Session::has('card'))
                @foreach (Session::get('card') as $i)
                      <div class="row first-row">
                          <div class="col-md-4 col-sm-12  section-one">
                              <div class="div-btn-remove-shipping">
                                    <button class="remove-from-shipping">
                                         <a href="{{ env('APP_URL') }}removeFromCard/{{ $i['id'] }}" style="text-decoration: none;width:auto;color:white;margin-right:0px;">X</a>
                                    </button>
                              </div>
                              <a href="{{ env('APP_URL') }}product/{{ $i['id'] }}" ><img src="{{ $i['img'] }}" alt="no image" class="img-fluid "/></a>
                          </div>
                          <div class="col-md-8 col-sm-12 d-flex align-items-center section-tow">
                             <p class="flex-fill"><a href="{{ env('APP_URL') }}product/{{ $i['id'] }}">{{ $i['name'] }}</a></p>
                             <p class="flex-fill">{{ $i['price'] }} OMR</p>
                             <div class="d-flex flex-fill select-quantity">
                                     <button onclick="plusOne({{ $i['id'] }})" class="plus-btn">+</button>
                                     <input name="quantity" type="number" id="quan{{ $i['id'] }}" value="{{ $i['quantity'] }}" min="1" max="100" readonly title="{{ __('index.amounts') }}" onkeyup="chcekSize(this)" />
                                     <button class="min-btn" onclick="minusOne({{ $i['id'] }})">-</button>
                             </div>
                             <p class="flex-fill">{{ $i['price']*$i['quantity'] }} OMR</p>
                          </div>
                      </div>
                      @endforeach
                      @endif
                   <form action="{{ env('APP_URL') }}updateCard" method="post">
                    @csrf
                     <div class="row second-row">
                            <div class="col-sm-12 update-card d-flex justify-content-center">
                              
                              @foreach ( Session::get('card') as $i )
                                    <input type="hidden" id="pro{{ $i['id'] }}quan" name="pro{{ $i['id'] }}quan" value="{{ $i['quantity'] }}"/>    
                                @endforeach
                                
                                <input type="submit" id="f1" class="inpt-ok" value="{{ __('shiping.update_cart') }}" />
                            </div>
                      </div>
                      
                   </form>
                <br>
                <br>
                <div class="row third-row">
                  <div class="col-sm-12 col-md-6"></div>
                  <div class="col-md-6 col-sm-12 d-flex flex-column">
                      <h6>{{ __('shiping.Total_Shopping_Cart') }}</h6>
                      <hr>
                      <div class="info-card d-flex justify-content-around">
                              <div class="row-with-flex d-flex flex-column">
                                <h4>{{ __('shiping.Charging') }}</h4>
                                <h4 class="h4-2">{{ __('index.amounts') }}</h4>
                                <h4 class="h4-2">{{ __('confirmOrder.total') }}</h4>
                              </div>
                              <div class="row-with-flex d-flex flex-column">
                                <p>{{ __('shiping.delivery') }}</p>
                                <p  class="pp-2">{{ session('quan') }}</p>
                                @php
                                   $totalPrice=0;
                                @endphp 
                                @foreach ( Session::get('card') as $i )
                                    @php
                                              $totalPrice+= $i['quantity']*$i['price']
                                    @endphp
                                @endforeach
                                <p class="pp-3">{{ $totalPrice }} OMR</p>
                              </div>
                      </div>
                      @foreach ( Session::get('card') as $i )
                           <a href="{{ route('confirmOrder') }}">{{ __('shiping.Apply_to_complete_the_order') }}</a>
                           @break
                      @endforeach
                  </div>
            </div>
            </div>
     </section>
@endif
     @include('awtar.footerAndNav.footer')
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
     
     <script>
          function chcekSize(inpt,id) {
              let number=inpt.value;
              if(number > 100 || number <1){
                // inpt.style.outlineStyle: solid;
                inpt.style.outlineColor="red";
                inpt.style.color="red";
                inpt.style.borderColor="red";
                document.getElementById('f1').style.visibility="hidden";
              } else {
                inpt.style.color="#f9ce8a";
                inpt.style.borderColor="#ffffff";
                inpt.style.outlineColor="#ffffff";
                
        console.log(document.getElementById('pro'+id+'quan'))
                document.getElementById("pro"+id+"quan").value=number;
                document.getElementById('f1').style.visibility="visible";
          }
      }
      function animateCount(inpt) {
        inpt.classList.add('animate');
        setTimeout(() => {
          inpt.classList.remove('animate');
        }, 200);
      }
      function plusOne(id) {
        document.getElementById("quan"+id).stepUp();
        let inpt=document.getElementById('quan'+id);
        animateCount(inpt);
        chcekSize(inpt,id);
      }
      function minusOne(id) {
        document.getElementById("quan"+id).stepDown(); 
        let inpt=document.getElementById('quan'+id);
        animateCount(inpt);
        chcekSize(inpt,id);
      }
      </script>
</body>
</html>