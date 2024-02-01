@extends('admin.masterLayout')
@section('css')
  <style>

  </style>
@endsection
@section('content')
<main id="main" class="main">

  <div class="pagetitle">
    <h2>{{$title}}</h2>

    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Home</a></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active">Data</li>
      </ol>
    </nav>
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
            <form class="row g-4 mt-3" action="{{route('admin.categoryEdit_post',['id'=>$dataCategoryEdit->id])}}" method="post" name="addCategory">
              @csrf
              <div class="col-12 mt-3">
                <label for="inputNanme4" class="form-label fw-bold">Name</label>
                <input type="hidden" value="{{$dataCategoryEdit->id}}" name="nameId" />
                <input type="text" class="form-control" id="inputNanme4" name="name" value="{{ old('name') ?? $dataCategoryEdit->name }}" placeholder="Nhập tên">
                @error('name')
                  <p>{{ $message }}</p>
                @enderror
              </div>
              <div class="col-12">
                <label for="inputCode" class="form-label fw-bold">Code</label>
                <input type="text" class="form-control" id="inputEmail4" name="code" value="{{ old('code') ?? $dataCategoryEdit->code }}" placeholder="Nhập code">
                @error('code')
                  <p>{{ $message }}</p>
                @enderror
              </div>
              <div class="col-12">
                <label for="inputAddress" class="form-label fw-bold">Status</label>
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="status">
                  <option value="0" {{ old('status')== 0 || $dataCategoryEdit->status==0 ? 'selected' : false }} >Chưa khích hoặt</option>
                  <option value="1" {{ old('status')== 1 || $dataCategoryEdit->status==1? 'selected' : false }}>Kích hoặt</option>
                </select>
              </div>
              <div class="col-12">
                <label for="inputAddress" class="form-label fw-bold">Thư mục cha</label>
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="id_cha">
                  <option value="0">Chọn thư mục cha</option>
                 
                  @php $data = getTheloai_id_cha($listCategory,$id_cha=0,$level=0); @endphp
                  
                  @if($data)
                 
                  @foreach($data as $key=>$item)
                 
                  <option value="{{$item->id}}" {{ old('id_cha')== $item->id ||$dataCategoryEdit->id_cha == $item->id   ? 'selected' : false }}>{{str_repeat(' --- ',$item->level).$item->name}}</option>
                 
                  @endforeach

                  @endif

                </select>
                @error('id_cha')
                  <p>{{ $message }}</p>
                @enderror
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
              </div>

            </form><!-- Vertical Form -->

          </div>
        </div>

      </div>
    </div>
  </section>
</main>

@endsection