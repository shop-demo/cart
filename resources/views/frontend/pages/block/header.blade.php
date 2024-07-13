 <!-- header -->
      <header id="default_header" class="header_style_1" style="position: fixed; width: 100; width: 100%; z-index: 100">
         <!-- header top -->
         <div class="header_top">
            <div class="container">
               <div class="row">
                  <div class="col-md-9 col-lg-9">
                     <div class="full">
                        <div class="topbar-left">
                           <ul class="list-inline">
                              <li> <span class="topbar-label"><i class="fa  fa-home"></i></span> <span class="topbar-hightlight">540 Lorem Ipsum New York, AB 90218</span> </li>
                              <li> <span class="topbar-label"><i class="fa fa-envelope-o"></i></span> <span class="topbar-hightlight"><a href="https://html.design/cdn-cgi/l/email-protection#11787f777e51687e6463757e7c70787f3f727e7c"><span class="__cf_email__" data-cfemail="96fff8f0f9d6eff9e3e4f2f9fbf7fff8b8f5f9fb">[email&#160;protected]</span></a></span> </li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-3 col-lg-3 right_section_header_top">
                     <div class="float-right">
                        <div class="social_icon">
                           <ul class="list-inline">
                              <li><a class="fa fa-facebook" href="https://www.facebook.com/" title="Facebook" target="_blank"></a></li>
                              <li><a class="fa fa-google-plus" href="https://plus.google.com/" title="Google+" target="_blank"></a></li>
                              <li><a class="fa fa-twitter" href="https://twitter.com/" title="Twitter" target="_blank"></a></li>
                              <li><a class="fa fa-linkedin" href="https://www.linkedin.com/" title="LinkedIn" target="_blank"></a></li>
                              <li><a class="fa fa-instagram" href="https://www.instagram.com/" title="Instagram" target="_blank"></a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- end header top Request::is($route) activeMenu(Request::segment(1).'/') route()->getName()-->
       
       @php 
       

       @endphp
         <!-- header bottom -->
         <div class="header_bottom" style="background: #f1f1f1;">
            <div class="container">
               <div class="row ">
                  <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                     <!-- logo start -->
                     <div class="logo"><a href="home.index"><img src="{{url('public/Frontend')}}/images/logos/logo.png" alt="logo" /></a></div>
                     <!-- logo end -->
                  </div>
                  <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                
                    
                     <!-- menu start -->
                     <div class="menu_side">
                        <div id="navbar_menu">

                           <ul class="first-ul">
                              <li>
                                 <a  class="{{ Request::segment(1).'/'=='/' ? 'active' : ''}}" href="{{route('home.index')}}">Home</a>
                              </li>

                               {!!  menu_Dequy($listCategory,$id_cha=0) !!}
                              <!-- giỏ hang-->
                               <li>
                                 @if($cartShop)
                                 <a href="" class="{{ Request::segment(1)=='cart'  ? 'active' : ''}}">Giỏ hàng({{$cartShop->total_quantity}})</a>
                                 @else
                                 <a href="" class="{{ Request::segment(1)=='cart'  ? 'active' : ''}}" >Giỏ hàng(0)</a>
                                 @endif
                                 <ul>
                                    <li ><a  href="{{route('cart.index')}}" data-product-url=" {{route('cart.index')}}" >Danh sách</a></li>
                                 </ul>
                              </li>
                             
                              <!-- đăng nhập-->
                              <li>
                                 @if(auth()->guard('cusFrontend')->check())
                                    <a  href="" style="text-transform: capitalize;">Chào bạn:{{auth()->guard('cusFrontend')->user()->name}}</a>
                                 @else
                                    <a href="{{route('dang-nhap')}}" class="btn-link login_btn {{ Request::segment(1)=='login'? 'active' : ''}}" >Đăng nhập</a>
                                 @endif
                                 
                                 <ul>
                                   @if(auth()->guard('cusFrontend')->check())
                                    <li>
                                    <form action="" method="POST" id="form_logout">
                                     @csrf
                                    <a href="{{route('logoutSubmit')}}" class="btn-link logout_btn">Logout</a>
                                    </form>
                                    </li>
                                   @endif
                                    
                                 </ul>
                              </li>      
                           </ul>
                        </div>
                        <div class="search_icon">
                           <ul>
                              <li><a href="#" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                           </ul>
                        </div>
                     </div>
                     <!-- menu end -->
                     <!-- -->
                  </div>
               </div>
            </div>
         </div>
         <!-- header bottom end -->
      </header>
      <!-- end header -->