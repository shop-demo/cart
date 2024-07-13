@extends('Admin.masterLayout')
@section('css')
  <style>

  </style>
@endsection
@section('content')
<main id="main" class="main">
	
	<div class="pagetitle p-2">
		<h2 class="pt-3">{{$title}}</h2>
		@include('Admin.Pages.Block.nav')
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
							@else
							<div class="alert alert-light text-center">
								<p>Chưa có dữ liệu nào được thêm vào.</p> 
							</div>
							@endif
						  </div>
						  <!-- seach-->
						  <div class="p-2 ">
						 	<div class="d-flex justify-content-between ">
							  <div class="p-2 ">
							  	<a href="{{route('admin.tabsAdd')}}"  class="btn btn-success">Thêm mới</a>
							  	<a href="{{route('admin.tabsDestroy')}}"  class="btn btn-danger btn_tabs"> Delete-All</a>
							  	

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
											<th scope="col">Name</th>
											<th scope="col">code</th>
											<th scope="col">Status</th>
											<th scope="col">created_at</th>
											<th scope="col">Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($data as $key=>$item)
										<tr>
											<td>{{$key+1}}</td>
											<td ><input class="form-check-input inputCheck" type="checkbox"  name="check[]" value="{{$item->id}}" ></td>
											<td>{{$item->tabs_name}}</td>
											<td>{{$item->code}}</td>
											<td>
											<form action="" method="POST" id="formTabs_active">
												@csrf @method('PUT')
												@if($item->status==0)
												<a href="{{route('admin.activeTabs',['id'=>$item->id])}}" class="badge bg-danger btn_tabsNotActive">Ẩn</a>
												@else
												<a href="{{route('admin.notActiveTabs',['id'=>$item->id])}}" class="badge bg-success btn_tabsActive">Hiện</a>
												@endif
											</form>
											</td>
											<td>{{$item->created_at == null ? '' : $item->created_at->format('m-d-Y')}}</td>
											<td>
												<div class="d-flex">
													<a href="{{route('admin.tabsEdit',['id'=>$item->id])}}" class="btn btn-info btn-sm ms-1">Edit</a>
													<form method="post" action="" id="form_tabs_Delete">
													 @csrf @method('delete')
														<a href="{{ route('admin.tabsDelete',['id'=>$item->id]) }}" class="btn btn-secondary btn-sm ms-1 tabs_Delete"><i class="fa fa-trash-o"></i>
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
	<script  type="text/javascript" charset="utf-8" async defer>
		$(document).ready(function(){

			/* xóa 1 đối tượng */
			$('.tabs_Delete').on('click',function(e){
				e.preventDefault();//preventDefault

				var _a = $('.tabs_Delete').attr('href');

				var _sub = $('form#form_tabs_Delete').attr('action',_a);
				if(confirm('bạn có muốn xóa không')==false){
					window.location ="{{route('admin.tabsList')}}";
					alert('Chưa có dữ liệu nào được xóa');
				}else{
					$('form#form_tabs_Delete').submit();
				}
			});  //button

			/*select all đối tượng input*/
			$('#checkbox1').on('click',function(){

				var checkName =  $(this).is(':checked');
 			
	 			if(checkName==true){
	 				
	 				$('.inputCheck').prop('checked',true);
	 				
	 			}else{
	 				$('.inputCheck').prop('checked',false);
	 			}

			}); 


			//xóa nhiều đối tượng
			
			$('.btn_tabs').on('click',function(ev){
				ev.preventDefault();
				
				var _href = $(this).attr('href');

				$('form#form_tabs_deleteAll').attr('action',_href);

				if(confirm('Bạn có chắc xóa không ?')==false){
					
					window.location ="{{route('admin.tabsList')}}";
					
					alert('Chưa có dữ liệu nào được xóa');
				
				}else{
					
					$('form#form_tabs_deleteAll').submit();
				}
			
			});
			//button deleteAll
		
			/*ACTIVE*/
			$('.btn_tabsNotActive').on('click',function(ev){
				ev.preventDefault();
				var _btn = $(this).attr('href');
				 
				 $('form#formTabs_active').attr('action',_btn);
				
				$('form#formTabs_active').submit();
				
			});
		
			
			$('.btn_tabsActive').on('click',function(ev){
				ev.preventDefault();
				var _btn = $(this).attr('href');
				
				var sub = $('form#formTabs_active').attr('action',_btn);
				
				$('form#formTabs_active').submit();
				
			});


		})//document 
	</script>
@endsection