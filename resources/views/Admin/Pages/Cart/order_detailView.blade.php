@extends('admin.masterLayout')
@section('css')
  <style>
      
  </style>
@endsection
@section('content')
<main id="main" class="main">

  <div class="pagetitle">
    <h2>{{ $title }}</h2>

    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active">Data</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card" >
          <div class="card-body w-50 mx-auto cardBody" style="width: 100% !important;">
            <h5 class="card-title text-uppercase text-center fs-6 mt-3" >{{$title}}</h5>
             <!-- thông báo-->
            @if($errors->any())
              <div class="alert alert-danger text-center">
                  <p style="color:red;">Vui lòng nhập dữ liệu</p>
              </div>
            @endif
              <!-- dơn hàng chi tiết -->
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Tên khách hàng</label>
                      <div class="col-md-8 col-lg-9">
                        <p>{{$order_detailView->name_user}}</p>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <p>{{$order_detailView->email}}</p>
                      </div>
                    </div>
                   

                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Mobile</label>
                      <div class="col-md-8 col-lg-9">
                       <p>{{ $order_detailView->mobile}}</p>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Job" class="col-md-4 col-lg-3 col-form-label">Địa chỉ </label>
                      <div class="col-md-8 col-lg-9">
                        <p>{{$order_detailView->address}}"</p>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">Tổng sản phẩm</label>
                      <div class="col-md-8 col-lg-9">
                        <p>{{$order_detailView->total_product}}/chiếc</p>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Address" class="col-md-4 col-lg-3 col-form-label">Thành tiền</label>
                      <div class="col-md-8 col-lg-9">
                       <p>{{number_format($order_detailView->thanh_tien)}}vnđ</p>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Ghi chú</label>
                      <div class="col-md-8 col-lg-9">
                         <p>{{$order_detailView->note}}</p>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Ngày đặt hàng</label>
                      <div class="col-md-8 col-lg-9">
                        <p>{{ $order_detailView->created_at}}</p>
                      </div>
                    </div>

                    <div class="row mb-3">

                          <h5 class="card-title">Sản phẩm order <span>| Today</span></h5>
                          <table class="table ">
                            <thead>
                              <tr style="border-bottom: 1px solid #ccc;">
                                <th scope="col">Preview</th>
                                <th scope="col">Sản phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Thành tiền/VNĐ</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($order_detailView->orderDetail as $key=>$pro_order)
                              <tr style="border-bottom: 1px solid #ccc;">
                                <th scope="row" style="width: 20%;"><a href="#"><img src="{{url('public/uploads')}}/Products/{{$pro_order->avatar}}" style="width: 20%;height:auto;"alt=""></a></th>
                                <td><a href="#" class="text-primary fw-bold">{{$pro_order->name}}</a></td>
                                <td>{{ number_format($pro_order->price) }}</td>
                                <td class="fw-bold">{{$pro_order->quantity}}</td>
                                <td>{{number_format($pro_order->price * $pro_order->quantity)}}</td>
                              </tr>
                            @endforeach  
                            </tbody>
                          </table>
                   </div>
                <!-- End chi tiết đơn hàng sản phẩm -->

          </div>
        </div>

      </div>
    </div>
  </section>
</main>

@endsection