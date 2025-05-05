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
      
@auth
@if($accType=="aaddmmii0n0n")
  @include('awtar.admin.nav') 
     <div class="msg">
            @foreach ($errors->all() as $error)
               <div class="alert alert-danger" style="background-color: rgb(190, 95, 95);color:white;border:0px;text-align:center;" role="alert">
                {{ $error }}
               </div>
               @break
            @endforeach
     </div>
     <section class="confirmOrder">
        <form action="{{ env('APP_URL') }}product" method="post" enctype="multipart/form-data" >
              @csrf
              <div class="container">
                  <div class="row">
                        <div class="col-md-6 col-sm-12 d-flex flex-column first-part">
                              <h5>اضافة منتج جديد</h5>
                              <div class="city  d-flex flex-column">
                                <p>صور عن المنتج</p>
                                <input type="file" accept="image/jpeg, image/jpg, image/png, image/gif" title="اختر اكثر من صورة" name="imgs[]" multiple="multiple" />
                              </div>
                              <div class="city  d-flex flex-column">
                                <p>اسم العطر(عربي)</p>
                                <input type="text" name="name" value="{{ old('name') }}" required autofocus/>
                              </div>
                              <div class="city  d-flex flex-column">
                                <p>سعر العرض (اختياري)</p>
                                <input type="text" name="newPrice" value="0" required  />
                              </div>
                              <div class="address d-flex flex-column">
                                <p>سعر المنتج</p>
                                <input type="text" name="oldPrice" value="{{ old('oldPrice') }}" required  />
                              </div>
                              <div class="address d-flex flex-column">
                                <p>الفئة</p>
                                <select name="category" required >
                                  @foreach ($categories as $c)
                                     <option value="{{ $c->id }}">{{ $c->category }}</option>
                                  @endforeach
                                </select>
                              </div>
                        </div>
                        <div class="col-md-6 col-sm-12 d-flex flex-column second-part">
                          <div class="bill d-flex flex-column justify-content-around">
                            <div class="city  d-flex flex-column">
                              <p>اسم العطر(أنكليزي)</p>
                              <input type="text" name="enName" value="{{ old('name') }}" required autofocus/>
                            </div>
                        </div>
                        <div class="bill d-flex flex-column justify-content-around">
                          <div class="notics d-flex flex-column">
                            <p>وصف المنتج(عربي)</p>
                            <textarea name="desc" style="height:200px;" rows="4" cols="50">{{ old('desc') }}</textarea>
                          </div>
                      </div>
                      <div class="bill d-flex flex-column justify-content-around">
                        <div class="notics d-flex flex-column">
                          <p>وصف المنتج(أنكليزي)</p>
                          <textarea name="enDesc" style="height:200px;" rows="4" cols="50">{{ old('desc') }}</textarea>
                        </div>
                          <input type="submit" class="inpt-sub" value="أنشاء"/>
                    </div>
                    </div>
                </div>
        </form>
        <br><br><br><br>
     </section>
     <script src="https://cdn.jsdelivr.net/cnpm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
     @endif
     @endauth
</body>
</html>