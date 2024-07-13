@php 
	$menu = config('menuAdmin');

@endphp
<nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
          @if(isset($title))
          <li class="breadcrumb-item">{{$title}}</li>
          @endif
          <li class="breadcrumb-item active">Data</li>
         
        </ol>
</nav>