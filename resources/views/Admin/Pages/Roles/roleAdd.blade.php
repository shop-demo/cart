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
        <div class="row">
          <div class="col-lg-10" style="margin:2rem auto;">

            <div class="card">
              <div class="card-body">
                   @if($errors->any())
                   <div class="alert alert-danger text-center">
                    <p style="color:red;">Vui lòng nhập dữ liệu</p>
                   </div>
                    @endif
                 <!-- Settings Form -->
                  <form action="{{route('admin.roleAdd_post')}}" method="POST">
                    @csrf
                    <div class="mb-3 mt-3">
                      <label for="name" class="form-label text-capitalize fw-bold">Tên nhóm quyền:</label>
                      <input type="text" class="form-control"  placeholder="Enter name" name="name">
                       @error('name')
                        <p class="text-danger">{{ $message }}</p>
                       @enderror
                    </div>
                    <div class="row mb-3">
                      <div class="col-lg-12">
                        <div class="row">
                        
                        <!--chon Route -->
                          <p class="text-capitalize fw-bold">Chọn Routes</p>
                          <p><input class="form-check-input me-1" type="checkbox" value="" name="checkAll" id="allChecked">CheckAll</p>
                          
                          <div class="list-group" style="width:100%;height:400px; overflow-y: auto;">
                            @foreach($list_r as $key=>$rou)
                              <label class="list-group-item">
                                <input class="form-check-input me-1 inputCheckForm" type="checkbox" value="{{$rou}}" name="role[]">
                                {{$rou}}
                              </label>
                              @error('role')
                                 <p class="text-danger">{{ $message }}</p>
                              @enderror
                           @endforeach
                          </div>
                        </div>
                        
                      </div>
                      
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Thêm Vai Trò</button>
                       <button type="submit" class="btn btn-secondary btnCancel" data-url-role="{{route('admin.roleList')}}">Cancel</button>
                    </div>
                  </form><!-- End settings Form -->
                
               
              </div>
            </div>

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
      $('#allChecked').on('click',function(){
        
        var _check =  $(this).is(':checked');
      
        if(_check==true){
          
          $('.inputCheckForm').prop('checked',true);
          
        }else{
          $('.inputCheckForm').prop('checked',false);
        }
      })
    
    });
  
    //cancel
    $('.btnCancel').on('click',function(e){
      e.preventDefault();
      var _url= $(this).data('url-role');

      if(confirm('bạn có chắc rời khỏi trang không')==false){
                
           alert('Bạn tiếp tục!');
            
       }else{
           window.location.href = _url;            
         }
      
    });

  </script>
@endsection