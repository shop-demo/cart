  @section('css')
  <style rel="stylesheet" type="text/css">
  /*
    @media (min-width: 768px) and (max-width: 991px)
    @media (max-width: 767px)
    font-size: 25px;
    line-height: 35px;
    margin-bottom: 20px
  */
    .slide{
      position: relative;
      width: 100%; min-height: 600px;
      background-image: url(https://cdn.create.vista.com/api/media/small/180245938/stock-photo-night-sky-and-super-moon-at-riverside-serenity-nature-background);
      background-repeat: no-repeat;
      background-size: cover;
      z-index: -1;
     
      }
     .slide:before{
        content: "";
        position: absolute;
        top: 0;
        left: auto; /*change here*/
        right: 0;/*change here*/
        width: 100%;
        height: 100%;
        background-color:rgba(0,0,0,0.5);
        z-index: 1;

       
      }
    
    .c-text{
      
      position: absolute;
      bottom: 0;
      padding-bottom: 7rem;
      z-index: 2;
    }
    
    .b-link{
      display: inline-block;
      color: #fff;
      border: 1px solid #fff;
      padding: 1rem;
      font-size: 1.5rem;
      background: none;

    }
    .c-title{
      font-weight: 400;
      font-size: 6rem;
      padding-bottom: 1.5rem;
      line-height: 1.2;
      color: #fff;
    }

    @media (min-width: 768px) and (max-width: 991px){
         
         .c-text{
          position: absolute;
          bottom: 0;
          padding-bottom:7rem;

         }

         .c-title{
          font-weight: 400;
          font-size: 4rem;
          line-height: 1.6;
          color: #fff;
        }

        
    }

     @media (max-width: 767px){

        .c-text{
          position: absolute;
          bottom: 0;
          padding-bottom:7rem;

         }

         .c-title{
          font-weight: 600;
          font-size: 2.5rem;
          line-height: 1.6;
          color: #fff;
        }

      
     
    
    }

  </style>

  @endsection
  <!-- section slider -->
<div class="section main_slider slide">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 c-text">
        <div class="text">
          <p class="fs-1 c-title">Phong cách tối giản</p>
        </div>
        <div class="link">
          <a href="" class="btn-primary b-link" >Xem thêm</a>
        </div>
      </div>
     
    </div><!-- end row -->
  </div>
</div>
<!-- end slider -->

@section('js')
      <script  type="text/javascript" charset="utf-8" async defer>
      
        $(document).ready(function(){

        });

         

      </script>
 @endsection