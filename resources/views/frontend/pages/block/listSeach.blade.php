
	@foreach($data_search as $key=>$text)
   <a href="{{route('product_Details',['page'=>$text->code,'slug'=>$text->code])}}" class="list-group-item list-group-item-action a-item"><img src="{{url('public/uploads')}}/Products/{{$text->avatar}}" class="s-img" alt="..." style="width: 10%;height:auto;">{{$text->name}}</a>
   @endforeach
