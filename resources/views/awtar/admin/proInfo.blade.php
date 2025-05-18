<!DOCTYPE html>
<html class="html yes-js js_active js" dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
    <link href="{{ asset('css/proInfo.css') }}" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/aawtar.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!---->
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@400..700&display=swap" rel="stylesheet">
    <style>
          .second-part input,.second-part select,.second-part textarea{
            background-color: black;
        border:1px solid #ffffff;
        color: #ffffff;
        height: 40px;
        border-radius: 4px;
        width:100%;
        padding-right:5px;
          }
          .second-part .inpt-sub{
                     width:100%;
                     background-color: #B89761;
                     color: #ffffff;
                     height:55px;
                     border-width: 0px;
                     margin-top: 20px;
          }
          .second-part .inpt-sub:hover{
                     background-color: #da9932;
          }
          #imgspe{
               height: 60% !important;
               width: 60%!important;
          }
    </style>
</head>
<body>
    
@auth
@if($accType=="aaddmmii0n0n")
  @include('awtar.admin.nav') 
  <div >
    @foreach ($errors->all() as $error)
       <div class="alert alert-danger" style="background-color: rgb(190, 95, 95);color:white;border:0px;text-align:center;" role="alert">
        {{ $error }}
       </div>
       @break
    @endforeach
</div>
     <div class="container product-info">
             <div class="row first-row">
                      <div class="col-sm-12 col-md-12 col-lg-6 first-pa">
                            <div class="slide-container">
                                 @foreach ($pro->imgs as $p)
                                       <!-- Full-width images with number text -->
                                       <div class="mySlides">
                                           <img src="{{ $p->img }}" id="imgspe">
                                       </div>
                                  @endforeach
                                  <!-- Next and previous buttons -->
                                  <a class="prev" onclick="plusSlides(-1)">&#10095;</a>
                                  <a class="next" onclick="plusSlides(1)">&#10094;</a>
                            </div>
                            <button id="btnDeletePro" onclick="hid()" style="color:yellow;border:1px solid yellow;background:black;width:20%;height:40px;margin-top:50px;">حذف</button>
                            <form action="{{ env('APP_URL') }}product/{{ $pro->id }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input id="deletePro" type="submit" value="تاكيد الحذف" style="visibility:hidden;color:white;background-color:red;border:0px;width:100%;height:40px;" /> 
                            </form>
                      </div>
                      <div class="col-sm-12 col-md-12 col-lg-6 second-part">

                      
                        <form action="{{ env('APP_URL') }}product/{{ $pro->id }}" method="post" enctype="multipart/form-data" >
                          @csrf 
                          @method('PUT')
                              <p>(صور عن المنتج) يجب اعادة اختيار صور </p>
                              <input type="file" accept="image/jpeg, image/jpg, image/png, image/gif" title="اختر اكثر من صورة" name="imgs[]" multiple="multiple" required />
                            
                              <p>اسم العطر(عربي)</p>
                              <input type="text" name="name" value="{{ $pro->name }}" required />
                              <p>اسم العطر(انكليزي)</p>
                              <input type="text" name="enName" value="{{ $pro->enName }}" required />
                                                       
                              <p>سعر العرض (اختياري)</p>
                              <input type="text" name="newPrice" value="{{ $pro->newPrice }}" required  />
                         
                              <p>سعر المنتج</p>
                              <input type="text" name="oldPrice" value="{{ $pro->oldPrice }}" required  />
                            
                              <p>الفئة  الحالية {{ $pro->category->category }}</p>
                              <select name="category" >
                                   <option value="{{ $pro->category_id }}" @checked(true)>{{ $pro->category->category }}</option>
                                @foreach ($categories as $c)
                                   <option value="{{ $c->id }}">{{ $c->category }}</option>
                                @endforeach
                              </select>
                              <p>وصف المنتج(عربي)</p>
                              <textarea name="desc" style="height:200px;" rows="4" cols="50" required>{{ $pro->desc }}</textarea>
                              <br>
                              <p>وصف المنتج(انكليزي)</p>
                              <textarea name="enDesc" style="height:200px;" rows="4" cols="50" required>{{ $pro->desc }}</textarea>
                              <br>
                              <input type="submit" class="inpt-sub" value="تعديل"/>
                    </form>
                      </div>
             </div>
            </div>
            
             {{-- <div class="row">
                  <div class="col-sm-12 d-flex justify-content-end ">

                  </div>
             </div> --}}
        </div>
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
     <script>
    function hid(){
      document.getElementById('btnDeletePro').style.visibility="hidden";
      document.getElementById('deletePro').style.visibility="visible";
    }
      let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("demo");
  let captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
     </script>
@endif
@endauth
</body>
</html>