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

            @if($errors->any())
              <div class="alert alert-danger text-center">
                  <p style="color:red;">Vui lòng nhập dữ liệu</p>
              </div>
            @endif
             <!-- Vertical Form -->
            <form class="row g-4 mt-3" action="{{ route('admin.productTabs_put',['id'=>$dataProduct->id])}}" method="post"  />
              @csrf @method('put')
            <div class="col-12">
                <label for="inputName" class="form-label fw-bold">Tên sản phẩm </label>
                <input type="text" class="form-control"  name="name" value="{{$dataProduct->name}}" placeholder="Nhập name" />
                @error('name')
                  <p>{{ $message }}</p>
                @enderror
             </div>
              <div class="col-12">
                  <p>Chọn tabs </p>
                  <ul class="list-group">

                  @foreach($dataTabs as $key=>$tabsItem)
                    
                    <li class="list-group-item">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="{{$tabsItem->id}}" name="tabs_name[]"

                        @if(isset($tabs) && in_array($tabsItem->tabs_name,$tabs))? {{'checked'}} :{{''}} @endif  >
                        
                        <label class="form-check-label" for="flexCheckDefault">
                          {{$tabsItem->tabs_name}}
                        </label>
                      </div>
                    </li>
                  
                  @endforeach  
                  </ul>
                
                @error('tabs_name')
                  <p>{{ $message }}</p>
                @enderror
              </div>
              
              <div class="col-12">
                <label for="inputAddress" class="form-label fw-bold">Status</label>
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="status">
                  <option value="0" {{ old('status')== 0 ? 'selected' : false }} >Chưa khích hoặt</option>
                  <option value="1" {{ old('status')== 1 ? 'selected' : false }}>Kích hoặt</option>
                </select>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-secondary cancel-tabs" data-url-tabs="{{route('admin.productList')}}">Cancel</button>
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
    $('.cancel-tabs').on('click',function(ev){
      ev.preventDefault();
      var _url=$(this).data('url-tabs');
      if(confirm('Bạn có chắc không !')==false){
             alert('Mời Bạn tiếp tục.');
          }else{
            window.location.href = _url;
          }
      
    });
 

  });
</script>
@endsection