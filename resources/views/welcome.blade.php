@extends('frontend.client')
@section('main')
      <!-- slider -->
       @include('frontend.pages.block.slider')
      <!-- end slider -->
      <!-- section sản phẩm nổi bật-->
       <div class="section padding_layout_1 portfolio_section">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <div class="main_heading text_align_center">
                        <h2><span>Sản phẩm nổi bật</span></h2>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <div class="gallery_tab">
                        <div class="center">
                           <div class="tab_buttons">
                              @if($tabs->count())
                              <button class="cuts_bt filter-button" data-filter="all">All Projects</button>
                              @foreach($tabs as $key=>$btn)
                              <button class="cuts_bt filter-button" data-filter="houses_{{$btn->id}}">{{$btn->tabs_name }}</button>
                              @endforeach
                             @endif
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
              
                <!-- end button -->
               @if($tabs->count())
                  @foreach($tabs as $key=>$btn)
                     @foreach($btn->pro as $key=>$val)
                  <div class="gallery_product col-lg-3 col-md-3 col-sm-3 col-xs-6 filter houses_{{ $btn->id}} furniture">
                     <div class="product_list">
                        <div class="product_img p-img" style="background: none; border: 5px solid #f1f1f1;"> <img class="img-responsive" src="{{url('public/uploads')}}/Products/{{ $val->avatar}}" alt=""> </div>
                        <div class="product_detail_btm b-productDetail" style="background: #f8f9fa;">
                           <div class="center" >
                              <h4 class="p-name text-p"><a href="{{ route('product_Details',['page'=>$btn->code,'slug'=>$val->code]) }}">{{ $val->name}}</a></h4>

                           </div>
                           <div class="starratin s-star">
                              <div class="center"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </div>
                           </div>
                           <div class="product_price">
                              <p>
                              @if($val->sale >0 && $val->sale < $val->price)
                              <span class="old_price o-price">{{ number_format($val->price)}} vnđ</span></br> 
                              <span class="new_price n-price">{{number_format($val->sale)}} vnđ</span>
                              @else
                               <span class="old_price o-price" style="text-decoration:none; font-weight: 600;">{{number_format($val->price) }} vnđ</span> 
                              @endif
                              </p>
                           </div>
                           <!--add mua ngay -->
                           <div class="d-flex justify-content-around" style="margin-top: 15px;">
                              <p class="fs-4">status</p>
                              <form action="" method="post">
                              @csrf
                              <input type="hidden" value="{{route('cart.add')}}" name="url" class="input_route"/>
                              <p><button type="" class="btn-link bt_addCart" data-product-id="{{$val->id}}" style="border: none;">Mua ngay</button></p>
                              <form>
                           </div>
                           <!-- end add mua ngay -->
                        </div>
                     </div>
                  </div>
                     @endforeach
                  @endforeach
               @endif
             
            </div> <!-- end row -->
         </div>
      </div>
      <!-- end section sản phẩm nổi bật-->
      <!-- section -->
      <div class="section padding_layout_1" style="padding-top:30px;">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <div class="main_heading text_align_center heading_with_subtitle">
                        <h2><span>Sản phẩm luôn có</span></h2>
                        <p class="large">Mua sắm với chúng tôi<br>happy customer.</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 margin_bottom_30_all">
                  <div class="product_list">
                     <div class="product_img p-img"> <img class="img-responsive" src="{{url('public/Frontend')}}/images/layout_img/1.jpg" alt=""> </div>
                     <div class="product_detail_btm p-productDetail">
                        <div class="center">
                           <h4 class="p-name"><a href="">Product Name</a></h4>
                        </div>
                        <div class="starratin s-star">
                           <div class="center"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </div>
                        </div>
                        <div class="product_price ">
                           <p>
                           <span class="old_price o-price">$1800</span>
                           <span class="new_price n-price">$1500</span>
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 margin_bottom_30_all">
                  <div class="product_list">
                     <div class="product_img p-img"> <img class="img-responsive" src="{{url('public/Frontend')}}/images/layout_img/1.jpg" alt=""> </div>
                     <div class="product_detail_btm p-productDetail">
                        <div class="center">
                           <h4 class="p-name"><a href="">Product Name</a></h4>
                        </div>
                        <div class="starratin s-star">
                           <div class="center"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </div>
                        </div>
                        <div class="product_price ">
                           <p><span class="old_price o-price">$1800</span> <span class="new_price n-price">$1500</span></p>
                        </div>
                     </div>
                  </div>
               </div>
             

            </div>
         </div>
      </div>
      <!-- end section -->
      <!-- proflie -->
       @include('frontend.pages.block.profile')
      <!-- end proflie -->

      <!-- section -->
      <div class="section padding_layout_1 section_information">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <div class="full">
                     <h4>Let us make the differences<br>Interior Design</h4>
                  </div>
                  <div class="full">
                     <a class="read-btn" href="contact.html">Discover Now</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end section -->
     
      <!-- section -->
      <div class="section padding_layout_1">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <div class="main_heading text_align_center heading_with_subtitle">
                        <h2><span>Blog mới nhất</span></h2>
                        <p class="large">We package the products with best Services to make you a<br>happy customer.</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-4">
                  <div class="full blog_colum">
                     <div class="blog_feature_img"> <img src="{{url('public/Frontend')}}/images/layout_img/post-03.jpg" alt="#" /> </div>
                     <div class="post_time">
                        <p><i class="fa fa-clock-o"></i> April 16, 2018 ( In Maintenance )</p>
                     </div>
                     <div class="blog_feature_head">
                        <h4>Itaque earum rerum hic tenetur</h4>
                     </div>
                     <div class="blog_feature_cont">
                        <p>Lorem ipsum dolor sit amet, consectetur quam justo, pretium adipiscing elit. Vestibulum quam justo, pretium eu tempus ut, ...</p>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="full blog_colum">
                     <div class="blog_feature_img"> <img src="{{url('public/Frontend')}}/images/layout_img/post-04.jpg" alt="#" /> </div>
                     <div class="post_time">
                        <p><i class="fa fa-clock-o"></i> April 16, 2018 ( In Maintenance )</p>
                     </div>
                     <div class="blog_feature_head">
                        <h4>Praesentium  Tips To Computer Repair</h4>
                     </div>
                     <div class="blog_feature_cont">
                        <p>Lorem ipsum dolor sit amet, consectetur quam justo, pretium adipiscing elit. Vestibulum quam justo, pretium eu tempus ut, ...</p>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="full blog_colum">
                     <div class="blog_feature_img"> <img src="{{url('public/Frontend')}}/images/layout_img/post-06.jpg" alt="#" /> </div>
                     <div class="post_time">
                        <p><i class="fa fa-clock-o"></i> April 16, 2018 ( In Maintenance )</p>
                     </div>
                     <div class="blog_feature_head">
                        <h4>sapiente earum rerum hic tenetur</h4>
                     </div>
                     <div class="blog_feature_cont">
                        <p>Lorem ipsum dolor sit amet, consectetur quam justo, pretium adipiscing elit. Vestibulum quam justo, pretium eu tempus ut, ...</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end section -->
      <!-- section khách hàng nói gì-->
      <div class="section padding_layout_1 testmonial_section white_fonts">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <div class="main_heading text_align_center">
                        <h2 style="text-transform: none;">Khách hàng nói gì?</h2>
                        <p class="large">Đây là lời chứng thực từ khách hàng..</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12 col-lg-2"></div>
               <div class="col-md-12 col-lg-8">
                  <div class="full">
                     <div id="testimonial_slider" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                           <li data-target="#testimonial_slider" data-slide-to="0" class="active"></li>
                           <li data-target="#testimonial_slider" data-slide-to="1"></li>
                           <li data-target="#testimonial_slider" data-slide-to="2"></li>
                        </ul>
                        <!-- The slideshow -->
                        <div class="carousel-inner">
                           <div class="carousel-item active">
                              <div class="testimonial-container">
                                 <div class="testimonial-photo"> <img src="{{url('public/Frontend')}}/images/layout_img/client1.jpg" class="img-responsive" alt="#" width="150" height="150"> </div>
                                 <div class="testimonial-content"> You guys rock! Thank you for making it painless, pleasant and most of all hassle free! I wish I would have thought of it first. 
                                    I am really satisfied with my first laptop Services. 
                                 </div>
                                 <div class="testimonial-meta">
                                    <h4>Maria Anderson</h4>
                                    <span class="testimonial-position">CFO, Tech NY</span> 
                                 </div>
                              </div>
                           </div>
                           <div class="carousel-item">
                              <div class="testimonial-container">
                                 <div class="testimonial-photo"> <img src="{{url('public/Frontend')}}/images/layout_img/client2.jpg" class="img-responsive" alt="#" width="150" height="150"> </div>
                                 <div class="testimonial-content"> You guys rock! Thank you for making it painless, pleasant and most of all hassle free! I wish I would have thought of it first. 
                                    I am really satisfied with my first laptop Services. 
                                 </div>
                                 <div class="testimonial-meta">
                                    <h4>Maria Anderson</h4>
                                    <span class="testimonial-position">CFO, Tech NY</span> 
                                 </div>
                              </div>
                           </div>
                           <div class="carousel-item">
                              <div class="testimonial-container">
                                 <div class="testimonial-photo"> <img src="{{url('public/Frontend')}}/images/layout_img/client3.jpg" class="img-responsive" alt="#" width="150" height="150"> </div>
                                 <div class="testimonial-content"> You guys rock! Thank you for making it painless, pleasant and most of all hassle free! I wish I would have thought of it first. 
                                    I am really satisfied with my first laptop Services. 
                                 </div>
                                 <div class="testimonial-meta">
                                    <h4>Maria Anderson</h4>
                                    <span class="testimonial-position">CFO, Tech NY</span> 
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-sm-5">
                  <div class="full"> </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end section -->
      <!-- Modal search bar-->
     
     @include('frontend.pages.block.seach')
      <!-- End Model search bar -->
@endsection
