@extends('Admin.masterLayout')


@section('content')
<main id="main" class="main">


    <section class="section dashboard">
      <div class="row">
        <iframe src="{{url('public')}}/manager/dialog.php?field_id=avatar" style="width:100%;height:600px; overflow-y: auto; "></iframe>
      </div>
    </section>

  </main><!-- End #main -->
  @endsection