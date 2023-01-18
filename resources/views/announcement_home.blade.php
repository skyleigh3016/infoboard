<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <title>Announcement</title>
        <link rel="icon" href="{{ asset('images/logos/cmdilogo.jpg') }}" type="image/x-icon">

        <!-- Favicons -->
        <link href="image/logo.png" rel="icon">
        <link href="assets/img/favicon.png" rel="icon">
        <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
         <!-- Google Fonts -->
         <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="{{ asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="{{ asset('frontend/assets/css/style.css')}}" rel="stylesheet">
        <script src="https://kit.fontawesome.com/3a4d1d45d1.js" crossorigin="anonymous"></script>
        
<!-- norman CSS File home -->
<link href="{{ asset('frontend/assets/css/style1.css')}}" rel="stylesheet">
  <!--norman welcome-css links-->
<link href="{{ asset('frontend/assets/css/welcome.css')}}" rel="stylesheet">  
        <!--owl carousel link-->
        <link href="{{ asset('assets/css/owl.carousel.min.css')}}" rel="stylesheet">
        <link href="{{ asset('assets/css/owl.theme.default.min.css')}}" rel="stylesheet">
        <!--Announcement Slider Css-->
        <link href="{{ asset('frontend/assets/css/AnnouncementSlider.css')}}" rel="stylesheet">
        

    </head>
    <body>

        @include('layouts.body.header')
       
         

        
            <div class="container">
                <div class="slider-body">
                    <div class="slider-arrows">
                        <div id="arrow-l" class="arrow arrow-left"></div>
                        <div id="arrow-r" class="arrow arrow-right"></div>
                    </div>
                    <div id="slider" class="owl-carousel owl-theme owl-loaded owl-drag">
                        @foreach($announcements as $announcement)
                        <div class="slider-item">
                            <div class="slider-img-body">
                                <img  src="{{asset($announcement->image)}}" alt="Announcement image" class="slider-img">
                            </div>
                            <div class="slider-info" >
                                <h2 class="slider-title">{{$announcement->title}}</h2>
                                <p class="slider-description" style="font-size: 48px;  ">{!!$announcement->description!!}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
     

<!--welcome css-->
<footer style ="" id="bottom-id" class="bottom-div">
<div class="bottom-line">

      <div class="kakaiba">
        <div class="copyright" >
          
          &copy; Copyright <strong><span>Card-MRI Development Institute, Inc.</span></strong> All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/company-free-html-bootstrap-template/ -->
          Designed by <a href="https://bootstrapmade.com/">Laravel framework</a>
        </div>
      </div>
      <!-- <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div> -->
    </div>
  </footer><!-- End Footer -->

        <script src="{{ asset('assets/js/jquery-3.6.1.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
        <script>
            $('#slider').owlCarousel(
            {
                loop:true,
                dots:false,
                center:true,
                nav:true,
                responsive:
                {
                    0:
                    {
                        items:1,
                      
                    },
                    750:
                    {
                        items:3,
                       
                    },
                    1170:
                    {
                        items:3,
                        
                    },
                }
            });
        </script>               
    </body>

      
</html>
