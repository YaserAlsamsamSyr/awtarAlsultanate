<footer style="background-color: black">
    <div class="container footer">
      <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12 about-awtar">
              <h5 class="h5">عن أوتار السلطنة</h5>
              <div class="item-location d-flex">
                <img src="{{ asset('images/footerAndNav/location.png') }}"/>
                <div class="location-desc desc">
                  <h5>العنوان</h5>
                  <p class="margin-top" style="color:white!important;">سلطنة عمان - مسقط - الخوض</p>
                </div>
              </div>
                <div class="item-call d-flex">
                  <img src="{{ asset('images/footerAndNav/call.png') }}"/>
                  <div class="call-desc desc">
                    <h5>هاتف</h5>
                    <a href="tel:0096895310290" class="nav-link margin-top desc-hover">+968-95310290</a>
                  </div>
                </div>
                <div class="item-email d-flex">
                    <img src="{{ asset('images/footerAndNav/email.png') }}"/>
                    <div class="email-desc desc">
                      <h5>ايميل</h5>
                      <a href="mailto:awtaralstanate@gmail.com" class="nav-link margin-top desc-hover">awtaralstanate@gmail.com</a>
                    </div>
                </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 products">
              <h5 class="h5-padding">المنتجات</h5>
              {{-- <div class="d-flex">
                  <a href="{{ env('APP_URL') }}product?id=-1" class="nav-link">جميع المنتجات</a>
              </div> --}}
              @php
                $count=1;
              @endphp
              @foreach ($categories as $c)
                  @if($count==1)
                      <div class="d-flex pt-3">
                  @endif
                      <a href="{{ env('APP_URL') }}product?id={{ $c->id }}" class="nav-link">{{ $c->category }}</a>
                  @if($count==2)    
                     </div>
                  @endif
                  @if ($count==2)
                     @php
                       $count=0;
                     @endphp
                  @endif
                  @php
                     $count++;
                  @endphp
                @endforeach
                @if($count==2)
                    </div>
                @endif
        </div>
        <div class="col-lg-2 col-md-6 col-sm-12 sub-page">
          <h5 class="h5-padding h5-padding-md">الصفحات الجانبية</h5>
          <a href={{ route('company') }} class="nav-link d-flex pt-1">
            <P class="border-circle"></P>
            <P class="p-content">لمحة عن شركة</P>
          </a> 
          <a href="{{ route('index') }}" class="nav-link d-flex">
              <P class="border-circle"></P>
              <P class="p-content">الصفحة الرئيسية</P>
          </a>
          <a href="{{ route('contactUs') }}" class="nav-link d-flex pt-1">
            <P class="border-circle"></P>
            <P class="p-content">اتصل بنا</P>
          </a>
          <a href="{{ route('terms') }}" class="nav-link d-flex pt-1">
            <P class="border-circle"></P>
            <P class="p-content">الاحكام و الشروط</P>
          </a>
          <a href={{ route('policy') }} class="nav-link d-flex pt-1">
            <P class="border-circle"></P>
            <P class="p-content">سياسة الخصوصية</P>
          </a>  
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 icons">
          <h5 class="h5-padding h5-padding-md">من دارنا الى دارك</h5>
                    <div class="social-icons">
                         <div class="d-flex">
                              <!-- Facebook -->
                              <div class="icon facebook">
                                  <div class="tooltip">Facebook</div>
                                  <span><a href="https://www.facebook.com/profile.php?id=61575203096918"><i class="fa fa-facebook"></i></a></span>
                              </div>
                              <!-- Instagram -->
                              <div class="icon instagram">
                                  <div class="tooltip">Instagram</div>
                                  <span><a href="https://www.instagram.com/awtar_alsultanate_perfum?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="><i class="fa fa-instagram"></i></a></span>
                              </div>
                           <!-- Youtube -->
                            <div class="icon youtube">
                                <div class="tooltip">YouTube</div>
                                <span><a href="https://youtube.com/@awtaralsltanate9145?si=5LjrNPP1Y0vKFJSe"><i class="fa fa-youtube-play"></i></a></span>
                            </div>
                         </div>
                         <div class="d-flex whatsApp">
                            <!-- WahtsApp -->
                            <div class="icon whatsapp">
                                <div class="tooltip">Whatsapp</div>
                                <span><a href="https://wa.me/message/UHQFIUY6L7AHC1"><i class="fa fa-whatsapp"></i></a></span>
                            </div>
                           <!-- twitter -->
                            <div class="icon twitter">
                                <div class="tooltip">Twitter</div>
                                <span><a href="https://x.com/awtaralsltanate?s=11&t=YX3fD1Eoa4binVwHohzecA"><i class="fa fa-twitter"></i></a></span>
                            </div>
                            {{-- titok --}}
                            <div class="icon tiktok">
                              <div class="tooltip">TikTok</div>
                              <a herf="https://www.tiktok.com/@awtar_alsultanate_perfum?_t=ZS-8vY6iQVTtcl&_r=1">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="fa-tiktok" viewBox="0 0 16 16">
                                   <path d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3z"/>
                                 </svg>
                              </a>
                          </div>
                            {{--  --}}
                        </div>
                    </div>
                    <br>
                      <div class="logo">
                        <a href="{{ route('index') }}" class="nav-link"><img src="{{ asset('images/footerAndNav/awtar.png') }}" class="logo-img"></a>
                      </div>
        </div>
      </div>
    </div>
    <br>
    <br>
    <div class="Copyright">
      <p>Copyright 2025- Awtar Alsultanate for Perfumes</p>
    </div>
  </footer>