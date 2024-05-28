
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{url('public/Admin')}}/img/favicon.png" rel="icon">
  <link href="{{url('public/Admin')}}/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{url('public/Admin')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{url('public/Admin')}}/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{url('public/Admin')}}/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{url('public/Admin')}}/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="{{url('public/Admin')}}/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="{{url('public/Admin')}}/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="{{url('public/Admin')}}/vendor/simple-datatables/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />

  <!-- Template Main CSS File -->
  <link href="{{url('public/Admin')}}/css/style.css" rel="stylesheet">
  <!-- ckeditor -->
  <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
  <script src="{{asset('public/ckeditor/ckeditor.js')}}"></script>

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Jul 27 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="" class="logo d-flex align-items-center">
        <img src="{{url('public/Admin')}}/img/logo.png" alt="">
        <span class="d-none d-lg-block">Quản lý hệ thống</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <!--  Profile  -->
        @if(auth()->guard('customers')->user())
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{url('public/Admin')}}/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">{{auth()->guard('customers')->user()->name}}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li>
              <a class="dropdown-item d-flex align-items-center" href="">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->
        @endif

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @php  
    $menu = config('menuAdmin');
    $user = auth()->guard('customers')->user();
    
  @endphp
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      @if(auth()->guard('customers')->check())
      @foreach($menu as $key=>$value)
      @if($user->can($value['route']))
      
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav_{{$key}}" data-bs-toggle="collapse" href="">
          <i class="bi bi-menu-button-wide"></i><span>{{$value['name']}}</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        @foreach($value['items'] as $k=>$item)
        @if($user->can($item['route']))
        <ul id="components-nav_{{$key}}" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route($item['route'])}}">
              <i class="bi bi-circle"></i><span>{{$item['name']}}</span>
            </a>
          </li>
        </ul>
        @endif
        
        @endforeach
      </li><!-- End Components Nav -->
      @endif
      @endforeach
      @endif

      <li class="nav-heading">Pages</li>
      

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-register.html">
          <i class="bi bi-card-list"></i>
          <span>Register</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Login</span>
        </a>
      </li><!-- End Login Page Nav -->
      @if(auth()->guard('customers')->user())

       <li class="nav-heading">
          <span>{{auth()->guard('customers')->user()->name}}</span>
       </li><!-- End LogOut -->

       <li class="nav-item">
       <form action="" method="POST" accept-charset="utf-8" id="formLogout">
        @csrf
         <a class="nav-link collapsed btn btn-link btnLogout" href="{{route('dashboardLogout')}}">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Logout</span>
        </a>
       </form>
      </li><!-- End LogOut -->
      @endif
      
    </ul>

  </aside><!-- End Sidebar-->
  @yield('content')

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      <h1>footer</h1>

    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{url('public/Admin')}}/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="{{url('public/Admin')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{url('public/Admin')}}/vendor/chart.js/chart.umd.js"></script>
  <script src="{{url('public/Admin')}}/vendor/echarts/echarts.min.js"></script>
  <script src="{{url('public/Admin')}}/vendor/quill/quill.min.js"></script>
  <script src="{{url('public/Admin')}}/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="{{url('public/Admin')}}/vendor/tinymce/tinymce.min.js"></script>
  <script src="{{url('public/Admin')}}/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="{{url('public/Admin')}}/js/main.js"></script>
  @yield('js')
  
  <script  type="text/javascript" charset="utf-8" async defer>
    
    /*LOGOUT*/
     $(document).ready(function(){
      
          $('.btnLogout').on('click',function(e){
           e.preventDefault();
           
           var _href = $(this).attr('href');
           
           var sub = $('#formLogout').attr('action',_href);

           if(confirm('Bạn có chắc thoát trang này không')==false){
           
            alert('Bạn chưa thoát trang này');
           
           }else{
              $('form#formLogout').submit();
           
           }

           
          });//button
          

        });//document

  </script>

</body>

</html>