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
      <div class="col-lg-12 ">
        <div class="row ">
          <form action="{{route('admin.roleEditPut',['id'=>$dataRouteEdit->id])}}" method="POST" class="d-flex mt-3">
            @csrf @method('PUT')
            <div class="col-lg-6">
              <label for="name" class="form-label">Tên nhóm quyền:</label>
              <input type="text" class="form-control"  placeholder="Enter name" name="name" value="{{old('name') ?? $dataRouteEdit->name}}" style="width: 80%;"> 
              <input type="hidden" value="{{$dataRouteEdit->id}}" name="idName" />
              @error('name')
              <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
            <div class="col-lg-6">

              @if($errors->any())
              <div class="alert alert-danger text-center">
                <p style="color:red;">Vui lòng nhập dữ liệu</p>
              </div>
              @endif
              
              <!--chon Route -->
              <p>Chọn Routes</p>
              <p><input class="form-check-input me-1" type="checkbox" value="" name="checkAll" id="allChecked">CheckAll</p>

              <div class="list-group" style="width:100%;height:400px; overflow-y: auto; ">
                @foreach($list_r as $key=>$rou)
                <label class="list-group-item">
                  <input class="form-check-input inputCheckForm me-1" type="checkbox" value="{{$rou}}" name="role[]" 
                  @if(is_array($listQuyen) && in_array($rou, $listQuyen))
                  checked="checked"
                  @endif >
                  {{$rou}}
                </label>
                @error('role')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                @endforeach
              </div>
              
              <div class="col-lg-12 mt-2">
                <button type="submit" class="btn btn-primary">Save</button>
                 <a href= "{{route('admin.roleEdit',['id'=>$dataRouteEdit->id])}}" class="btn btn-secondary cancelbtn" data-url-role="{{route('admin.roleList')}}">Cancel</a>
              </div>
            </div><!-- col-8 -->
         </form><!-- End settings Form -->
        </div><!-- row-->
      </div>
    </div>
  </section>
</main>
@endsection
@section('js')
  <script type="text/javascript" charset="utf-8" async defer>
   
    $(document).ready(function(){
      $('#allChecked').on('click',function(){
        
        var _check =  $(this).is(':checked');
      
        if(_check==true){
          
          $('.inputCheckForm').prop('checked',true);
          
        }else{
          $('.inputCheckForm').prop('checked',false);
        }
      })
    
    //cancel
    $('.cancelbtn').on('click',function(e){

      e.preventDefault();
      
      var _url = $(this).data('url-role');
     
      if(confirm('Bạn có chắc rời khỏi trang này ?')==false){
                
           alert('Bạn tiếp tục !');
            
       }else{
           window.location.href = _url;                 
         }
    })



    });
  </script>
@endsection