  @section('css')
  <style rel="stylesheet" type="text/css">
  /*
    @media (min-width: 768px) and (max-width: 991px)
    @media (max-width: 767px)
    font-size: 25px;
    line-height: 35px;
    margin-bottom: 20px
  */
  

    /*-----------------------------------------------------------------
    ----------------------------------------------------------------
    */
    .item{
      width: 100%;
      height: 600px;
      background-repeat: no-repeat;
      background-size: cover;
      color: #fff;
      position: relative;
      z-index: -1;

    }
    .item:before{
      content: "";
      position: absolute;
      top: 0;
      left: auto; 
      right: 0;
      width: 100%;
      height: 100%;
      background-color:rgba(0,0,0,0.6);
      z-index: 1;

    }
    .c-text{
      position: absolute;
      z-index: 2;
      /*
      bottom: 0;
      left: 0;
      right: 0;
      padding-bottom: 7rem;
      */
      top: 50%;
      left:50%;
      transform: translate(-50%, -50%);

      

    }
    .text .t-title{
      font-size: 70px;
      color: #fff;
      letter-spacing: -0.5px;
      line-height: 1.2;
      font-weight: 800;
      margin: 0;

    }

    .text .t-description{

      font-size: 35px;
      color: #fff;
      letter-spacing: -0.5px;
      line-height: 1.5;
      font-weight: 500;
      padding-bottom: 20px;
      margin: 5px 0;
      
    }
    

    .a-btn{
      width: 152px;
      height: 56px;
      text-align: center;
      float: left;
      line-height: 56px;
      font-weight: 600;
      letter-spacing: 0.5px;
      background: transparent;
      border: solid #fff 2px;
      font-size: 18px;
      color: #fff;
      
    }
    .a-btn:hover{
      background: #d7bb3e;
      border:none ;
    }
    .owl-dots {
      font-size: 18px !important; /* Đặt kích thước của dots */
    }

    .owl-dot {
      background: #D6D6D6 !important; /* Màu nền của dots */
      width: 18px !important; /* Kích thước chiều rộng của dots */
      height: 18px !important; /* Kích thước chiều cao của dots */
      margin: 10px 5px !important; /* Khoảng cách giữa các dots */
      border-radius: 50% !important; /* Đường viền làm tròn dots */
    }
    /* Tùy chỉnh kiểu dáng của dots khi active */
    .owl-dot.active {
      background: #4DC7A0 !important;  /* Màu sắc của dots active */
      /* Tùy chỉnh các thuộc tính khác cho dots active theo nhu cầu của bạn */
    }
    .owl-dot:hover{
      background: #4DC7A0 !important;
    }

    @media (max-width: 767px){
      .text .t-title{
        font-size: 35px;
        color: #fff;
        letter-spacing: -0.5px;
        line-height: 1.2;
        font-weight: 800;
        
      }

      .text .t-description{
        font-size: 20px;
        color: #fff;
        letter-spacing: -0.5px;
        line-height: 1;
        font-weight: 400;
        padding-bottom: 15px;
        
      }
    }

    @media (min-width: 768px) and (max-width: 991px){
      .text .t-title{
        font-size: 45px;
        color: #fff;
        letter-spacing: -0.5px;
        line-height: 1.2;
        font-weight: 800;
        
      }

      .text .t-description{
        font-size: 25px;
        color: #fff;
        letter-spacing: -0.5px;
        line-height: 1;
        font-weight: 400;
        padding-bottom: 20px;
        
      }


    }

  </style>

  @endsection
  <!-- section slider -->
 
<div class="section main_slider slide">
  <div class="owl-carousel owl-theme">
    @if($slides->count()>0)
     @foreach($slides as $key=>$slide)
        <div class="item" 
                      style="width: 100%;
                      height: 600px;
                      background-image: url('public/uploads/slides/{{$slide->image}}');
                      background-repeat: no-repeat;
                      background-size: cover;">
          <div class="container c-text">
                <div class="text">
                  <p class="t-title">{{$slide->link}}</p>
                  <p class="t-description">{{$slide->description}}</p>
                  <a href="" class="a-btn btn-primary" >Xem thêm</a>
                </div>
            
          </div>
        </div>
        @endforeach
    @endif   
   
   </div> 
   

</div>
<!-- end slider -->

@section('js')
      <script  type="text/javascript" charset="utf-8" async defer>
      
        $(document).ready(function(){
          $('.owl-carousel').owlCarousel({
                loop:true,
                margin:10,
                nav:false,
                dotsSpeed: 500,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:1
                    },
                    1000:{
                        items:1
                    }
                }
            })

        });

         

      </script>
 @endsection