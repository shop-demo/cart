@extends('Admin.masterLayout')

@section('content')
main>
    <div class="container">
    	<?php 
    	//$code = isset($code) ? $code : 404;
    	//$title = isset($title) ? $title : "không tìm thấy";
    	//$message = isset($message) ? $message : 'Bạn không có quyền vào trang này';

    	?>

      <section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
        <h1>{{$code }}</h1>
        <h2>{{$title}}</h2>
        <a class="btn" href="{{route('dashboard')}}">Back to home</a>
        <img src="{{url('public/Admin')}}/assets/img/not-found.svg" class="img-fluid py-5" alt="{{$title}}">
        <div class="credits">
          <h2>{{$message}}</h2>
        </div>
      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

@endsection