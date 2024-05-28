@extends('Admin.masterLayout')
@section('css')
  <style>

  </style>
@endsection

@section('content')
<main id="main" class="main">
	
	<div class="pagetitle p-2">
		<h2 class="pt-3">{{-- $title --}}</h2>
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
			<div class="col-12">

				<div class="card">
					<div class="card-body">
						<h5 class="card-title"></h5>
						<div class="d-flex flex-column">
						<!-- thongbao-->
						  <div class="p-2">
						  	@if(session('success'))
							<div class="alert alert-success text-center delete">
								<strong >{{session('success')}}</strong> 
							</div>
							@endif
						  </div>
						  <!-- seach-->
						  <div class="p-2 ">
						 	<div class="d-flex justify-content-between ">
							  <div class="p-2 ">
							  	<a href="{{-- route('admin.tabsAdd') --}}"  class="btn btn-success">Thêm mới</a>
							  	<a href="{{-- route('admin.tabsDestroy') --}}"  class="btn btn-danger btn_tabs"> Delete-All</a>
							  	
							  </div>
							  <div class=" p-2">
							  	<form class="d-flex mb-3 ">
								@csrf
								<input class="form-control me-2" type="text" placeholder="Search">
								<button class="btn btn-primary" type="button">Search</button>
							</form>
							  </div>
							</div>
						  </div>

						</div>
						
						<div class="col-12">
						@php @endphp
							
							<!-- Table with stripped rows -->
							<form action="" method="POST" id="form_tabs_deleteAll">
								@csrf @method('delete')
								<table class="table">
									<thead>
										<tr>
											<th style="width:2px;height:auto;">#</th>
											<th><input class="form-check-input" type="checkbox" id="checkbox1" name="check-all" value="something" ></th>
											<th scope="col">Thông tin cus</th>
											<th scope="col">Sản phẩm</th>
											<th scope="col">Tổng Sản phẩm</th>
											<th scope="col">Tổng tiền</th>
											<th scope="col">status</th>
											<th scope="col">action</th>
										</tr>
									</thead>
									<tbody>
									
									@foreach($orderList as $key=>$item)	
										<tr>
											<td>{{ $key+1}}</td>
											<td ><input class="form-check-input inputCheck" type="checkbox"  name="check[]" value="{{ $item->id }}" ></td>
											<td>
												<div>
													<p><strong>Khách hàng:</strong> {{$item->name_user}}</p>
													<p><strong>Email:</strong>{{$item->email}}</p>
													<p><strong>Mobile:</strong> {{$item->mobile}}</p>
													<p><strong>Địa chỉ:</strong> {{$item->address}}</p>
													<p><strong>Ngày đặt hàng: </strong>{{ $item->created_at == null ? '' : $item->created_at->format('m-d-Y') }}</p>
												</div>
											</td>
											<td>
												<div>
												@foreach($item->orderDetail as $key=>$order)
												<p>Tên:<strong> {{$order->name}}</strong></p>
												<p>Price:<strong> {{number_format($order->price)}}</strong> vnđ</p>
												<p style="border-bottom: 1px solid #f4f4f4; padding-bottom: 10px;">Số lượng:<strong>{{$order->quantity}}</strong></p>

												@endforeach
												</div>
											</td>
											<td>
												{{$item->total_product}}</li>
											</td>
											<td>
												{{number_format($item->thanh_tien)}} vnđ</li>
											</td>
											<td>
											<form action="" method="POST" id="formTabs_active">
												@csrf @method('PUT')
												@if( $item->status == 0)
												<a href="{{-- route('admin.activeTabs',['id'=>$item->id]) --}}" class="badge bg-danger btn_tabsNotActive">Ẩn</a>
												@else
												<a href="{{-- route('admin.notActiveTabs',['id'=>$item->id]) --}}" class="badge bg-success btn_tabsActive">Hiện</a>
												@endif
											</form>
											</td>
											
											<td>
												<div class="d-flex">
													<a href="{{ route('admin.order_detailView',['id'=>$item->id]) }}" class="btn btn-info btn-sm ms-1">View</a>
													<form method="post" action="" id="form_order_Delete">
													 @csrf @method('delete')
														<a href="{{route('admin.orderDelete',['id'=>$item->id])}}" class="btn btn-secondary btn-sm ms-1 order_Delete">delete
														</a>
													</form>

												</div>
											</td>
											
										</tr>
										
									@endforeach	
									</tbody>
								</table>
							</form>
							<!-- End Table with stripped rows -->
						</div>
						<div class="row">
							<div class="col-lg-12 mt-3">
								<ul class="pagination">
									<li class="page-item"><a class="page-link" href="#">Previous</a></li>
									<li class="page-item"><a class="page-link" href="#">1</a></li>
									<li class="page-item active"><a class="page-link" href="#">2</a></li>
									<li class="page-item"><a class="page-link" href="#">3</a></li>
									<li class="page-item"><a class="page-link" href="#">Next</a></li>
								</ul>
							</div>
						</div>

					</div>
				</div>

			</div>
		</div>
	</section>

</main><!-- End #main -->
@endsection
@section('js')
	<script type="text/javascript" charset="utf-8" async defer>
		$(document).ready(function(){
			$('.order_Delete').on('click',function(e){
				e.preventDefault();
				var _href = $(this).attr('href');
				var submit = $('#form_order_Delete').attr('action',_href);
				if(confirm('bạn có muốn xóa không')==false){
					window.location = "{{route('admin.orderList')}}";
					alert('Chưa có dữ liệu nào được xóa');
				}else{
					$('#form_order_Delete').submit();
				}

		 	 });//btn
		

		});
	</script>
@endsection