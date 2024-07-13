@extends('Admin.masterLayout')
@section('css')
  <style>

  </style>
@endsection
@section('content')
<main id="main" class="main">

  <div class="pagetitle">
    <h2>{{$title}}</h2>
    @include('Admin.Pages.Block.nav')
   
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card" >
        <div class="card-body w-20 mx-auto">
            <h5 class="card-title text-uppercase text-center fs-4" >{{$title}}</h5>
               @if($errors->any())
                  <div class="alert alert-danger text-center">
                      <p style="color:red;">Vui lòng nhập dữ liệu</p>
                  </div>
                @endif
            <!-- Vertical Form -->
            <form class="row g-4" action="{{ route('admin.commentPut',['id'=>$commEdit->id])}}" method="POST" >
              @csrf @method('PUT')

              <div class="col-12">
                <label class="form-label fw-bold">Comment</label>
                <input type="text" class="form-control" value="{{old('comment')?? $commEdit->comment}}" name="comment" >
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
              </div>
              
              <div class="col-12">
                <label  class="form-label fw-bold">User</label>
                <input type="text" class="form-control"  value="{{ $commEdit->use->name}}" name="customes_id" >
                @error('customes_id')
                    <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
              <div class="col-12">
                <label  class="form-label fw-bold">Reply</label>
                <input type="text" class="form-control"  value="{{ $commEdit->reply_id}}" name="reply_id" >
                @error('reply_id')
                    <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
              <div class="col-12">
              
                <label for="inputAddress" class="form-label fw-bold">Status</label>
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="status">
                  <option value="0"{{old('status')== 0 || $commEdit->status == 0 ? 'selected' : false }}>Ẩn</option>
                  <option value="1"{{ old('status')== 1 || $commEdit->status == 1 ? 'selected' : false}}>Hiện</option>
                </select>
              </div>
              
              <div class="text-center">
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="reset" class="btn btn-secondary commE" data-comm-url="{{route('admin.commentList')}}">Cancel</button>
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
@section('js')
<script type="text/javascript" charset="utf-8" async defer>
  $(document).ready(function(){
    //cancel
    $('.commE').on('click',function(ev){
      ev.preventDefault();
      var _url=$(this).data('comm-url');
      if(confirm('Bạn có chắc sẽ rời trang không?')==false){
             alert('Mời Bạn tiếp tục!');
          }else{
            window.location.href = _url;
          }
      
    });
 

  });
</script>
@endsection