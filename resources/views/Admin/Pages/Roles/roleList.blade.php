@extends('Admin.masterLayout')
@section('css')
  <style>

  </style>
@endsection
@section('content')
<main id="main" class="main">
	
	<div class="pagetitle p-2">
		<h2 class="pt-3">{{$title}}</h2>
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
							  	<a href="{{route('admin.roleAdd')}}"  class="btn btn-success">Thêm mới</a>
							  	<a href="{{route('admin.roleDestroy')}}"  class="btn btn-danger allDelete">Delete-All</a>

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
							
							<!-- Table with stripped rows -->
							<form action="" method="POST" id="deleteAllRole">
								@csrf @method('delete')
								<table class="table">
									<thead>
										<tr>
											<th style="width:2px;height:auto;">#</th>
											<th><input class="form-check-input" type="checkbox" id="inputChecked" name="check-all" value="something"></th>
											<th scope="col">Name</th>
											<th scope="col">Status</th>
											<th scope="col">created_at</th>
											<th scope="col">Action</th>
										</tr>
									</thead>
									<tbody>
									@foreach($dataRole as $key=>$listRole)
										<tr>
											<td>{{$key+1}}</td>
											<td ><input class="form-check-input selectAll" type="checkbox" name="option[]" value="{{$listRole->id}}" ></td>
											<td>{{$listRole->name}}</td>
											<td>
											<form action="" method="POST" id="activeRole">
												@csrf @method("PUT")
												@if($listRole->status==0)
												<a href="{{route('admin.activeRole',['id'=>$listRole->id])}}"
												 class="badge bg-danger actiRole" >Ẩn</a>
												@else
												<a href="{{route('admin.notActiveRole',['id'=>$listRole->id])}}" class="badge bg-success not_actiRole" >hiện</span>
												@endif
											</form>
											</td>
											<td>{{$listRole->created_at == null ? '' : $listRole->created_at->format('m-d-Y')}}</td>
											
											<td>
												<div class="d-flex">
													<a href="{{route('admin.roleEdit',['id'=>$listRole->id])}}" class="btn btn-info btn-sm">Edit</a>
													<form method="post" action="" id="form-roleDelete">
													 @csrf @method('delete')
														<a href="{{route('admin.roleDelete',['id'=>$listRole->id])}}" class="btn btn-secondary btn-sm ms-1 roleDelete"><i class="fa fa-trash-o"></i>
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

<script type="text/javascript">
	$(document).ready(function(){
		$('.roleDelete').on('click',function(ev){
			ev.preventDefault();
			
			var _btn = $(this).attr('href');
			
			$('form#form-roleDelete').attr('action',_btn);

			if(confirm('bạn có muốn xóa không')==false){
              
               window.location = "{{route('admin.roleList')}}";
               
             		 alert('chưa có dữ liệu được xóa');
          
		         }else{
		               
		            $('form#form-roleDelete').submit();
		         
		         }
		
		})//button
		
		//xóa nhiều
		$('.allDelete').on('click',function(ev){
			ev.preventDefault();
			var _a = $(this).attr('href');
			
			$('form#deleteAllRole').attr('action',_a);

			if(confirm('bạn có muốn xóa không')==false){
	              
	               window.location = "{{route('admin.roleList')}}";
	               
	             		 alert('chưa có dữ liệu được xóa');
	          
			         }else{
			               
			            $('form#deleteAllRole').submit();
			         
			         }


		});
		
		/*select all đối tượng input*/
			$('#inputChecked').on('click',function(){

				var checkName =  $(this).is(':checked');
 			
	 			if(checkName==true){
	 				
	 				$('.selectAll').prop('checked',true);
	 				
	 			}else{
	 				$('.selectAll').prop('checked',false);
	 			}

			});
		/*-----------------------------
			Active
		--------------------------------*/
		$('.actiRole').on('click',function(ev){
			ev.preventDefault();
			var _button = $(this).attr('href');
			$('form#activeRole').attr('action',_button);
			$('form#activeRole').submit();

		});

		$('.not_actiRole').on('click',function(ev){
			ev.preventDefault();
			var _btn = $(this).attr('href');
			$('form#activeRole').attr('action',_btn);
			$('form#activeRole').submit();

		});



	});//document

</script>
 

@endsection