@extends('Admin.masterLayout')
@section('css')
  <style>

  </style>
@endsection

@section('content')
	<main id="main" class="main">

	    <div class="pagetitle">
	      <h1>Quản trị  hệ thống</h1>
	      <nav>
	        <ol class="breadcrumb">
	          <li class="breadcrumb-item"><a href="">Home</a></li>
	          <li class="breadcrumb-item active">Dashboard</li>
	        </ol>
	      </nav>
	    </div><!-- End Page Title -->

	    <section class="section dashboard">
	      <div class="row">
	      <div class="col-12">
              <div class="card top-selling overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body pb-0">
                  <h5 class="card-title">{{$title}}<span>| Today</span></h5>
                   
                   <!--button thêm mới -->
                  <div class="d-flex justify-content-between mb-3">
                      <div class="p-2 bd-highlight">
                         <input class="form-control" type="text" placeholder="seach" name="seach">
                       </div> 
                        <div class="p-2 bd-highlight">
                       
                          <span><a href="{{route('admin.bannerAdd')}}" class="btn btn-primary">Thêm mới</a></span>
                         
                          <span><a href="{{route('admin.banner_DeleteAll')}}" class="btn btn-danger deleteAllBanner">Delete-All</a></span>
                          
                      </div>
                  </div>
                   <!--\button thêm mới -->  
                   @if(session('success'))
                    <div class="alert alert-success text-center delete">
                        <strong >{{session('success')}}</strong> 
                      </div>
                  @endif
                  <form action="" method="POST" id="formDeleteBanner">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }} 
                      <table class="table ">
                        <thead>
                          <tr style="border-bottom: 1px solid #ccc;">
                            <th><input class="form-check-input" type="checkbox" value="" name="checkName[]" /></th>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">description</th>
                            <th scope="col">Link</th>
                            <th scope="col">status</th>
                            <th scope="col">created_at</th>
                             <th scope="col">Action</th>
                          </tr>
                        </thead>
                          <tbody>
                          @foreach($bannerList as $key=>$banner)
                            <tr>
                              <td><input type="checkbox" name=checkName[] value="{{$banner->id}}" /></td>
                              <td>{{$key+1}}</td>
                              <td><a href="#"><img src="{{url('public')}}/uploads/slides/{{$banner->image}}"></a></td>
                              <td><a href="#" class="text-primary fw-bold">{{$banner->name}}</a></td>
                              <td>{{$banner->description}}</td>
                              <td>{{$banner->link}}</td>
                              <td class="fw-bold">
                              
                              <form action="" method="POST" id="actionBanner" >
                                @csrf @method('put')
                                
                                @if($banner->status == 0)
                                  
                                  <a href="{{route('admin.activeBanner',['id'=>$banner->id])}}" class="badge bg-danger notActiveBanner">Ẩn</a>
                                 
                                @else
                                  <a href="{{route('admin.not_activeBanner',['id'=>$banner->id])}}" class="badge bg-success activeBanner">Hiện</a>
                                @endif
                              </form>
                              
                              </td>
                              <td>{{$banner->created_at == null ? '' : $banner->created_at->format('m-d-Y')}}</td>
                              <td>
                                <a href="{{route('admin.bannerEdit',['id'=>$banner->id])}}" class="btn btn-info btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <form action="" method="POST" id="bannerIdForm">
                                  @csrf @method("DELETE")
                                <a href="{{route('admin.bannerDelete',['id'=>$banner->id])}}" class="btn btn-warning btn-sm btnDeleteBanner"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </form>
                              </td>
                            </tr>
                            @endforeach   
                          </tbody>
                      </table>
                  </form>
                </div>

              </div>
            </div>

	      	
	      </div>
	    </section>
    </main>

@endsection
@section('js')
  <script type="text/javascript" charset="utf-8" async defer>
    $(document).ready(function(){
      $('.btnDeleteBanner').on('click',function(e){
        e.preventDefault();
        var _href = $(this).attr('href');

        $('#bannerIdForm').attr('action',_href);
      
          if(confirm('bạn có muốn xóa không')==false){
             alert('Chưa có dữ liệu nào được xóa');
          }else{
            $('#bannerIdForm').submit();
          }
       
      });//button
          
      //deleteAll
      $('.deleteAllBanner').on('click',function(ev){
          ev.preventDefault();

          var _button = $(this).attr('href');
        
          var sub = $('form#formDeleteBanner').attr('action',_button);
          

          if(confirm('bạn có muốn xóa không')==false){
            window.location = '{{route('admin.bannerList')}}';
            
             alert('Chưa có dữ liệu nào được xóa');
          
          }else{
            
            $('form#formDeleteBanner').submit();
          
          }
             
      })

      //action
      $('.notActiveBanner').on('click',function(ev){
         ev.preventDefault();
        
         var _href= $(this).attr('href');
         
         $('form#actionBanner').attr('action',_href);

         $('form#actionBanner').submit();
          
        
      });

      $('.activeBanner').on('click',function(ev){
         ev.preventDefault();

         var _button = $(this).attr('href');
         
         $('form#actionBanner').attr('action',_button);

         $('form#actionBanner').submit();
          
        
      });


   




    });//document ready
  
  </script>

@endsection