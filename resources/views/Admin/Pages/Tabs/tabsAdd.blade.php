@extends('admin.masterLayout')
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
            <h5 class="card-title text-uppercase text-center fs-6 mt-3" >{{$title}}</h5>

            @if($errors->any())
              <div class="alert alert-danger text-center">
                  <p style="color:red;">Vui lòng nhập dữ liệu</p>
              </div>
            @endif
             <!-- Vertical Form -->
            <form class="row g-4 mt-3" action="{{ route('admin.tabsAdd_post')}}" method="post"  />
              @csrf
            <div class="col-12">
                <label for="inputName" class="form-label fw-bold">Name</label>
                <input type="text" class="form-control"  name="tabs_name" value="{{ old('tabs_name')}}" placeholder="Nhập name" />
                @error('tabs_name')
                  <p>{{ $message }}</p>
                @enderror
              </div>
              <div class="col-12">
                <label for="inputCode" class="form-label fw-bold">Code</label>
                <input type="text" class="form-control"  name="code" value="" placeholder="Nhập code" />
                @error('code')
                  <p>{{ $message }}</p> 
                @enderror
              </div>
              <div class="col-12">
                <label for="inputAddress" class="form-label fw-bold">Status</label>
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="status">
                  <option value="0" {{old('status')== 0 ? 'selected' : false}} >Chưa khích hoặt</option>
                  <option value="1" {{old('status')== 1 ? 'selected' : false}}>Kích hoặt</option>
                </select>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary">Thêm mới</button>
                <button type="reset" class="btn btn-secondary t-cancel" data-t-url="{{route('admin.tabsList')}}">Cancel</button>
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
    $('.t-cancel').on('click',function(ev){
      ev.preventDefault();
      var _url=$(this).data('t-url');
      if(confirm('Bạn có chắc sẽ rời trang không?')==false){
             alert('Mời Bạn tiếp tục!');
          }else{
            window.location.href = _url;
          }
      
    });
 

  });
</script>
@endsection