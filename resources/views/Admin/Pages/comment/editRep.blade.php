@extends('Admin.masterLayout')
@section('css')
  <style>

  </style>
@endsection
@section('content')
<main id="main" class="main">

  <div class="pagetitle">
    <h2>{{ $title}}</h2>

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
        <div class="card-body w-20 mx-auto">
            <h5 class="card-title text-uppercase text-center fs-4" >{{ $title }}</h5>
               @if($errors->any())
                  <div class="alert alert-danger text-center">
                      <p style="color:red;">Vui lòng nhập dữ liệu</p>
                  </div>
                @endif
            <!-- Vertical Form -->
          
            <form class="row g-4" action="" method="POST" >
              @csrf @method('PUT')
              <div class="col-12">
                <label class="form-label fw-bold">Comment</label>
                <input type="text" class="form-control input-commRep" value="{{$edit_repComm->comment}}" name="comment" >
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                 @enderror
              </div>
             <div class="text-center">
                <button class="btn btn-primary editRep"
                 data-url="{{route('admin.putRep',['id'=>$edit_repComm->id])}}"
                  data-id="{{$edit_repComm->id}}" data-reply-id="{{$edit_repComm->reply_id}}" 
                  data-url-rep = {{session('previous_comRep')}}>Save</button>
                <button type="reset" class="btn btn-secondary repBtn-cancel" data-url-rep="{{route('admin.commentList')}}">Cancel</button>
              </div>

            </form><!-- Vertical Form -->

          </div>

        </div>
        
      </div>
    </div>

  </section>
</main>
@endsection
@section('js')
  <script src="{{url('public/Admin')}}/jquery/adminComment.js" type="text/javascript" charset="utf-8" async defer></script>
  <script type="text/javascript" charset="utf-8" async defer>
  $(document).ready(function(){
    //cancel
    $('.repBtn-cancel').on('click',function(ev){
      ev.preventDefault();
      var _url=$(this).data('url-rep');
      if(confirm('Bạn có chắc sẽ rời trang không?')==false){
             alert('Mời Bạn tiếp tục!');
          }else{
            window.location.href = _url;
          }
      
    });
 

  });
</script>
@endsection