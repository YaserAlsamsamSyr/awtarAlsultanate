
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
    
    <link rel="icon" type="image/x-icon" href="{{ asset('images/aawtar.jpg') }}">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- icon library -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!---->

    <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@400..700&display=swap" rel="stylesheet">

</head>
<style>
      .bill .update .txt,
      .bill .create .txt{
              background-color: black;
              border:1px solid #ffffff;
              color: #ffffff;
              height: 40px;
              border-radius: 4px;
              width:50%;
              padding-right:5px;
      }
      .bill .update .sub,
      .bill .create .sub{
                           width:50%;
                           background-color: #B89761;
                           color: #ffffff;
                           height:40px;
                           border-width: 0px;
                           margin-top: 20px;
      }
      .bill .update .sub:hover,
      .bill .create .sub:hover{
                           background-color: #da9932;
      }
</style>
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
<br><br>
    <div class="container">
        <h1 style="color:white;text-align:center;">جميع الفئات</h1>
        <div class="row">
          <div class="col-sm-12 d-flex justify-content-center ">
              
            <div class="bill">
                  <h2 style="color:white;"> انشاء فئة جديدة </h2>
                <form action="{{ env('APP_URL') }}category" method="post"  class="create">
                        @csrf
                        <input type="text" name="category" value="{{ old('category') }}" class="txt" required/>
                        <input type="submit" value="انشاء" class="sub" />
                </form>

            </div>

      </div>
           @foreach ($categories as $cat)
                           <div class="col-sm-12 d-flex justify-content-center ">
              
                            <div class="bill">
              
                                <form action="{{ env('APP_URL') }}category/{{ $cat->id }}" method="post" class="update" >
                                        @csrf
                                        @method('PUT')
                                        <input class="txt" type="text" name="category" value="{{ $cat->category }}" required/>
                                        <input class="sub" type="submit" value="تعديل" />
                                </form>
                                <div class="flex">
                                  <button id="btnDeletePro{{ $cat->id }}" onclick="hid({{ $cat->id }})" style="color:red;border:1px solid red;background:black;width:20%;height:40px;margin-top:50px;">حذف</button>
                                  <form action="{{ env('APP_URL') }}category/{{ $cat->id }}" method="post">
                                      @csrf
                                      @method('DELETE')
                                      <input id="deletePro{{ $cat->id }}" type="submit" value="تاكيد الحذف (سيتم حذف جميع المنتجات المتعلقة بها)" style="visibility:hidden;color:white;background-color:red;border:0px;width:100%;height:40px;" /> 
                                  </form>
                                </div>
                                  
                                 
              
                            </div>
              
                      </div>
           @endforeach
            


        </div>

    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <script>
        function hid(id){
                 document.getElementById('btnDeletePro'+id).style.visibility="hidden";
                 document.getElementById('deletePro'+id).style.visibility="visible";
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    @endif
    @endauth
</body>
</html>