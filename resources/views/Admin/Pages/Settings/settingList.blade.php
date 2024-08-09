@extends('Admin.masterLayout')
@section('css')
  <style>

  </style>
@endsection

@section('content')
	<main id="main" class="main">

	    <div class="pagetitle">
	      <h1>{{-- $title --}}</h1>
	      <!--nav -->
        @include('Admin.Pages.Block.nav')
        <!--end nav -->
	    
      </div><!-- End Page Title -->

	    <section class="section dashboard">
	      <div class="row">
	      <div class="col-12">
              <div class="card top-selling overflow-auto">

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

                <div class="card-body pb-0">
                  <h5 class="card-title">{{ $title}}<span>| Today</span></h5>
                   
                   <!--button thêm mới -->
                  <div class="d-flex justify-content-between mb-3">
                      <div class="p-2 bd-highlight">
                         <input class="form-control" type="text" placeholder="seach" name="seach">
                       </div> 
                        <div class="p-2 bd-highlight">
                       
                          <span><a href="{{route('admin.settingAdd')}}" class="btn btn-primary">Thêm mới</a></span>
                         
                          <span><a href="{{route('admin.settingAllDelete')}}" class="btn btn-danger deleteAllSe">Delete-All</a></span>
                          
                      </div>
                  </div>
                   <!--\button thêm mới -->  
                @if(session('success')) 
                    <div class="alert alert-success text-center delete">
                        <strong >{{session('success')}}</strong> 
                      </div>
                @endif 
                  <form action="" method="POST" id="DeleteSettingF">
                  @csrf @method('DELELE')
                            
                      <table class="table ">
                        <thead>
                          <tr style="border-bottom: 1px solid #ccc;">
                            <th><input class="form-check-input " id="checkIn" type="checkbox" value="" name="checkName[]" /></th>
                            <th scope="col">#</th>
                            <th scope="col">Name key</th>
                            <th scope="col">Value</th>
                            <th scope="col">Status</th>
                            <th scope='col'>Type</th>
                            <th scope="col">created_at</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                          <tbody>
                    @foreach($listSetting as $key=>$item) 
                            <tr>
                              <td><input type="checkbox" name=checkName[] value="{{ $item->id}}"  class="checkInput" /></td>
                              <td>{{ $key+1}}</td>
                              <td>{{$item->name_key }}</td>
                              <td>{{$item->value}}</td>
                              <td class="fw-bold">
                              <!-- status-->
                              <form action="" method="POST" id="actionSettingF" >
                                @csrf @method('put')
                               @if($item->status==0) 
                                  <a href="{{ route('admin.SettingAtive',['id'=>$item->id])}}" class="badge bg-danger notActiveS">Ẩn</a>
                                @else 
                                  <a href="{{route('admin.SettingNotAtive',['id'=>$item->id])}}" class="badge bg-success activeS">Hiện</a>
                               @endif 
                              </form>
                              <!-- end status-->

                              </td>
                             <td>{{$item->type}}</td>
                              <td>{{$item->created_at == null ? '' : $item->created_at->format('m-d-Y')}}</td>
                             
                              <td>
                                <a href="{{route('admin.settingEdit',['id'=>$item->id]).'?type='.$item->type}}" class="btn btn-info btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                
                                <form action="" method="POST" id="Delete_S">
                                  @csrf @method("DELETE")
                                <a href="{{route('admin.settingDelete',['id'=>$item->id])}}" class="btn btn-warning btn-sm btnDeleteSe"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </form>
                              </td>
                            </tr>
                       @endforeach 
                          </tbody>
                      </table>
                  </form>
                </div>

              </div>
            </div>

	      	
	      </div>
	    </section>
    </main>

@endsection
@section('js')
  <script  type="text/javascript" charset="utf-8" async defer>
    
    $(document).ready(function(){
      /*Delete*/
      $('.btnDeleteSe').on('click',function(e){
        e.preventDefault();
       
        var _href = $(this).attr('href');
        
        var sub = $('form#Delete_S').attr('action',_href);
          

          if(confirm('bạn có chắc xóa không')==false){
            
            window.location = '{{route('admin.setting')}}';
            
             alert('Chưa có dữ liệu nào được xóa');
          
          }else{
            
            $('form#Delete_S').submit();
          
          }
      });

      /*DELETE ALL*/
        $('.deleteAllSe').on('click',function(ev){
          
          ev.preventDefault();
         
          var _btn = $(this).attr('href');
         
          $('form#DeleteSettingF').attr('action',_btn);

           if(confirm('bạn có muốn xóa không')==false){
             window.location = "{{route('admin.setting')}}";
             alert('Chưa có dữ liệu nào được xóa');
           }else{
            $('form#DeleteSettingF').submit();
          }

        });


         //chon hết input
      $('#checkIn').on('click',function(){

        var check_input =  $(this).is(':checked');

        if(check_input==true){

          $('.checkInput').prop('checked',true);
          
        }else{
          $('.checkInput').prop('checked',false);
        }

      });


      /*end DELETE ALL*/

      /*active setting*/
      $('.notActiveS').on('click',function(ev){
        ev.preventDefault();
        var _button = $(this).attr('href');
        var sub = $('form#actionSettingF').attr('action',_button);

        if(confirm('bạn có chắc cập nhật dữ liệu không?')==false){
             window.location = "{{route('admin.setting')}}";
             alert('Chưa có dữ liệu nào cập nhật');
           }else{
            $('form#actionSettingF').submit();
          }
        
      });

      //action
       $('.activeS').on('click',function(ev){
        ev.preventDefault();
        var _btn = $(this).attr('href');
        var sub = $('form#actionSettingF').attr('action',_btn);

        if(confirm('bạn có chắc cập nhật dữ liệu không?')==false){
             window.location = "{{route('admin.setting')}}";
             alert('Chưa có dữ liệu nào cập nhật');
           }else{
            $('form#actionSettingF').submit();
          }
        
      });


      /*end active_setting*/

    


    });
    
  </script>
@endsection