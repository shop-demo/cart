
<!DOCTYPE html>
<html lang="en">
   
<!-- Mirrored from html.design/demo/furnish/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 07 Sep 2023 03:59:20 GMT -->
<head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Shopping Cart</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- site icons -->
      <link rel="icon" href="{{url('public/Frontend')}}/images/fevicon/fevicon.png" type="image/gif" />
      <!-- bootstrap css -->
      <link rel="stylesheet" href="{{url('public/Frontend')}}/css/bootstrap.min.css" />
      <!-- Site css -->
      <link rel="stylesheet" href="{{url('public/Frontend')}}/css/style.css" />
      <!-- responsive css -->
      <link rel="stylesheet" href="{{url('public/Frontend')}}/css/responsive.css" />
      <!-- colors css -->
      <link rel="stylesheet" href="{{url('public/Frontend')}}/css/colors1.css" />
      <!-- custom css -->
      <link rel="stylesheet" href="{{url('public/Frontend')}}/css/custom.css" />
      <!-- wow Animation css -->
      <link rel="stylesheet" href="{{url('public/Frontend')}}/css/animate.css" />
      <!-- revolution slider css -->
      <link rel="stylesheet" type="text/css" href="{{url('public/Frontend')}}/revolution/css/settings.css" />
      <link rel="stylesheet" type="text/css" href="{{url('public/Frontend')}}/revolution/css/layers.css" />
      <link rel="stylesheet" type="text/css" href="{{url('public/Frontend')}}/revolution/css/navigation.css" />
      <!--home -->
      <link rel="stylesheet" type="text/css" href="{{url('public/Frontend')}}/style/css/home.css" />

      <!--[if lt IE 9]>
     
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <!-- owlCarouse css -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.green.min.css" integrity="sha512-C8Movfk6DU/H5PzarG0+Dv9MA9IZzvmQpO/3cIlGIflmtY3vIud07myMu4M/NTPJl8jmZtt/4mC9bAioMZBBdA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
       <!--end owlCarouse css -->
       @yield('css')
   </head>
   <body id="default_theme" class="home_1">
     
     <!-- header -->
     @include('frontend.pages.block.header')
     <!-- end header -->

      @yield('main')
     
      <!-- footer -->
      <footer class="footer_style_2 footer_blog">
         <div class="container">
            <div class="row">
               <div class="col-md-4">
                  <div class="main-heading left_text">
                     <h2>Shopping Cart</h2>
                  </div>
                  <p>Sed ut perspiciatis unde omnis iste natus error sit volu ptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi.</p>
                  <ul class="social_icons">
                     <li class="social-icon fb"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                     <li class="social-icon tw"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                     <li class="social-icon gp"><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                  </ul>
               </div>
               <div class="col-md-8">
                  <div class="row">
                     <div class="col-md-4">
                        <div class="main-heading left_text">
                           <h2>Additional links</h2>
                        </div>
                        <ul class="footer-menu">
                           <li><a href="about.html"><i class="fa fa-angle-right"></i> About us</a></li>
                           <li><a href="term_condition.html"><i class="fa fa-angle-right"></i> Terms and conditions</a></li>
                           <li><a href="privacy_policy.html"><i class="fa fa-angle-right"></i> Privacy policy</a></li>
                           <li><a href="blog.html"><i class="fa fa-angle-right"></i> News</a></li>
                           <li><a href="contact.html"><i class="fa fa-angle-right"></i> Contact us</a></li>
                        </ul>
                     </div>
                     <div class="col-md-4">
                        <div class="main-heading left_text">
                           <h2>Services</h2>
                        </div>
                        <ul class="footer-menu">
                           <li><a href="#"><i class="fa fa-angle-right"></i> Lighting</a></li>
                           <li><a href="#"><i class="fa fa-angle-right"></i> Interior Design</a></li>
                           <li><a href="#"><i class="fa fa-angle-right"></i> Floor Planning</a></li>
                           <li><a href="#"><i class="fa fa-angle-right"></i> Decoration</a></li>
                           <li><a href="#"><i class="fa fa-angle-right"></i> Furniture</a></li>
                        </ul>
                     </div>
                     <div class="col-md-4">
                        <div class="main-heading left_text">
                           <h2>Contact us</h2>
                        </div>
                        <p>123 Second Street Fifth Avenue,<br>
                           Manhattan, New York<br>
                           <span style="font-size:18px;"><a href="tel:+9876543210">+987 654 3210</a></span>
                        </p>
                        <div class="footer_mail-section">
                           <form>
                              <fieldset>
                                 <div class="field">
                                    <input placeholder="Email" type="text">
                                    <button class="button_custom"><i class="fa fa-envelope" aria-hidden="true"></i></button>
                                 </div>
                              </fieldset>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="cprt">
                  <p>Furnish by <a href="https://html.design/">html.design.</a> All rights reserved.</p>
               </div>
            </div>
         </div>
      </footer>
      <!-- end footer -->
      <!-- js section -->
      <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="{{url('public/Frontend')}}/js/jquery.min.js"></script>
      <script src="{{url('public/Frontend')}}/js/bootstrap.min.js"></script>
      <!-- menu js -->
      <script src="{{url('public/Frontend')}}/js/menumaker.js"></script>
      <!-- wow animation -->
      <script src="{{url('public/Frontend')}}/js/wow.js"></script>
      <!-- custom js -->
      <script src="{{url('public/Frontend')}}/js/custom.js"></script>
      <!-- revolution js files -->
      <script src="{{url('public/Frontend')}}/revolution/js/jquery.themepunch.tools.min.js"></script>
      <script src="{{url('public/Frontend')}}/revolution/js/jquery.themepunch.revolution.min.js"></script>
      <script src="{{url('public/Frontend')}}/revolution/js/extensions/revolution.extension.actions.min.js"></script>
      <script src="{{url('public/Frontend')}}/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
      <script src="{{url('public/Frontend')}}/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
      <script src="{{url('public/Frontend')}}/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
      <script src="{{url('public/Frontend')}}/revolution/js/extensions/revolution.extension.migration.min.js"></script>
      <script src="{{url('public/Frontend')}}/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
      <script src="{{url('public/Frontend')}}/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
      <script src="{{url('public/Frontend')}}/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
      <script src="{{url('public/Frontend')}}/revolution/js/extensions/revolution.extension.video.min.js"></script>
      <!-- map js -->
      <script>
         // This example adds a marker to indicate the position of Bondi Beach in Sydney,
         // Australia.
         function initMap() {
           var map = new google.maps.Map(document.getElementById('map'), {
             zoom: 11,
             center: {lat: 40.645037, lng: -73.880224},
         styles: [
                  {
                    elementType: 'geometry',
                    stylers: [{color: '#fefefe'}]
                  },
                  {
                    elementType: 'labels.icon',
                    stylers: [{visibility: 'off'}]
                  },
                  {
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#616161'}]
                  },
                  {
                    elementType: 'labels.text.stroke',
                    stylers: [{color: '#f5f5f5'}]
                  },
                  {
                    featureType: 'administrative.land_parcel',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#bdbdbd'}]
                  },
                  {
                    featureType: 'poi',
                    elementType: 'geometry',
                    stylers: [{color: '#eeeeee'}]
                  },
                  {
                    featureType: 'poi',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#757575'}]
                  },
                  {
                    featureType: 'poi.park',
                    elementType: 'geometry',
                    stylers: [{color: '#e5e5e5'}]
                  },
                  {
                    featureType: 'poi.park',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#9e9e9e'}]
                  },
                  {
                    featureType: 'road',
                    elementType: 'geometry',
                    stylers: [{color: '#eee'}]
                  },
                  {
                    featureType: 'road.arterial',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#3d3523'}]
                  },
                  {
                    featureType: 'road.highway',
                    elementType: 'geometry',
                    stylers: [{color: '#eee'}]
                  },
                  {
                    featureType: 'road.highway',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#616161'}]
                  },
                  {
                    featureType: 'road.local',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#9e9e9e'}]
                  },
                  {
                    featureType: 'transit.line',
                    elementType: 'geometry',
                    stylers: [{color: '#e5e5e5'}]
                  },
                  {
                    featureType: 'transit.station',
                    elementType: 'geometry',
                    stylers: [{color: '#000'}]
                  },
                  {
                    featureType: 'water',
                    elementType: 'geometry',
                    stylers: [{color: '#c8d7d4'}]
                  },
                  {
                    featureType: 'water',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#b1a481'}]
                  }
                ]
         });
         
           var image = '{{url("public/Frontend")}}/images/layout_img/location_icon_map_cont.png';
           var beachMarker = new google.maps.Marker({
             position: {lat: 40.645037, lng: -73.880224},
             map: map,
             icon: image
           });
         }
      </script>
      <!-- google map js -->
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&amp;callback=initMap"></script>
      <!-- end google map js -->

      <!-- owlCarouse js -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     @yield('js')

   </body>

<!-- Mirrored from html.design/demo/furnish/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 07 Sep 2023 03:59:37 GMT -->
</html>