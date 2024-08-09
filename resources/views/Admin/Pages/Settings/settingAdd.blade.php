@extends('admin.masterLayout')
@section('css')
  <style>

  </style>
@endsection
@section('content')
<main id="main" class="main">

  <div class="pagetitle">
    <h2>{{$title}}</h2>
    <!--nav -->
    @include('Admin.Pages.Block.nav')
    <!--end nav -->

  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="dropdown">
          <a class="btn btn-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            Chọn văn bản setting
          </a>

          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item" href="{{route('admin.settingAdd').'?type=text'}}">text</a></li>
            <li><a class="dropdown-item" href="{{route('admin.settingAdd').'?type=textarea'}}">textarea</a></li>
          </ul>
        </div>
        <div class="card" >
          <div class="card-body w-50 mx-auto">
            <h5 class="card-title text-uppercase text-center fs-6 mt-3" >{{ $title}}</h5>

            @if($errors->any())  
              <div class="alert alert-danger text-center">
                  <p style="color:red;">Vui lòng nhập dữ liệu</p>
              </div>
            @endif 

            <!-- Vertical Form -->
            <form class="row g-4 mt-3" action="{{route('admin.settingPut').'?type='.request()->type}}" method="post" name="putSetting">
              @csrf @method('PUT')
              <div class="col-12 mt-3">
                <label for="inputNanme4" class="form-label fw-bold">Name</label>
                <input type="text" class="form-control" id="inputNanme4" name="name_key" value="{{ old('name_key')}}" placeholder="Nhập tên">
                @error('name_key')
                  <p>{{ $message }}</p>
                @enderror
              </div>
              @if(request()->type === 'text')
              <div class="col-12">
                <label for="inputValue" class="form-label fw-bold">Value</label>
                <input type="text" class="form-control" id="inputValue" name="value" value="{{old('value')}}" placeholder="Nhập value">
                @error('value')
                  <p>{{ $message}}</p>
                @enderror
              </div>
              @elseif(request()->type ==='textarea')
              <div class="col-12">
                <label for="inputValue" class="form-label fw-bold">Value</label>
                <textarea  name="value" rows="4" cols="50" class="form-control">
                </textarea>
                @error('value')
                  <p>{{$message }}</p>
                @enderror
              </div>
              @else
              
              @endif
              <div class="col-12">
                <label for="inputAddress" class="form-label fw-bold">Status</label>
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="status">
                  <option value="0" {{ old('status')== 0 ? 'selected' : false }} >Chưa khích hoặt</option>
                  <option value="1" {{ old('status')== 1 ? 'selected' : false }}>Kích hoặt</option>
                </select>
              </div>
              
              <div class="text-center">
                <button type="submit" class="btn btn-primary">Thêm mới</button>
                <button type="reset" class="btn btn-secondary cancel" data-url="{{-- route('admin.categoryList') --}}">Cancel</button>
              </div>

            </form><!-- Vertical Form -->

          </div>
        </div>

      </div>
    </div>
  </section>
</main>

@endsection