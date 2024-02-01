@extends('frontend.client')

@section('main')
      <!-- slider -->
       @include('frontend.pages.block.slider')
      <!-- end slider -->
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
      <div class="section padding_layout_1 portfolio_section">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <div class="main_heading text_align_center">
                        <h2><span>Gallery</span></h2>
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
                              <button class="cuts_bt filter-button" data-filter="all">All Projects</button>
                              @foreach($tabs as $key=>$item)
                              <button class="cuts_bt filter-button" data-filter="houses">{{$item->tabs_name}}</button>
                              @endforeach
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter houses furniture">
                  <img src="{{url('public/frontend')}}/images/layout_img/pr1.png" alt="#" class="img-responsive" />
               </div>
               <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter decoration furniture">
                  <img src="{{url('public/frontend')}}/images/layout_img/pr2.png" alt="#" class="img-responsive" />
               </div>
               <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter houses furniture">
                  <img src="{{url('public/frontend')}}/images/layout_img/pr3.png" alt="#" class="img-responsive" />
               </div>
               <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter decoration office">
                  <img src="{{url('public/frontend')}}/images/layout_img/pr4.png" alt="#" class="img-responsive" />
               </div>
               <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter houses office">
                  <img src="{{url('public/frontend')}}/images/layout_img/pr5.png" alt="#" class="img-responsive" />
               </div>
               <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter decoration office">
                  <img src="{{url('public/frontend')}}/images/layout_img/pr6.png" alt="#" class="img-responsive" />
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
                        <h2><span>Mua sắm với chúng tôi</span></h2>
                        <p class="large">We package the products with best Services to make you a<br>happy customer.</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 margin_bottom_30_all">
                  <div class="product_list">
                     <div class="product_img p-img"> <img class="img-responsive" src="{{url('public/Frontend')}}/images/layout_img/1.jpg" alt=""> </div>
                     <div class="product_detail_btm p-productDetil">
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
               <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 margin_bottom_30_all">
                  <div class="product_list">
                     <div class="product_img p-img"> <img class="img-responsive" src="{{url('public/Frontend')}}/images/layout_img/1.jpg" alt=""> </div>
                     <div class="product_detail_btm p-productDetil">
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
               <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 margin_bottom_30_all">
                  <div class="product_list">
                     <div class="product_img p-img"> <img class="img-responsive" src="{{url('public/Frontend')}}/images/layout_img/1.jpg" alt=""> </div>
                     <div class="product_detail_btm p-productDetil">
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
               <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 margin_bottom_30_all">
                  <div class="product_list">
                     <div class="product_img p-img"> <img class="img-responsive" src="{{url('public/Frontend')}}/images/layout_img/1.jpg" alt=""> </div>
                     <div class="product_detail_btm p-productDetil">
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
               <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 margin_bottom_30_all">
                  <div class="product_list">
                     <div class="product_img p-img"> <img class="img-responsive" src="{{url('public/Frontend')}}/images/layout_img/1.jpg" alt=""> </div>
                     <div class="product_detail_btm p-productDetil">
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
               <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 margin_bottom_30_all">
                  <div class="product_list">
                     <div class="product_img p-img"> <img class="img-responsive" src="{{url('public/Frontend')}}/images/layout_img/1.jpg" alt=""> </div>
                     <div class="product_detail_btm p-productDetil">
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
      <!-- section -->
      <div class="section padding_layout_1 testmonial_section white_fonts">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <div class="main_heading text_align_center">
                        <h2 style="text-transform: none;">What Clients Say?</h2>
                        <p class="large">Here are testimonials from clients..</p>
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
      <!-- Modal -->
      <div class="modal fade" id="search_bar" role="dialog">
         <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
               </div>
               <div class="modal-body">
                  <div class="row">
                     <div class="col-lg-8 col-md-8 col-sm-8 offset-lg-2 offset-md-2 offset-sm-2 col-xs-10 col-xs-offset-1">
                        <div class="navbar-search">
                           <form action="#" method="get" id="search-global-form" class="search-global">
                              <input type="text" placeholder="Type to search" autocomplete="off" name="s" id="search" value="" class="search-global__input">
                              <button class="search-global__btn"><i class="fa fa-search"></i></button>
                              <div class="search-global__note">Begin typing your search above and press return to search.</div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End Model search bar -->
@endsection