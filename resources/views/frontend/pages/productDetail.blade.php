@extends('frontend.client')
@section('css')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
 <style type="text/css" media="screen">
   .p-breadcrumb{
    width: 100%;
    height:auto;
    border-bottom:  2px solid #c4c4c4;
    padding: 1.2rem 0;
   }
   .p-name_heading{
    margin-top: 1.5rem;
   }
  .pro-breadcrumb_item>a{
    
    padding-right: 0.8rem;

   }
   .pro-breadcrumb_item{
    color: #333 !important;
    font-size: 1rem;
   }
   .pro-breadcrumb_item>a:hover{
    font-weight: 600;
    color: #d7bb3e !important;
   }
   .active{
    color: #d7bb3e !important;
   }
   .product_detail .tab_bar_section ul.nav.nav-tabs li a.active {
    background: #d7bb3e;
    color: #fff !important;
   }
   

 </style>
@endsection 
@section('main')

<!-- inner page banner -->
    <div id="inner_banner" class="section inner_banner_section " style="margin-top:150px; ">
       <div class="container">
          <div class="row">
             <div class="col-md-12">
                <div class="full">
                   <div class="title-holder">
                      <div class="title-holder-cell text-left">
                         <h1 class="page-title">Shop Detail</h1>
                        <nav aria-label="breadcrumb">
                          <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home.index')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('view',['slug'=>$productDetail->pro_category->code])}}">{{$productDetail->pro_category->name}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page" style="color: #fff;"><a href="" 
                            class="{{Request::segment(2)==$productDetail->code ?'active':''}}" >{{$productDetail->name}}</a></li>
                          </ol>
                        </nav>

                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
    <!-- end inner page banner -->
    @php 
    
    @endphp
    <!-- section -->
    <p id="html"></p>
    <div class="section padding_layout_1 product_detail">
       <div class="container">
         <!-- thong bao -->
         @if(session('message'))
         @include('frontend.pages.block.mgs')
         @endif
         <!-- end thong bao --> 
          <div class="row">
             <div class="col-md-12">
                <div class="row">
                   <div class="col-lg-8 col-md-12">
                    <!--product_detail_feature_img pc -->
                       <div class="col-lg-12 d-inline-flex p-3 pc" >
                          <div class="col-lg-9">
                            <div class="product_detail_feature_img hizoom hi2">
                               <div class="hizoom hi2"><img src="{{url('public')}}/uploads/Products/{{$productDetail->avatar}}" alt="#" class="img-hi2 main_img"  /></div>
                            </div>
                          </div>
                          <div class="col-lg-3">
                            <div class="p-zoom " style="border: 1px solid #ccc;">
                            @php
                               $albumImag = json_decode($productDetail->album_image); @endphp
                               @if($albumImag)
                               @foreach($albumImag as $key=>$img)
                                <span class="p-2 show" style="padding: 0px !important;">
                                <img src="{{url('public')}}/uploads/Products/{{$img}}" alt="#" class="img-hi2 show_imge"/></span>
                               @endforeach
                               @endif
                            </div>
                          </div>
                         
                       </div>
                   <!-- end product_detail_feature_img pc -->
                      <div class="product_detail_feature_img hizoom hi2 mob">
                         <div class="hizoom hi2"><img src="{{url('public')}}/uploads/Products/{{$productDetail->avatar}}" alt="#" class="img-hi2 main_img"  /></div>
                      </div>
                      <!-- zoom -->
                      <div class="p-zoom d-inline-flex p-3 mob" style="border: 1px solid #ccc;">
                      @php
                         $albumImag = json_decode($productDetail->album_image); @endphp
                         @if($albumImag)
                         @foreach($albumImag as $key=>$img)
                          <span class="p-2 show">
                          <img src="{{url('public')}}/uploads/Products/{{$img}}" alt="#" class="img-hi2 show_imge"/></span>
                         @endforeach
                         @endif
                     
                      </div>

                   </div>
                    
                   <!-- product_detail -->
                   <div class="col-lg-4 col-md-12 product_detail_side detail_style1">
                   <!-- breadcrumb_item -->
                   <div class="p-breadcrumb">
                     <ul class="d-inline-flex">
                       <li class="pro-breadcrumb_item"><a href="{{route('home.index')}}">Home</a></li>
                       <li class="pro-breadcrumb_item"><a href="{{route('view',['slug'=>$productDetail->pro_category->code])}}">{{$productDetail->pro_category->name}}</a></li>
                       <li class="pro-breadcrumb_item"><a href="" class="{{Request::segment(2) == $productDetail->code ? 'active':''}}">{{$productDetail->name}}</a></li>
                    </ul>
                   </div>
                    <!-- end breadcrumb_item -->
                      <div class="product-heading p-name_heading">
                         <h2>{{$productDetail->name}}</h2>
                      </div>
                      <div class="product-detail-side">
                         @if($productDetail->sale >0)
                              <span class="old_price o-price">{{ number_format($productDetail->price)}} vnđ</span> 
                              <span class="new_price n-price">{{ number_format($productDetail->sale)}} vnđ</span>
                              @else
                               <span class="old_price o-price" style="text-decoration:none; font-weight: 600;">{{ number_format($productDetail->price)}} vnđ</span>
                          @endif 

                       <!-- add rating -->
                        @if(auth()->guard('cusFrontend')->check() && ($cusOders->checkU($productDetail->name) === true))
                         <span class="rating" id="rateYo" style="display: inline-block; "></span>
                         <span>review:{{$ratingSP}}</span>
                        <!--form ADD rating -->
                          <form action="{{route('home.rating')}}" method="post" class="form-inline" id="form_rating" >
                             <div class="form-group">
                             @csrf
                             <input type="hidden"  name="rating_star" id="rating_star" value="{{ $ratingSP}}"/ >
                             <input type="hidden" class="productId" name="product_id" id="san_pham_id"  value="{{ $productDetail->id }}" />
                            
                             <input type="hidden" class="customesId" name="customes_id" id="khach_hang_id" value ="{{auth()->guard('cusFrontend')->user()->id}}" />
                             <input type="hidden"  name="url" value ="{{route('home.rating')}}" class="r-input"/>
                             </div>
                         </form>
                       <!--endform ADD rating -->
                       @else
                        <span class="rating" id="rateYo1" style="display: inline-block; "></span>
                       <span>review:{{$ratingSP}}<p class="fs-1">(Bạn cần đăng nhập và mua sản phẩm để đánh giá)</p></span>
                       @endif
                       <!-- end add rating -->
                       </div>
                      <!-- ADD CART -->
                      <div class="detail-contant">
                         <p>{{$productDetail->description}}<br>
                            <span class="stock">Số lượng: {{$productDetail->quantity}}</span> 
                         </p>
                          
                         <form class="cart" method="post" action="" >
                            @csrf
                            <div class="quantity product" >
                               <input step="1" min="1" max="5" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" type="number">
                               <input type="hidden" value="{{route('cart.add')}}" name="url" class="input_route"/>
                            </div>
                            <button type="button" class="btn sqaure_bt bt_addCart" data-product-id ="{{$productDetail->id }}">Add to cart</button>
                         </form>
                        
                      </div>
                       <!--end ADD CART -->
                      <div class="share-post">
                         <a href="#" class="share-text">Share</a>
                         <ul class="social_icons">
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                         </ul>
                      </div>
                   </div>
                </div>
                <div class="row">
                   <div class="col-md-12">
                      <div class="full">
                         <div class="tab_bar_section">
                            <ul class="nav nav-tabs" role="tablist">
                               <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#description">Chi tiết sản phẩm</a> </li>
                               <li class="nav-item">
                                @if(isset($commProductCount))
                                <a class="btn-btn_nav nav-link" data-toggle="tab"  data-id="{{$productDetail->id}}" href="#reviews" data-url="{{route('loadComm')}}">Nhận xét ({{$commProductCount->count()}})</a>
                                @else
                                <!-- button Tab panes -->
                                <a class="btn-btn_nav nav-link" data-toggle="tab" href="#reviews" data-url="{{route('loadComm')}}" >Nhận xét (0)</a>
                                <!-- button Tab panes -->
                                @endif
                               </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                               <div id="description" class="tab-pane active">
                                  <div class="product_desc">
                                     <p>{!! $productDetail->product_details !!}</p>
                                  </div>
                               </div>
                               <!-- Tab reviews -->
                               <div id="reviews" class="tab-pane fade">
                                  <div class="product_review">
                                  @if(isset($commProductCount))
                                   <h3>{{$commProductCount->count()}} Comment</h3>
                                  @else
                                  <h3>Comment (0)</h3>
                                  @endif
                                     <!--reviews user-->
                                     <div class="commant-text row" id="comm_text" style=" border-bottom:none;">
                                      <!--reviews user-->
                                     @include('frontend.pages.comment',['commProduct'=>$commProduct]);
                                      <!--end reviews comm -->
                                    </div>
                                     <!--commment -->
                                     <div class="row">
                                        <div class="col-sm-12">
                                           <div class="full review_bt_section">
                                              <div class="float-right"> <a class="btn sqaure_bt" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Viết Nhận xét</a> </div>
                                           </div>
                                            <!--commment -->

                                           @if(auth()->guard('cusFrontend')->check() && ($cusOders->checkU($productDetail->name) === true))
                                           <div class="full">
                                              <div id="collapseExample" class="full collapse commant_box">
                                                 <form accept-charset="UTF-8" action="{{route('home.comment')}}" method=" POST">
                                                    @csrf @method('PUT')
                                                    <input id="ratings-hidden" name="rating" type="hidden" >
                                                    <textarea class="form-control animated " cols="50" id="new-comment" name="comment" placeholder="Enter your review here..." required=""></textarea>
                                                    <p class="loi_ text_err"></p>
                                                    <div class="full_bt center">
                                                       <button class="btn sqaure_bt btn-comment" type="submit" data-url-comment="{{route('home.comment')}}" data-id-product="{{$productDetail->id}}" data-id-user="{{auth()->guard('cusFrontend')->user()->id}}">Đăng</button>
                                                    </div>
                                                 </form>
                                              </div>
                                           </div>
                                          @else
                                          <span>Bạn cần đăng nhập và mua sản phẩm trước khi đánh giá sản phẩm.</span>
                                          @endif
                                        </div>
                                     </div>
                                  </div>
                               </div>
                                <!-- end Tab reviews -->
                            </div>
                         </div>
                      </div>
                   </div>
                </div>

                 <!-- SẢN PHẨM CÙNG LOẠI -->
                <div class="row">
                   <div class="col-md-12">
                      <div class="full">
                         <div class="main_heading text_align_left" style="margin-bottom: 25px;">
                            <h3>Bạn cũng có thể thích</h3>
                         </div>
                      </div>
                   </div>
                </div>
                <div class="row">
              @if($t_pro)
               @foreach($t_pro as $key=>$item)
                   @foreach($item->pro as $key=>$value)
                   <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 margin_bottom_30_all">
                      <div class="product_list">
                         <div class="product_img p-img"> <img class="img-responsive" src="{{url('public')}}/uploads/Products/{{$value->avatar}}" alt=""> </div>
                         <div class="product_detail_btm p-productDetail" style="background: #f8f9fa;">
                            <div class="center">
                               <h4><a href="{{route('product_Details',['page'=>$item->code,'slug'=>$value->code])}}">{{$value->name}}</a></h4>
                            </div>
                            <div class="starratin">
                               <div class="center"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </div>
                            </div>
                            <div class="product_price">
                               <p>
                               @if($value->sale>0)
                               <span class="old_price o-price">{{number_format($value->price)}}vnđ</span>
                               <span class="new_price n-price">{{number_format($value->sale)}}vnd</span></p>
                               @else
                               <span class="old_price o-price" style="text-decoration:none; font-weight: 600;">{{number_format($value->price)}}vnđ</span>
                               @endif
                            </div>
                            <!--add mua ngay -->
                            <div class="d-flex justify-content-around" style="margin-top: 15px;">
                               <p class="fs-4">status</p>
                               <form action="" method="post">
                               @csrf
                               <input type="hidden" value="{{route('cart.add')}}" name="url" class="input_route"/>
                               <p><button type="" class="btn-link bt_addCart" data-product-id="{{$value->id}}" style="border: none;">Mua ngay</button></p>
                               <form>
                            </div>
                            <!-- end add mua ngay -->
                         </div>
                      </div>
                  
                   </div>
                   @endforeach
                @endforeach 
                @endif 
                </div>
             </div>
          </div>
       </div>
    </div>
    <!-- end section -->
     <!-- Modal search bar-->
   @include('frontend.pages.block.seach')
    <!-- End Model search bar -->
@endsection
@section('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
<script src="{{url('public/frontend')}}/style/js/comment.js" type="text/javascript" charset="utf-8" async defer></script>
<script type="text/javascript" charset="utf-8" async defer>
 $(document).ready(function(){
  
  $(function () {
    var rating_sp = '{{$ratingSP}}';
    var url = $('.r-input').val();
    var token = $('input[name ="_token"]').val();

    $("#rateYo").rateYo({

      starWidth: "20px",

      rating: rating_sp

    }).on("rateyo.set", function (e, data) {

      var rating = data.rating;

      $.ajax({
        url: url,
        type: 'POST',

        data: { 
          rating_star: rating,
          product_id:$('.productId').val() ,
          customes_id:$('.customesId').val(),
          _token:token
        },
        success: function(res) {
            // Xử lý phản hồi từ server nếu cần
            if(res.data == true){
              location.reload();
            }

          },
          error: function(xhr, status, error) {
            console.log(data.error)// Xử lý lỗi nếu có
          }

        });//end ajax
      
    });
      
    $("#rateYo1").rateYo({
      starWidth: "20px",
      rating: 0
    }).on("rateyo.set", function (e, data) {
     
      Swal.fire({
                  title: "Cảnh báo",
                  text: "Bạn cần đăng nhập và mua sản phẩm này trước khi đánh giá",
                  icon: "error"
                 }).then((result) => {
                        // Nếu người dùng nhấn vào nút xác nhận, thực hiện tải lại trang
                        if (result.isConfirmed) {
                          location.reload();
                        }
                        
                });


    });

    });//end function

 //show chi tiết sản phẩm
 $('.show_imge').on('click',function(){
      
      let _img = $(this).attr('src');
      $('.main_img').attr('src',_img);
     // alert(_img);
 });






 });
</script>

@endsection