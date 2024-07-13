@extends('Admin.masterLayout')
@section('css')
  <style>

  </style>
@endsection

@section('content')
	<main id="main" class="main">

	    <div class="pagetitle">
	      <h1>{{$title}}</h1>
	      <!--nav -->
        @include('Admin.Pages.Block.nav')
        <!--end nav -->
	    
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
                  <h5 class="card-title">{{ $title }}<span>| Today</span></h5>
                   
                   <!--button thêm mới -->
                  <div class="d-flex justify-content-between mb-3">
                      <div class="p-2 bd-highlight">
                         <input class="form-control" type="text" placeholder="seach" name="seach">
                       </div> 
                        <div class="p-2 bd-highlight">
                       
                          <span><a href="{{ route('admin.aboutAdd') }}" class="btn btn-primary">Thêm mới</a></span>
                         
                          <span><a href="{{-- route('admin.banner_DeleteAll') --}}" class="btn btn-danger deleteAllBanner">Delete-All</a></span>
                          
                      </div>
                  </div>
                   <!--\button thêm mới -->  
                   @if(session('success'))
                    <div class="alert alert-success text-center delete">
                        <strong >{{session('success') }}</strong> 
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
                            <th scope="col">Avatar</th>
                            <th scope="col">Tiêu đề</th>
                            <th scope="col">Content</th>
                            <th scope="col">status</th>
                            <th scope="col">created_at</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                          <tbody>
                         @foreach($about as $key=>$item)
                            <tr>
                              <td><input type="checkbox" name=checkName[] value="{{$item->id}}" /></td>
                              <td>{{$key+1}}</td>
                              <td><a href="#"><img src="{{url('public')}}/uploads/avatar/{{ $item->avatar}}"></a></td>
                              <td><a href="#" class="text-primary fw-bold">{{ $item->title }}</a></td>
                              <td>{{$item->content }}</td>
                              <td class="fw-bold">
                              <!-- status-->
                              <form action="" method="POST" id="actionAbout" >
                                @csrf @method('put')
                               @if($item->status==0) 
                                  <a href="{{ route('admin.aboutAtive',['id'=>$item->id])}}" class="badge bg-danger notActiveAbout">Ẩn</a>
                               @else
                                  <a href="{{route('admin.aboutNotAtive',['id'=>$item->id])}}" class="badge bg-success activeAbout">Hiện</a>
                               @endif 
                              </form>
                              <!-- end status-->
                              </td>
                             
                              <td>{{$item->created_at == null ? '' : $item->created_at->format('m-d-Y')}}</td>
                             
                              <td>
                                <a href="{{route('admin.aboutEdit',['id'=>$item->id])}}" class="btn btn-info btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <form action="" method="POST" id="aboutFormDelete">
                                  @csrf @method("DELETE")
                                <a href="{{route('admin.aboutDelete',['id'=>$item->id])}}" class="btn btn-warning btn-sm btnDeleteAbout"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
    //delete
    $('.btnDeleteAbout').on('click',function(ev){
      ev.preventDefault();
      var _href = $(this).attr('href');
      $('#aboutFormDelete').attr('action',_href);
          if(confirm('bạn có muốn xóa không')==false){
             alert('Chưa có dữ liệu nào được xóa');
          }else{
            $('#aboutFormDelete').submit();
          }
      /*
      var _url=$(this).data('url-banner');

      if(confirm('Bạn chắc rời trang không ?')==false){
             alert('Mời Bạn hãy tiếp tục');
          }else{
            window.location.href = _url;
          }
      */
    });
 
  //action status
     $('.notActiveAbout').on('click',function(ev){
      ev.preventDefault();

      var _href = $(this).attr('href');
      $('#actionAbout').attr('action',_href);
          if(confirm('Bạn có chắc thay đổi trang thái status')==false){
             alert('Không có dữ liệu nào thay đổi');
          }else{
            $('#actionAbout').submit();
          }
      
     });

     //status
     $('.activeAbout').on('click',function(ev){
      ev.preventDefault();
      var _href = $(this).attr('href');
      $('#actionAbout').attr('action',_href);
          if(confirm('Trạng thái của bạn sẽ bị thay đổi')==false){
             alert('Dữ liệu chưa thay đổi');
          }else{
            $('#actionAbout').submit();
          }
     
     });

  




  });
</script>
@endsection