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
    <div class="container-fluid">
      <div class="row">
        <div class="card">
          <div class="card-body">
            <form action="{{route('admin.customeQuyenAdd',['id'=>$dataCus->id])}}" method="POST">
              @csrf @method('PUT')
              <div class="row">
                <div class="col-md-6"> <!--info user -->
                  <p class="h5 py-3 text-capitalize fw-bolder">Thông tin User</p>
                  <div class="mb-3 mt-3">
                    <label for="uname" class="form-label">Username:</label>
                    <input type="text" class="form-control" id="uname" placeholder="Enter username" name="name" value="{{old('name')?? $dataCus->name}}">
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                  </div>
                  <div class="mb-3 mt-3">
                    <label for="uname" class="form-label">Email:</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" value="{{old('email')?? $dataCus->email}}" >
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                  </div>
                  <div class="mb-3">
                    <label for="pwd" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" value="{{old('password')?? $dataCus->password}}" >
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                  </div>
                </div> 
                <!--quyen -->
                <div class="col-md-6">
                 <p class="h5 py-4 text-capitalize fw-bolder">Quyền</p>
                 <ul class="list-group mt-4 pt-2">
                   @foreach($dataRole as $key=>$val)
                   <li class="list-group-item">
                    <input class="form-check-input me-1" type="checkbox" value="{{$val->id}}" name="role[]" 
                    @if(in_array($val->name, $roleCus)) ? {{'checked'}} : {{''}} ; @endif >
                    {{$val->name}}

                  </li>
                  @endforeach
                </ul>
              </div>   <!--quyen -->

            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{route('admin.customeQuyen',['id'=>$dataCus->id])}}" class="btn btn-secondary cancelQuyen" data-url-cus="{{route('admin.customeList')}}">cancel</a>

          </form>
        </div>
        <div>
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
        $('.cancelQuyen').on('click',function(e){

          e.preventDefault();
          
          var _url = $(this).data('url-cus');
         
          if(confirm('Bạn có chắc rời trang này không?')==false){
                    
               alert('Mời bạn tiếp tục !');
                
           }else{
                         
               window.location.href = _url;               
             }
        })
    });//document
  </script>
@endsection