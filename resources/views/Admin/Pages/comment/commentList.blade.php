@extends('Admin.masterLayout')
@section('css')
  <style>

  </style>
@endsection
@section('content')

<main id="main" class="main">

  <div class="pagetitle">
    <h2>{{$title }}</h2>
    @include('Admin.Pages.Block.nav')
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <!-- Recent Sales -->
      <div class="col-12">
        <div class="card recent-sales overflow-auto">

          <div class="filter">
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

          <div class="card-body">
            <h5 class="card-title">{{$title}}<span>| Today</span></h5>
            @if(session('success'))
            <div class="alert alert-success text-center delete">
              <strong >{{session('success')}}</strong> 
            </div>
            @endif

            <table class="table table-borderless datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Customer</th>
                  <th scope="col">Commment</th>
                  <th scope="col">Reply_id</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @if($commList)
                @foreach($commList as $key=>$comm)
                <tr>
                  <th scope="row"><a href="#">{{$key+1}}</a></th>
                  <td>{{$comm->use->name}}</td>
                  <td><span class="text-primary">{{$comm->comment}}</span>
                  <!-- form replay -->
                    @if($comm->status==1)
                    <div style="margin-top: 10px; width: 100%; height:auto;">
                      <form action="" method="POST" class="repForm_{{$comm->id}} rep" style="display: none;">
                      @csrf @method('PUT')
                       <textarea name="comment" class="textCommRep_{{$comm->id}}" rows="4" cols="50" style="width: 100%;" value=""></textarea>
                       <p class="loi_ text_err"></p>
                     </form>
                      <p class="mt-1"><button class="btn btn-link btnRep rep_btn" data-url="{{route('admin.commRep',['id'=>$comm->id])}}" data-product-id="{{$comm->product_id}}" data-customes-id="{{$comm->customes_id}}" data-id="{{$comm->id}}" style="float: right;">Trả lời</button></p>
                   </div>
                   @endif
                   <!--end from-replay -->
                  <ol id="textRep" class="list-group list-group-numbered">
                  @foreach($comm->replay as $key=>$rep)
                     <li class="list-group-item d-flex justify-content-between align-items-start" >
                      <div class="ms-2 me-auto">
                       <div> {{$rep->comment}}</div>
                      </div>
                      <div>
                       <a href="{{route('admin.editRep',['id'=>$rep->id])}}"><span class=" badge bg-secondary">edit</span></a>
                       <form action="" method="POST" style="display: inline-block;" id="repForm">
                       @csrf @method("delete")
                       <a href="{{route('admin.deleteCommRep',['id'=>$rep->id])}}" class="btn btn-secondary badge bg-secondary repDelete" data-url-rep="{{route('admin.deleteCommRep',['id'=>$rep->id])}}" data-id-rep="{{$rep->id}}">delete</a>
                       </form>
                      </div>
                      
                     </li>
                  @endforeach
                   </ol>
                    
                 </td>
                 <td>{{$comm->reply_id}}</td>
                 <!--status -->
                 <td>
                    <form action="" method="POST" id="form_status" >
                      @csrf @method('PUT')

                      @if($comm->status==0)
                      <button class="btn btn-warning active" data-id="{{$comm->id}}" data-url="{{route('admin.commentActive',['id'=>$comm->id])}}" >Ẩn</button>
                      @else
                      <button class="btn btn-success not_active"  data-id="{{$comm->id}}" data-url="{{route('admin.commentNotActive',['id'=>$comm->id])}}">Hiện</button>
                      @endif
                    </form>
                  </td>
                  <!--end status-->
                  <td>
                    <form action="" method="POST" id="formComm">
                      @csrf @method('DELETE')
                      <a href="{{route('admin.commentEdit',['id'=>$comm->id])}}" class="btn btn-primary">Edit</a>
                      <a href="{{route('admin.commentDelete',['id'=>$comm->id])}}"  class="btn btn-danger commDelete" data-id="{{$comm->id}}">delete</button>
                    </form>
                  </td>
                </tr>
                @endforeach
                @endif
              </tbody>
            </table>

          </div>

        </div>
      </div><!-- End Recent Sales -->

    </div>
  </section>
</main>
@endsection
@section('js')
  <script src="{{url('public/Admin')}}/jquery/adminComment.js" type="text/javascript" charset="utf-8" async defer></script>
@endsection