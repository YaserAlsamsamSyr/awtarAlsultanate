<!DOCTYPE html>
<html class="html yes-js js_active js" dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
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
</head>
<body>
    
  @include('awtar.footerAndNav.nav') 
     <div class="msg">
         <h1 class="h1-delivery"><a href="#">الدفع عند توصيل</a></h1>

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
                  <div class="row">
                        <div class="col-md-6 col-sm-12 d-flex flex-column first-part">
                              <h5>الفوترة و الشحن</h5>
                              <div class="full-name d-flex">
                                   <div class="first-name d-flex flex-column">
                                            <p>الأسم الأول</p>
                                            <input type="text" name="firstName" value="{{ old('firstName') }}" required autofocus/>
                                   </div>
                                   <div class="last-name d-flex flex-column">
                                            <p>الأسم الأخير</p>
                                            <input type="text" name="lastName" value="{{ old('lastName') }}" required  />
                                   </div>
                              </div>
                              <div class="city  d-flex flex-column">
                                <p>المدينة</p>
                                <input type="text" name="city" value="{{ old('city') }}" required  />
                              </div>
                              <div class="address d-flex flex-column">
                                <p>عنوان السكن</p>
                                <input type="text" name="address" value="{{ old('address') }}" required  />
                              </div>
                              <div class="phone d-flex flex-column">
                                <p>رقم الهاتف</p>
                                <input type="text" name="phone" value="{{ old('phone') }}" required  />
                              </div>
                              <div class="notics d-flex flex-column">
                                <p>ملاحظات (إختياري)</p>
                                <textarea name="notics" style="background-color: black;" rows="4" cols="50">{{ old('notics') }}</textarea>
                              </div>
                        </div>
                        <div class="col-md-6 col-sm-12 d-flex flex-column second-part">
                          <h5>طلبك</h5>
                          <div class="bill d-flex justify-content-around">
                            <div class="section-one d-flex flex-column">
                                  <h6 class="H6">المنتج</h6>
                                  <!-- dynamic based on number of perfumes -->
                                  @foreach ( Session::get('card') as $i )
                                       <p>{{ $i['name'] }}&nbsp;&nbsp;{{ $i['quantity'] }}x</p>
                                  @endforeach
                                  <!--  -->
                                  <p class="H6">الإجمالي</p>
                                  <p class="H6">الشحن</p>
                            </div>
                            <div class="section-two d-flex flex-column">
                                  <h6 class="H6">المجموع</h6>
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
                                  <p>OMR {{ $totalPrice }}</p>
                                  <p>حساب شحن عند توصيل</p>
                            </div>
                          </div>
                          <input type="submit" class="inpt-sub" value="تأكيد الطلب"/>
                        </div>
                    </div>
                </div>
        </form>
     </section>

 @include('awtar.footerAndNav.footer')
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
</body>
</html>