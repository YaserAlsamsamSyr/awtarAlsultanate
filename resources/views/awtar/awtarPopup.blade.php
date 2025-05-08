<div id="viewshop" align="center" >
    <div id="backColor">
      <div id="divImg" >
          <div id="img"><img width="50" height="50" src="https://img.icons8.com/ios-filled/50/FFFFFF/checkmark--v1.png" alt="checkmark--v1"/></div>
      </div>
      <div id="success">{{ __('index.addedd') }}</div>
      <div id="total">
        <div>
            @php
            $totalPrice=0;
         @endphp 
         
         @if (session('card'))
             @foreach ( Session::get('card') as $i )
                 @php
                     $totalPrice+= $i['quantity']*$i['price']
                 @endphp
             @endforeach
         @endif
          [OMR {{ $totalPrice }}] 
        </div>
        <div>
          {{ __('index.amountInCard') }}
        </div>
        <div>
            @if (session('quan'))
                {{ session('quan') }}
            @endif 33
        </div>
      </div>
      <div id="btns">
        <a href="{{ route('viewCard') }}"><button id="viewcard">{{ __('index.viewCard') }}</button></a>
        <a href="{{ route('con') }}"><button id="con">{{ __('index.continueShop') }}</button></a>
      </div>
    </div>
</div>