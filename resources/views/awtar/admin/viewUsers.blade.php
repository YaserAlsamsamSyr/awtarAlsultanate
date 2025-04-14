
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
    <style>
      #updatepassword{
        background-color: rgb(148, 148, 59);
        width: 40%;
      }
      #updatepasswordinput{
        width: 40%;
      }
      #updatepassword:hover{
        background-color: rgb(92, 92, 34);
      }
    </style>
</head>
<body>
@auth
@if($accType=="aaddmmii0n0n")
  @include('awtar.admin.nav') 
  <br><br>
    <div class="container">
        <h1 style="color:white;text-align:center;">جميع المستخدمين</h1>
        <div class="row">
           @foreach ($users as $user)
                           <div class="col-sm-12 d-flex justify-content-center ">   
                            <div class="bill d-flex flex-column">
                              <h3 align="center" >{{ $user->name }}</h3>
                              <h3 align="center" >{{ $user->email }}</h3>
                              <a align="center" class="m-2" href="{{ route('viewOrders',$user->id) }}">طلبات هذا المستخدم</a>
                              <form action="{{ route('user.update.password') }}" method="post" align="center">
                                  @csrf
                                  <div class="m-2">
                                      <input type="hidden" name="userId" value="{{ $user->id }}" />
                                      <input type="password" name="password" placeholder="new password" id="updatepasswordinput" class="p-2" required />
                                  </div>
                                  <div class="m-2">
                                        <input type="submit" value="تعديل كلمة سر" id="updatepassword" class="p-2"/>
                                  </div>
                              </form>
                              @if($errors->any())
                                  <div class="alert alert-danger" role="alert">
                                        @foreach ($errors->all() as $error)
                                        {{$error}}
                                        @break
                                        @endforeach
                                  </div>
                              @endif
                                <div class="flex">
                                  <form action="{{ env('APP_URL') }}deleteUser/{{ $user->id }}" method="post">
                                      @csrf
                                      @method('DELETE')
                                      <input id="deletePro{{ $user->id }}" type="submit" value="تاكيد الحذف (سيتم حذف كل شيء متعلق به)" style="visibility:hidden;color:white;background-color:red;border:0px;width:100%;height:40px;" /> 
                                  </form>
                                  <button id="btnDeletePro{{ $user->id }}" onclick="hid({{ $user->id }})" style="color:red;border:1px solid red;background:black;width:20%;height:40px;margin-top:50px;">حذف</button>
                                 
                                </div>             
                            </div>
                      </div>
           @endforeach
        </div>
    </div>
    <br>
    <div align="center">
        {{ $users->links() }}
    </div>
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