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
    <link rel="icon" type="image/x-icon" href="{{ asset('images/aawtar.jpg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!---->
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@400..700&display=swap" rel="stylesheet">
    @if (explode(" ", $pro->name)[0]=="بخور")
          <style>
              #imgspe{
                   height: 30% !important;
              }
          </style>
    @endif
</head>
<body>
    
  @include('awtar.footerAndNav.nav') 
     <div class="container product-info">
             <div class="row first-row">
                      <div class="col-sm-12 col-md-12 col-lg-6 first-pa">
                            <div class="slide-container">
                                 @foreach ($pro->imgs as $p)
                                       <!-- Full-width images with number text -->
                                       <div class="mySlides">
                                           <img src="{{ $p->img }}" id="imgspe" class="navbar-brand">
                                       </div>
                                  @endforeach
                                  <!-- Next and previous buttons -->
                                  <a class="prev" onclick="plusSlides(-1)">&#10095;</a>
                                  <a class="next" onclick="plusSlides(1)">&#10094;</a>
                            </div>
                      </div>
                      <div class="col-sm-12 col-md-12 col-lg-6 second-part">
                            <h2>{{ $pro->name }}</h2>
                            <p>{{ $pro->desc }}</p>
                            

                            <div class="price d-flex">
                                  @if($pro->newPrice==0)
                                     <div class="offer">{{ $pro->oldPrice }} OMR</div>
                                  @else
                                     <div class="no-offer">{{ $pro->oldPrice }} OMR</div>
                                     <div class="offer">{{ $pro->newPrice }} OMR</div>
                                  @endif
                            </div>
                            <div class="quantity">
                                  
                                  <div class="d-flex flex-fill select-quantity">
                                      <button class="min-btn" onclick="minusOne()">-</button>
                                      <input name="q" type="number" id="quan" value="1" min="1" max="100" title="الكمية" onkeyup="chcekSize(this)" />
                                      <button onclick="plusOne()" class="plus-btn">+</button>
                                  </div>
                                  <form action="{{ route('addToCard') }}" method="post">
                                      @csrf
                                      <input type="hidden" name="quantity" value="1" id="qaantity"/>
                                      @if($pro->newPrice==0)
                                         <input type="hidden" name="proPrice" value="{{ $pro->oldPrice }}"/>
                                      @else
                                         <input type="hidden" name="proPrice" value="{{ $pro->newPrice }}"/>
                                      @endif
                                      <input type="hidden" name="proId" value="{{ $pro->id }}"/>
                                      <input type="hidden" name="proName" value="{{ $pro->name }}"/>
                                      <input type="hidden" name="proImg" value="{{ $pro->imgs[0]->img }}"/>
                                      <?php
                                         $isFound=false;
                                      ?>
                                      @if (session('card'))
                                          @foreach (Session::get('card') as $i)
                                              @if($i['id'] == $pro->id)
                                                 <?php $isFound=true; ?>
                                                 @break
                                              @endif
                                          @endforeach
                                      @endif
                                      @if($isFound==true)
                                          <p>تمت اضافة العنصر الى سلة التسوق</p>
                                      @else
                                          <input type="submit" id="f1" class="submit" value="أضافة إلى سلة التسوق" />
                                      @endif
                                  </form>
                            </div>
                      </div>
             </div>
     </div>

     @include('awtar.footerAndNav.footer')
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
     <script>
      function chcekSize(inpt) {
          let number=inpt.value;
          if(number > 100 || number <1){
            // inpt.style.outlineStyle: solid;
            inpt.style.outlineColor="red";
            inpt.style.color="red";
            inpt.style.borderColor="red";
            document.getElementById('f1').style.visibility="hidden";
          } else {
            inpt.style.color="#4a4a4a";
            inpt.style.borderColor="#ffffff";
            inpt.style.outlineColor="#ffffff";
            document.getElementById('qaantity').value=number;
            document.getElementById('f1').style.visibility="visible";
          }
      }
      function plusOne() {
        document.getElementById("quan").stepUp();
        let inpt=document.getElementById('quan');
        chcekSize(inpt);
      }
      function minusOne() {
        document.getElementById("quan").stepDown(); 
        let inpt=document.getElementById('quan');
        chcekSize(inpt);
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
</body>
</html>