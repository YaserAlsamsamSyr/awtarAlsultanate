
<!DOCTYPE html>

<html class="html yes-js js_active js" dir="rtl" lang="ar">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <link href="{{ asset('css/index.css') }}" rel="stylesheet">

    <link href="{{ asset('css/order.css') }}" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    
    <link rel="icon" type="image/x-icon" href="{{ asset('images/aawtar.png') }}">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- icon library -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!---->

    <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@400..700&display=swap" rel="stylesheet">

</head>

<body>

    
  @include('awtar.admin.nav') 

    <div class="container">

        <div class="row">
           @foreach ($orders as $order)
                           <div class="col-sm-12 d-flex justify-content-center ">
              
                            <div class="bill">
              
                                <h3>الطلب {{ $loop->index+1 }} : {{ $order[0]->pivot->day }}\{{ $order[0]->pivot->month }}\{{ $order[0]->pivot->year }}</h3>
                                
                                  <div class="order-info d-flex justify-content-around">
                                      
                                      <div class="part-1">
                
                                           <h4>المنتج</h4>
                                            
                                           <br>
              
                                           @foreach ($order as $item)
                                              <p>{{ $item->name }} x{{ $item->pivot->quantity }}</p>
                                            @endforeach
                
                
                                           <h4>الضريبة</h4>
                                           <h4>التوصيل</h4>
                                           <h4>الإجمالي</h4>
                                           <br>
                                           <p>الأسم</p>
                                           <p>اللقب</p>
                                           <p>الحساب</p>
                                           <p>رقم الهاتف</p>
                                           <p>العنوان</p>
                                           <p>المدينة</p>
                                           <p>اشعار الدفع</p>
                                           <p>حالة الدفع</p>
                                           <p>ملاحظات</p>
                                      </div>
                  
                                      <div class="part-2">
                
                                           <h4>المجموع</h4>
                
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
                                            <h4>{{ $myCustomers[$loop->index]->vat }} OMR</h4>
                                            <h4>{{ $myCustomers[$loop->index]->delivery }} OMR</h4>
                                            <h4><span style="color:#b7982b;">{{ $total }}</span> ORM</h4>
                                            <br>
                                            <p>{{ $myCustomers[$loop->index]->firstName }}</p>
                                            <p>{{ $myCustomers[$loop->index]->lastName }}</p>
                                            <p>{{ $myCustomers[$loop->index]->email }}</p>
                                            <p>{{ $myCustomers[$loop->index]->phone }}</p>
                                            <p>{{ $myCustomers[$loop->index]->address }}</p>
                                            <p>{{ $myCustomers[$loop->index]->city }}</p>
                                            <p>{{ $myCustomers[$loop->index]->invoId }}</p>
                                            <p>{{ $myCustomers[$loop->index]->check }}</p>
                                            <p>{{ $myCustomers[$loop->index]->notics ?? "لا يوجد ملاحظات" }}</p>
                 
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
</body>
</html>