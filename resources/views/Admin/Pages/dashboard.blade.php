@extends('Admin.masterLayout')
@section('content')
	<main id="main" class="main">

    <div class="pagetitle">
      <h1>Quản lý hệ thống</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="">Home</a></li>
          <li class="breadcrumb-item active">Đăng nhập</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

      <div class="col-lg-7" style="border: 1px solid #ccc; margin: 0 auto; padding-bottom: 1rem;">
      	<div class="row">
      		 @if($errors->any())
              <div class="alert alert-danger text-center">
                  <p style="color:red;">Vui lòng nhập dữ liệu</p>
              </div>
            @elseif(session('success'))
            <div class="alert alert-success text-center delete">
                <strong >{{session('success')}}</strong> 
              </div>
            @endif
           
      		<form action="{{route('dashboardLogin')}}" method="POST">
      		  @csrf
				  <div class="mb-3 mt-3">
				    <label for="email" class="form-label">Email:</label>
				    <input type="email" class="form-control"  placeholder="Enter email" name="email" value="{{old('email')}}">
             @error('email')
                  <p>{{ $message }}</p>
             @enderror
				  </div>
				  <div class="mb-3">
				    <label for="pwd" class="form-label">Password:</label>
				    <input type="password" class="form-control"  placeholder="Enter password" name="password" value="{{old('password')}}">
             @error('password')
                  <p>{{ $message }}</p>
             @enderror
				  </div>
				  <div class="form-check mb-3">
				    <label class="form-check-label">
				      <input class="form-check-input" type="checkbox" name="remember" value=""> Remember me
				    </label>
				  </div>
				  <button type="submit" class="btn btn-primary">Submit</button>
				</form>
      	</div>

      </div>
        

      </div>
    </section>

  </main><!-- End #main -->

@endsection