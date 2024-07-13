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
        <div class="card-body w-50 mx-auto">
            <h5 class="card-title text-uppercase text-center fs-4" >{{$title}}</h5>
               @if($errors->any())
                  <div class="alert alert-danger text-center">
                      <p style="color:red;">Vui lòng nhập dữ liệu</p>
                  </div>
                @endif
            <!-- Vertical Form -->
            <form class="row g-4" action="{{route('admin.customeAdd_Post')}}" method="POST" >
              @csrf
              <div class="col-12">
                <label for="inputNanme4" class="form-label fw-bold">Name</label>
                <input type="text" class="form-control" value="{{old('name')}}" name="name" placeholder="Nhập name" >
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
              </div>
              <div class="col-12">
                <label for="inputEmail4" class="form-label fw-bold">Email</label>
                <input type="email" class="form-control" value="{{old('email')}}" name="email" placeholder="Nhập email">
                @error('email')
                    <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
              <div class="col-12">
                <label for="inputPassword4" class="form-label fw-bold">Password</label>
                <input type="password" class="form-control"  value="{{old('password')}}" name="password" placeholder="Nhập password">
              @error('password')
                    <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
              <div class="col-12">
              
                <label for="inputAddress" class="form-label fw-bold">Status</label>
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="status">
                  <option value="0"{{ old('status')== 0 ? 'selected' : false }}>Ẩn</option>
                  <option value="1"{{ old('status')== 1 ? 'selected' : false }}>Hiện</option>
                </select>
              </div>
              
              <div class="text-center">
                <button type="submit" class="btn btn-primary">Thêm Mới</button>
                <button type="reset" class="btn btn-secondary cus-cancel" data-url-cus="{{route('admin.customeList')}}">Cancel</button>
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
  <script type="text/javascript" charset="utf-8" async defer>
  $(document).ready(function(){
    //cancel
    $('.cus-cancel').on('click',function(ev){
      ev.preventDefault();
      var _url = $(this).data('url-cus');

      if(confirm('Bạn có chắc không rời trang này không ?')==false){
             alert('Mời bạn lại tiếp tục.');
          }else{
            window.location.href = _url;
          }
      
    });
 

  });
</script>

@endsection