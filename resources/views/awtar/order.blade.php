
<!DOCTYPE html>

<html class="html yes-js js_active js" dir="rtl" lang="ar">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ __('index.app_name') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <link href="{{ asset('css/index.css') }}" rel="stylesheet">

    <link href="{{ asset('css/order.css') }}" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    
    <link rel="icon" type="image/x-icon" href="{{ asset('images/aawtar.jpg') }}">

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
             #bill,#parts{
                direction: ltr;
             }
        </style>
    @endif
</head>

<body>

    
  @include('awtar.footerAndNav.nav') 

    <div class="container">

        <div class="row">
           @foreach ($orders as $order)
                           <div class="col-sm-12 d-flex justify-content-center ">
              
                            <div id="bill" class="bill">
              
                                <h3>{{ __('order.Order') }} {{ $loop->index+1 }} : {{ $order[0]->pivot->day }}\{{ $order[0]->pivot->month }}\{{ $order[0]->pivot->year }}</h3>
                                
                                  <div id="parts" class="order-info d-flex justify-content-around">
                                      
                                      <div class="part-1">
                                             
                                           <h4>{{ __('order.product') }}</h4>
                                            
                                           <br>
              
                                           @foreach ($order as $item)
                                              <p>{{ $item->name }} x{{ $item->pivot->quantity }}</p>
                                            @endforeach
                
                
                                           <h4>{{ __('order.total') }}</h4>
                                           <br>
                                           <p>{{ __('order.first_name') }}</p>
                                           <p>{{ __('order.last_name') }}</p>
                                           <p>{{ __('order.phone') }}</p>
                                           <p>{{ __('order.address') }}</p>
                                           <p>{{ __('order.city') }}</p>
                                           <p>{{ __('order.notes') }}</p>
                
                                      </div>
                  
                                      <div class="part-2">
                                           <h4>{{ __('order.total') }}</h4>
                
                                           <br>

                                           @php
                                             $total=0;
                                           @endphp
                                           @foreach ($order as $item)
                                              <p>{{ $item->pivot->totalPrice }} ORM</p>
                                              @php
                                              $total+=$item->pivot->totalPrice;
                                            @endphp
                                            @endforeach
                
                                           <h4><span>{{ $total }}</span> ORM</h4>
                                           <br>
                                           <p>{{ $myCustomers[0]->firstName }}</p>
                                           <p>{{ $myCustomers[0]->lastName }}</p>
                                           <p>{{ $myCustomers[0]->phone }}</p>
                                           <p>{{ $myCustomers[0]->address }}</p>
                                           <p>{{ $myCustomers[0]->city }}</p>
                                           <p>{{ $myCustomers[0]->notics ?? __('order.nonotes') }}</p>
                
                                      </div>
                                      
                                  </div>
              
                            </div>
              
                      </div>
           @endforeach
            

        </div>
        @if($myCustomers!=[])
        {{ $myCustomers->links() }}
        @endif
    </div>


    @include('awtar.footerAndNav.footer')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
</body>
</html>