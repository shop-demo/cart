@extends('frontend.client')
@section('css')
<style type="text/css" media="screen">
   .active{
    color: #d7bb3e !important;
   }
   
</style>
@endsection
@section('main')
@php @endphp
<!-- inner page banner -->
      <div id="inner_banner" class="section inner_banner_section" style="margin-top:150px;">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <div class="title-holder">
                        <div class="title-holder-cell text-left">
                           <h1 class="page-title">Shop Page</h1>
                           <ol class="breadcrumb">
                              <li><a href="{{route('home.index')}}">Home</a></li>
                            
                              <li ><a href="" class="{{Request::segment(1) == $pageShow->code ? 'active':''}}">{{$pageShow->name}}</a></li>
                             
                           </ol>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end inner page banner -->
    
      <!-- section -->
      <div class="section padding_layout_1 product_list_main">
        
         <div class="container">
           <!-- thong bao -->
           @if(session('message'))
           @include('frontend.pages.block.mgs')
           @endif
           <!-- end thong bao --> 
            <div class="row">
               <div class="col-md-12">
                  <div class="row">
                  @if($pageProduct->count()>0)
                  @foreach($pageProduct as $key=>$item)
                     <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 margin_bottom_30_all">
                        <div class="product_list">
                           <div class="product_img p-img"><img class="img-responsive" src="{{url('public/uploads')}}/Products/{{$item->avatar}}" alt="" ></div>
                           <div class="product_detail_btm p-productDetail" style="background: #f8f9fa;">
                              <div class="center">
                                 <h4 class="p-name text-p"><a href="{{route('product_Details',['page'=>$pageShow->code,'slug'=>$item->code])}}" >{{$item->name}}</a></h4>
                              </div>
                              <div class="starratin s-star">
                                 <div class="center"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </div>
                              </div>
                              <div class="product_price">
                                 <p>
                                 @if($item->sale)
                                 <span class="old_price o-price">{{ number_format($item->price)}} vnđ</span>
                                 <span class="new_price n-price">{{ number_format($item->sale)}} vnđ</span>
                                 @else
                                 <span class="old_price o-price" style="text-decoration:none; font-weight: 600;">{{ number_format($item->price)}} vnđ</span>
                                 @endif
                                 </p>
                              </div>
                              <!--bttom mua ngay -->
                              <div class="d-flex justify-content-around" style="margin-top: 15px;">
                              <p class="fs-4">status</p>
                              <form action="" method="POST">
                              @csrf
                              <input type="hidden" value="{{route('cart.add')}}" name="url" class="input_route"/>
                              <p><button type="button" class="btn-link bt_addCart" data-product-id="{{$item->id}}" style="border: none;" >Mua ngay</button></p>
                              <!--end bttom mua ngay -->
                              </div>
                              </form>
                           </div>
                        </div>
                     </div>
                 	   @endforeach
                 
                     @elseif($products->count()>0)  <!--  page products - danhmuc:id_cha=id -->
                     @foreach($products as $key=>$val)
                     <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 margin_bottom_30_all">
                        <div class="product_list">
                           <div class="product_img p-img"><img class="img-responsive" src="{{url('public/uploads')}}/Products/{{$val->avatar}}" alt="" ></div>
                           <div class="product_detail_btm p-productDetail" style="background: #f8f9fa;">
                              <div class="center">
                                 <h4 class="p-name text-p"><a href="{{route('product_Details',['page'=>$pageShow->code,'slug'=>$val->code])}}" >{{$val->name}}</a></h4>
                              </div>
                              <div class="starratin s-star">
                                 <div class="center"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </div>
                              </div>
                              <div class="product_price">
                                 <p>
                                 @if($val->sale)
                                 <span class="old_price o-price">{{ number_format($val->price)}} vnđ</span>
                                 <span class="new_price n-price">{{ number_format($val->sale)}} vnđ</span>
                                 @else
                                 <span class="old_price o-price" style="text-decoration:none; font-weight: 600;">{{ number_format($val->price)}} vnđ</span>
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

                  @else
                    <span><p>Hiện chưa có sản phẩm nào</p></span>
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