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

          <div class="card">
            <div class="card-body">
              <h4 class="card-title text-uppercase mb-5"> {{$title}}</h4>

               @if($errors->any())
                  <div class="alert alert-danger text-center">
                      <p style="color:red;">Vui lòng nhập dữ liệu</p>
                  </div>
                @endif

              <!-- General Form Elements -->
              <form action="{{ route('admin.bannerEdit_post',['id'=>$bannerDetail->id]) }}" method="POST">
                  @csrf
               
                <div class="row mb-4">
                  
                  <label for="inputText" class="col-sm-2 col-form-label fw-bold">Name</label>
                 
                  <div class="col-sm-10">
                    <input type="hidden" class="form-control" name="nameId" value="{{$bannerDetail->id}}" />
                    <input type="text" class="form-control" name="name" value="{{ old('name') ?? $bannerDetail->name}}" placeholder="Tên slider">
                   
                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  
                  </div>
                
                </div>
                
                <div class="row mb-4">
                  
                  <label for="inputcode" class="col-sm-2 col-form-label fw-bold">code</label>
                 
                  <div class="col-sm-10">
                    
                    <input type="text" class="form-control" name="code" value="{{ old('code')?? $bannerDetail->code }}" placeholder="Nhập dữ liệu">
                    
                    @error('code')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                 
                  </div>
                
                </div>
                <div class="row mb-4">
                  
                  <label for="inputLink" class="col-sm-2 col-form-label fw-bold">Link</label>
                 
                  <div class="col-sm-10">
                    
                    <input type="text" class="form-control" name="link" value="{{old('link') ?? $bannerDetail->link}}" placeholder="Nhập dữ liệu">
                    
                    @error('link')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                 
                  </div>
                
                </div>
                
                <div class="row mb-4">
                  <label for="inputAvatar" class="col-sm-2 col-form-label fw-bold">File Upload image</label>
                 
                  <div class="col-sm-10 d-flex p-3 ">
                    <input class="form-control" type="text" name="image" id="image" style="width: 70%;height:auto;" value="{{ old('image') ?? $bannerDetail->image }}" placeholder="Chọn ảnh">

                      <img src="{{url('public')}}/uploads/slides/{{$bannerDetail->image}}" style="width:10%; height:auto;" />
                    
                    <button type="button" class="btn btn-info ms-1 text-white" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fa fa-folder-open-o" aria-hidden="true"></i></button>
                    @error('image')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                     
                
                  </div>
                  
                   <!--show avatar -->
                  <!-- The Modal -->
                  <div class="modal" id="myModal">
                    <div class="modal-dialog modal-xl">
                      <div class="modal-content">

                        <!-- Modal Header avatar-->
                        <div class="modal-header">
                          <h4 class="modal-title">File images</h4>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                          <iframe src="{{url('public')}}/manager/dialog.php?field_id=image" style="width:100%;height:600px; overflow-y: auto; "></iframe>
                          
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Chọn</button>
                        </div>

                      </div>
                    </div>
                  </div>

                </div>

                
                
                <div class="row mb-4">
                  <label for="inputPassword" class="col-sm-2 col-form-label fw-bold">Textarea Description</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" style="height: 100px" name="description" placeholder="Mô tả">{{old('description') ?? $bannerDetail->description }}</textarea>
                    @error('description')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
                
                <fieldset class="row mb-4">
                  <legend class="col-form-label col-sm-2 pt-0 fw-bold">Status</legend>
                  <div class="col-sm-10">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="status" id="gridRadios1" value="1" {{old('status')|| $bannerDetail->status == 1 ? 'checked' : false  }}>
                      <label class="form-check-label" for="gridRadios1">
                        Kích hoặt
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="status" id="gridRadios2" value="0" {{old('status') || $bannerDetail->status == 0 ? 'checked' : false }}>
                      <label class="form-check-label" for="gridRadios2">
                        Chưa kích hoặt
                      </label>
                        
                    </div>

                    
                  </div>
                </fieldset>
              

                <div class="row mb-4">
                  <label class="col-sm-2 col-form-label fw-bold">Submit Button</label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
                </div>
              </form><!-- End General Form Elements -->
            </div>
          </div>

        </div>

      </div>
    </section>
    
 </main>

@endsection

@section('js')
<script >
     
  CKEDITOR.replace( 'editor1' ,{
  filebrowserBrowseUrl : '/website/shopping/public/manager/dialog.php?type=2&editor=ckeditor&fldr=',
  filebrowserUploadUrl : '/website/shopping/public/manager/dialog.php?type=2&editor=ckeditor&fldr=',
  filebrowserImageBrowseUrl : '/website/shopping/public/manager/dialog.php?type=1&editor=ckeditor&fldr='
  
});
  
      //http://localhost/upload/sanpham/images/cookie.png
 
 </script>


@endsection