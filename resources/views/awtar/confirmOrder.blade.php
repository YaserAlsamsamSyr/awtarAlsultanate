<!DOCTYPE html>
<html class="html yes-js js_active js" dir="rtl" lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('index.app_name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
    <link href="{{ asset('css/confirmOrder.css') }}" rel="stylesheet">
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
             #parts{
              flex-direction: row-reverse;
             }
             #parts .first-part,#parts .second-part{
              direction:ltr;
             }
             #parts .first-part h5{
              font-size:30px;
             }
             #parts .first-part p{
              font-size:20px;
             }
             #parts .second-part h5{
              font-size:30px;
             }
             #parts .second-part p{
              font-size:18px;
             }
             #parts .second-part h6{
              font-size:18px;
             }
             #parts .inpt-sub{
              font-size: 25px;
            }
            #in2{
              width:112%;
            }
            @media (max-width: 1200px) {
                 
                #parts .first-part h5{
                 font-size:20px;
                }
                #parts .first-part p{
                 font-size:16px;
                }
                #parts .second-part h5{
                 font-size:20px;
                }
                #parts .second-part p{
                 font-size:15px;
                }
                #parts .second-part h6{
                 font-size:15px;
                }
                #parts .inpt-sub{
                 font-size: 20px;
                }    
            }
            @media (max-width: 490px) {
                  #part2{
                    padding-left: 50px;
                  }
            } 
        </style>
    @endif
</head>
<body>
    
  @include('awtar.footerAndNav.nav') 
     <div class="msg">
         {{-- <h1 class="h1-delivery"><a href="#">{{ __('confirmOrder.delivery_duration') }}</a></h1> --}}

            @foreach ($errors->all() as $error)
               <div class="alert alert-danger" role="alert">
                {{ $error }}
               </div>
               @break
            @endforeach
     </div>
     <section class="confirmOrder">
        <form action="{{ route('confirmOrderPost') }}" method="post">
              @csrf
              <div class="container">
                  <div id="parts" class="row">
                        <div class="col-lg-6 col-sm-12 d-flex flex-column first-part">
                          
                          <h5>{{ __('confirmOrder.Billing_and_Shipping') }}</h5>
                              <div class="full-name d-flex gap-4">
                                   <div class="first-name d-flex flex-column">
                                            <p>{{ __('confirmOrder.first_name') }}</p>
                                            <input type="text" name="firstName" value="{{ old('firstName') }}" required autofocus/>
                                   </div>
                                   <div class="last-name d-flex flex-column">
                                            <p>{{ __('confirmOrder.last_name') }}</p>
                                            <input type="text" name="lastName" id="in2" value="{{ old('lastName') }}" required  />
                                   </div>
                              </div>
                              <div class="address d-flex flex-column">
                                <p>{{ __('login.Email') }}</p>
                                @auth
                                    <input type="email" name="email" value="{{ auth()->user()->email }}" required  />
                                @endauth
                                @guest
                                    <input type="email" name="email" value="{{ old('email') }}" required  />
                                @endguest
                              </div>
                              <div class="city  d-flex flex-column">
                                <p>{{ __('confirmOrder.city') }}</p>
                                <input type="text" name="city" value="{{ old('city') }}" required  />
                              </div>
                              <div class="address d-flex flex-column">
                                <p>{{ __('confirmOrder.address') }}</p>
                                <input type="text" name="address" value="{{ old('address') }}" required  />
                              </div>
                              <div class="phone d-flex flex-column">
                                <p>{{ __('confirmOrder.phone') }}</p>
                                <input type="text" name="phone" value="{{ old('phone') }}" required  />
                              </div>
                              <div class="notics d-flex flex-column">
                                <p>{{ __('confirmOrder.notes') }}</p>
                                <textarea name="notics" style="background-color: black;" rows="4" cols="50">{{ old('notics') }}</textarea>
                              </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 d-flex flex-column second-part">
                          <br><br>
                          <h5>{{ __('confirmOrder.your_order') }}</h5>
                          <div class="bill d-flex justify-content-around">
                            <div class="section-one d-flex flex-column">
                                  <h6 class="H6">{{ __('confirmOrder.product') }}</h6>
                                  <!-- dynamic based on number of perfumes -->
                                  @foreach ( Session::get('card') as $i )
                                       <p>{{ $i['name'] }}&nbsp;&nbsp;{{ $i['quantity'] }}x</p>
                                  @endforeach
                                  <!--  -->
                                  <p class="H6">{{ __('confirmOrder.total') }}</p>
                                  {{-- <p class="H6">{{ __('confirmOrder.shiping') }}</p> --}}
                            </div>
                            <div class="section-two d-flex flex-column" id="part2">
                                  <h6 class="H6">{{ __('confirmOrder.price') }}</h6>
                                  <!-- dynamic based on number of perfumes -->
                                  @foreach ( Session::get('card') as $i )
                                      <p>{{ $i['price'] }} ORM</p>
                                  @endforeach
                                  <!--  -->
                                  @php
                                      $totalPrice=0;
                                  @endphp 
                                  @foreach ( Session::get('card') as $i )
                                      @php
                                                $totalPrice+= $i['quantity']*$i['price']
                                      @endphp
                                  @endforeach
                                  <p>{{ $totalPrice }} OMR</p>
                                  {{-- <p>{{ __('confirmOrder.Freight_to_be_paid_when_your_order_is_delivered') }}</p> --}}
                            </div>
                          </div>
                          <input type="submit" class="inpt-sub" value="{{ __('confirmOrder.confirm_order') }}"/>
                        </div>
                    </div>
                </div>
        </form>
     </section>

 @include('awtar.footerAndNav.footer')
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
</body>
</html>