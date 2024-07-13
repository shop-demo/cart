@extends('admin.masterLayout')
@section('css')
  <style>

  </style>
@endsection
@section('content')
<main id="main" class="main">

  <div class="pagetitle">
    <h2>{{ $title}}</h2>

    @include('Admin.Pages.Block.nav')
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card" >
          <div class="card-body w-50 mx-auto">
            <h5 class="card-title text-uppercase text-center fs-6 mt-3" >{{$title}}</h5>
             <!-- thông báo-->
            @if($errors->any())
              <div class="alert alert-danger text-center">
                  <p style="color:red;">Vui lòng nhập dữ liệu</p>
              </div>
            @endif
             <!-- Vertical Form -->
            <form class="row g-4 mt-3" action="{{ route('admin.tabsEditPut',['id'=>$dataEdit->id])}}" method="post"  />
              @csrf @method('PUT')
              <!-- name danh mục sự kiện -->
              <div class="col-12">
                <label for="inputName" class="form-label fw-bold">Name</label>
                <input type="hidden" name="_nameId" value="{{$dataEdit->id}}" />
                <input type="text" class="form-control"  name="tabs_name" value="{{ old('tabs_name') ?? $dataEdit->tabs_name}}" placeholder="Nhập name" />
                @error('tabs_name')
                  <p>{{ $message }}</p>
                @enderror
              </div>
             <!-- code danh mục sự kiện -->
              <div class="col-12">
                <label for="inputCode" class="form-label fw-bold">Code</label>
                <input type="text" class="form-control"  name="code" value="{{old('code') ?? $dataEdit->code}}" placeholder="Nhập code" />
                @error('code')
                  <p>{{ $message }}</p> 
                @enderror
              </div>
              
              
              <!-- btn form -->
              <div class="col-12">
                <label for="inputAddress" class="form-label fw-bold">Status</label>
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="status">
                  <option value="0" {{old('status')== 0 || $dataEdit->status == 0 ? 'selected' : false}} >Chưa khích hoặt</option>
                  <option value="1" {{old('status')== 1 || $dataEdit->status == 1 ? 'selected' : false}}>Kích hoặt</option>
                </select>
              </div>
            
              <div class="text-center">
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="reset" class="btn btn-secondary t-Ecancel" data-t-url="{{route('admin.tabsList')}}">Cancel</button>
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
    $('.t-Ecancel').on('click',function(ev){
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