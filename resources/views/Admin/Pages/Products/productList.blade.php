@extends('admin.masterLayout')
@section('css')
<style>


</style>
@endsection
@section('content')
<main id="main" class="main">

  <div class="pagetitle">
    <h2 class="fw-bold pt-3 ">{{$title}}</h2>

    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Home</a></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active">Data</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section dashboard">
    <div class="row">
     <div class="col-12">
      <div class="card top-selling overflow-auto">

        <div class="filter"><!--bộ lọc -->
          <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            <li class="dropdown-header text-start">
              <h6>Filter</h6>
            </li>

            <li><a class="dropdown-item" href="#">Today</a></li>
            <li><a class="dropdown-item" href="#">This Month</a></li>
            <li><a class="dropdown-item" href="#">This Year</a></li>
          </ul>
        </div>

        <div class="card-body pb-0">
          <h5 class="card-title">{{$title}}<span>|</span></h5>
          <div class="p-2">
            @if(session('success'))
            <div class="alert alert-success text-center">
              <strong >{{session('success')}}</strong> 
            </div>
            @else
            <div class="alert alert-light text-center">
              <p>Chưa có dữ liệu nào được thêm vào.</p> 
            </div>
            @endif
          </div>
          
           <!-- btn-->
           <div class="p-2 ">
            <div class="d-flex justify-content-between ">
             <!-- btn add - deleteAll-->
              <div class="p-2 ">
               <a href="{{route('admin.productAdd')}}" class="btn btn-success">Add Product</a>
               <a href="{{route('admin.productsDelete')}}" class="btn btn-danger ms-3 deleteAll">Delete-all</a>
             </div>
               <!-- seach-->
             <div class=" p-2" style="width: 50%;height:auto;">
               <form class="d-flex mb-3 " method="POST" action="" id="seachPro">
                @csrf
                <input class="form-control me-2 inputSeach" type="text" placeholder="Search" name="key" value="" >
                <button class="btn btn-primary btn-seach" type="button">Search</button>
              </form>
              <div class="list-seach" style="display: none;">
                <ul class="list-group">
                  <li class="list-group-item">
                  <img src="" alt="" >
                  <a href="">An item</a></li>
                  <li class="list-group-item">A second item</li>
                  <li class="list-group-item">A third item</li>
                  <li class="list-group-item">A fourth item</li>
                  <li class="list-group-item">And a fifth one</li>
                </ul><!-- End Default List group -->
              </div>
            </div>
            <!-- seach-->
          </div>
        </div>
          
          <form action="" method="POST" id="mainform" enctype="multipart/form-data">
            @csrf @method('DELETE')
               
            <table class="table">
              <thead>
                <tr>
                  <th><input class="form-check-input" type="checkbox" value="" id="checkAll"/></th>
                  <th cope="col">stt</th>
                  <th scope="col">Ảnh Sản phẩm</th>
                  <th scope="col">Tên Sản phẩm</th>
                  <th scope="col">slug</th>
                  <th scope="col">Price</th>
                  <th scope="col">Sale</th>
                  <th scope="col">Status</th>
                  <th scope="col">created_at</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($dataProduct as $key=>$product)
                <tr>

                  <td><input class="form-check-input input_check" type="checkbox" value="{{ $product->id }}" name="checkName[]" /></td>
                  <td>{{$key+1}}</td>
                  <td><a href="#"><img src="{{url('public/uploads')}}/Products/{{$product->avatar}}" alt="{{$product->avatar}}"></a></td>
                  <td><a href="#" class="text-primary fw-bold"></a>{{$product->name}}</td>
                  <td><a href="#" class="text-primary fw-bold"></a>{{$product->code}}</td>
                  <td>{{number_format($product->price)}}vnđ</td>
                  <td class="fw-bold">{{number_format($product->sale)}}vnđ</td>
                  <td>
                  <form action="" method="POST" id="activeProduct">
                    @csrf @method('PUT')
                    @if($product->status == 0)
                    <a href="{{route('admin.activeProduct',['id'=>$product->id])}}" class="badge bg-danger proActive">Private</a>
                    @else
                     <a href="{{route('admin.notActiveProduct',['id'=>$product->id])}}" class="badge bg-success proNotActive">Public</a>
                    @endif
                  </form>  
                  </td>
                  <td>{{$product->created_at == null ? '' : $product->created_at->format('m-d-Y')}}</td>
                  <td>{{$product->quantity}}</td>
                  <td>
                    <div class="d-flex">
                      <a href="{{route('admin.productTabs',['id'=>$product->id])}}" class="btn btn-info btn-sm me-1">tabs</a>
                      <a href="{{route('admin.productEdit',['id'=>$product->id])}}" class="btn btn-info btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                      <form action="" method="post" id="pro_form">
                        @csrf @method('DELETE')
                        <a href="{{route('admin.productDelete',['id'=>$product->id])}}" class="btn btn-warning btn-sm ms-1 DeleteSp"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                      </form>
                    </div>
                  </td>
                </tr>
                @endforeach 
              </tbody>
            </table>
          </form>
          
        </div>

      </div>
    </div><!-- End Top Selling -->
    {{$dataProduct->appends(request()->all())->links()}}
    
    <!--phân trang -->
  
  </div>
</section>
</main>
@endsection
@section('js')
<script type="text/javascript" charset="utf-8" async defer>

  $(document).ready(function(){

    $('.DeleteSp').on('click',function(e){
      e.preventDefault();
      
      var _href = $(this).attr('href');
      
      $('#pro_form').attr('action',_href);
      
      if(confirm('bạn có muốn xóa không')==false){
       window.location = "{{route('admin.productList')}}";
       alert('Chưa có dữ liệu nào được xóa');
      }else{
          $('#pro_form').submit();
      }


        });//btnDeleteSp

      //xóa nhiều products
      $('.deleteAll').on('click',function(e){
       e.preventDefault();
           var _button = $(this).attr('href');
         
           $('form#mainform').attr('action',_button);

           if(confirm('bạn có muốn xóa không')==false){
             window.location = "{{route('admin.productList')}}";
             alert('Chưa có dữ liệu nào được xóa');
           }else{
            $('form#mainform').submit();
          }
      })

      //chon hết input
      $('#checkAll').on('click',function(){

        var check_input =  $(this).is(':checked');

        if(check_input==true){

          $('.input_check').prop('checked',true);
          
        }else{
          $('.input_check').prop('checked',false);
        }

      });



    }); 
  //active
    $('.proActive').on('click',function(e){
       e.preventDefault();
        var _btn = $(this).attr('href');
        $('#activeProduct').attr('action',_btn);
        $('#activeProduct').submit();
    });

    $('.proNotActive').on('click',function(e){
       e.preventDefault();
        var _a = $(this).attr('href');
        $('#activeProduct').attr('action',_a);
        $('#activeProduct').submit();
    });

//seach
   

</script>
    
 
  @endsection