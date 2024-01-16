@extends('Admin.masterLayout')
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
            <h5 class="card-title text-uppercase text-center fs-4" >{{$title}}</h5>
               @if($errors->any())
                  <div class="alert alert-danger text-center">
                      <p style="color:red;">Vui lòng nhập dữ liệu</p>
                  </div>
                @endif
            <!-- Vertical Form -->
            <form class="row g-4" action="{{route('admin.customeUpdate',['id'=>$dataCusEdit])}}" method="POST" >
              @csrf @method('PUT')

              <div class="col-12">
                <label class="form-label fw-bold">Name</label>
                <input type="text" class="form-control" value="{{old('name')?? $dataCusEdit->name}}" name="name" placeholder="Nhập name" >
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
              </div>
              <div class="col-12">
                <label class="form-label fw-bold">Email</label>
                 <input type="hidden" name="_nameId" value="{{$dataCusEdit->id}}" />
                <input type="email" class="form-control" value="{{old('email') ?? $dataCusEdit->email}}" name="email" placeholder="Nhập email">
                @error('email')
                    <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
              <div class="col-12">
                <label  class="form-label fw-bold">Password</label>
                <input type="password" class="form-control"  value="{{old('password') ?? $dataCusEdit->password}}" name="password" placeholder="Nhập password">
                @error('password')
                    <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
              <div class="col-12">
              
                <label for="inputAddress" class="form-label fw-bold">Status</label>
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="status">
                  <option value="0"{{ old('status')== 0 || $dataCusEdit->status == 0 ? 'selected' : false }}>Ẩn</option>
                  <option value="1"{{ old('status')== 1 || $dataCusEdit->status == 1 ? 'selected' : false }}>Hiện</option>
                </select>
              </div>
              
              <div class="text-center">
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="reset" class="btn btn-secondary">Cancel</button>
              </div>

            </form><!-- Vertical Form -->

          </div>
        </div>

      </div>
    </div>
  </section>
</main>
@endsection