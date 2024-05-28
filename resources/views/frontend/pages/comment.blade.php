  
  <!--comm  -->
  @if(isset($commProduct))
  @foreach($commProduct as $key=>$comm)
 <div class="col-lg-2 col-md-2 col-sm-4" style="border-bottom: 1px solid #ddd; padding: 15px 0;">
   <div class="profile"> <img class="img-responsive" src="{{url('public/frontend')}}/images/layout_img/client1.png" alt="#"> </div>
 </div>
 <div class="col-lg-10 col-md-10 col-sm-8" style="border-bottom: 1px solid #ddd; padding: 15px 0;">
   <h5>{{$comm->use->name}}</h5>
   <p><span class="c_date">{{$comm->created_at->format('d-m-Y')}}</span> |
     @if(auth()->guard('cusFrontend')->check() && auth()->guard('cusFrontend')->user()->name == $comm->use->name)
     <span><a  class="comment-reply-link btn-link btnRep" data-id="{{$comm->id}}">Trả lời</a></span></p>
     @endif
     <p class="msg">{{$comm->comment}}</p>
     <!--comm replay -->
     @foreach($comm->replay as $itemComm)
     <div class="full" style="margin-top:25px;">
      <div class="row" id="repComm">
        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
          <div class="full"> <img class="img-responsive" style="max-width:100px" src="{{url('public/frontend')}}/images/layout_img/client2.png" alt="#"> </div>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
          <div class="full command_cont margin_bottom_0">
           <p class="comm_head">Demo<span style="padding: 0 10px;">{{$itemComm->created_at->format('d-m-Y')}}</span></p>
           <p>{{$itemComm->comment}}
           </p>
         </div>
       </div>
     </div>
   </div>
   @endforeach
   <!--end comm replay -->
   
</div>
@endforeach
@endif
<!--end comm  -->