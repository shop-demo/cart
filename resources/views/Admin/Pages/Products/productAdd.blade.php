@extends('admin.masterLayout')
@section('css')
  <style>

  </style>
@endsection
@section('content')
<main id="main" class="main">
    
    @php $category =getTheloai_id_cha($listCategory,$id_cha=0,$level=0); @endphp
     
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

          <div class="card">
            <div class="card-body">
              <h4 class="card-title text-uppercase mb-5">{{$title}}</h4>

               @if($errors->any())
                  <div class="alert alert-danger text-center">
                      <p style="color:red;">Vui lòng nhập dữ liệu</p>
                  </div>
                @endif

              <!-- General Form Elements -->
              <form action="{{route('admin.productAdd_Post')}}" method="POST">
                  @csrf
               
                <div class="row mb-4">
                  
                  <label for="inputText" class="col-sm-2 col-form-label fw-bold">Name</label>
                 
                  <div class="col-sm-10">
                    
                    <input type="text" class="form-control" name="name" value="{{ old('name')}}" placeholder="Tên sản phẩm">
                   
                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  
                  </div>
                
                </div>
                
                <div class="row mb-4">
                  
                  <label for="inputcode" class="col-sm-2 col-form-label fw-bold">code</label>
                 
                  <div class="col-sm-10">
                    
                    <input type="text" class="form-control" name="code" value="{{ old('code')}}" placeholder="Nhập dữ liệu">
                    
                    @error('code')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                 
                  </div>
                
                </div>
                
                <div class="row mb-4">
                  <label for="inputAvatar" class="col-sm-2 col-form-label fw-bold">File Upload Avatar</label>
                  <div class="col-sm-10 d-flex p-3 ">
                    <input class="form-control" type="text" name="avatar" id="avatar" style="width: 70%;height:auto;" value="{{ old('avatar')}}" placeholder="Chọn ảnh">
                    <button type="button" class="btn btn-info ms-1 text-white" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fa fa-folder-open-o" aria-hidden="true"></i></button>

                    @error('avatar')
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
                          <iframe src="{{url('public')}}/manager/dialog.php?field_id=avatar" style="width:100%;height:600px; overflow-y: auto; "></iframe>
                          
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
                  <label for="album-input" class="col-sm-2 col-form-label fw-bold">File Upload Albums</label>
                  <div class="col-sm-10 d-flex p-3 ">
                    <input class="form-control" type="text" name="album_image" value="{{ old('album_image')}}" id="albums" style="width: 70%;height:auto;" placeholder="Chọn ảnh">
                    <button type="button" class="btn btn-info ms-1 text-white" data-bs-toggle="modal" data-bs-target="#Modal_albums"><i class="fa fa-folder-open-o" aria-hidden="true"></i></button>
                  </div>
                  <!-- The Modal albums -->
                  <div class="modal" id="Modal_albums">
                    <div class="modal-dialog modal-xl">
                      <div class="modal-content">

                        <!-- Modal Header albums-->
                        <div class="modal-header">
                          <h4 class="modal-title">File images</h4>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal body albums-->
                        <div class="modal-body">
                          <iframe src="{{url('public')}}/manager/dialog.php?field_id=albums" style="width:100%;height:600px; overflow-y: auto; "></iframe>
                          
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
                    <textarea class="form-control" style="height: 100px" name="description" placeholder="Mô tả ngắn sản phẩm">{{ old('description')}}</textarea>
                    @error('description')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
                <div class="row mb-5">
                  <label for="inputPassword" class="col-sm-2 col-form-label fw-bold">Textarea Product Details</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" style="height:100px;" id="editor1" name="product_details"  placeholder="Mô tả chi tiết sản phẩm">{{ old('product_details')}}</textarea>
                    @error('product_details')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
                <!--  price --> 
                <div class="row mb-5 ">
                  
                  <div class="col-sm-2">
                    <p class="fw-bold">Price</p>
                  </div>
                  <div class="col-sm-4">  
                    <input type="text" class="form-control" name="price" value="{{old('price')}}" placeholder="Ô nhập dữ liệu">
                    @error('price')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                  <div class="col-sm-2">
                    <p class="text-end fw-bold">Sale</p>
                  </div>
                  <div class="col-sm-4">  
                    <input type="text" class="form-control" name="sale" value="{{old('sale')}}" placeholder="Ô nhập dữ liệu">
                   @error('sale')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                  <!--   số lượng  --> 
                  <div class="col-sm-2 pt-2">
                    <p class="fw-bold">Số lượng</p>
                  </div>
                   <div class="col-sm-4 pt-2">  
                    <input type="text" class="form-control" name="quantity" value="{{old('quantity')}}" placeholder="Ô nhập dữ liệu">
                   @error('quantity')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
               
                  <!--  end số lượng  -->
                </div>
                 
               <!--  status --> 
                <fieldset class="row mb-4">
                  <legend class="col-form-label col-sm-2 pt-0 fw-bold">Status</legend>
                  <div class="col-sm-10">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="status" value="1" {{ old('status')== 1 ? 'checked' : false }}>
                      <label class="form-check-label" for="gridRadios1">
                        Kích hoặt
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="status" value="0" {{ old('status')== 0 ? 'checked' : false }}>
                      <label class="form-check-label" for="gridRadios2">
                        Chưa kích hoặt
                      </label>
                        @error('status')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                  </div>
                </fieldset>

                 <!-- end status --> 
                
                <div class="row mb-4">
                  <label class="col-sm-2 col-form-label fw-bold">Chọn Caterogy</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="category_id">
                      <option value="0" >Chọn Danh mục thể loại </option>
                    @foreach($category as $item)   
                      <option value="{{$item->id}}" {{ old('category_id')== $item->id ? 'selected' : false }}>{{str_repeat(' --- ',$item->level).$item->name}}</option>
                      
                    @endforeach
                    </select>
                       
                  </div>
                </div>


                <div class="row mb-4">
                  <label class="col-sm-2 col-form-label fw-bold">Submit Button</label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Thêm Mới</button>
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
  filebrowserBrowseUrl : '{{url("public")}}/manager/dialog.php?type=2&editor=ckeditor&fldr=',
  filebrowserUploadUrl : '{{url("public")}}/manager/dialog.php?type=2&editor=ckeditor&fldr=',
  filebrowserImageBrowseUrl : '{{url("public")}}/manager/dialog.php?type=1&editor=ckeditor&fldr='
  
});
  
      //http://localhost/upload/sanpham/images/cookie.png
 
 </script>


@endsection