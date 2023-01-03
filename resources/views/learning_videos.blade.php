<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <title>Learning</title>

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
        <!--owl carousel link-->
        <link href="{{ asset('assets/css/owl.carousel.min.css')}}" rel="stylesheet">
        <link href="{{ asset('assets/css/owl.theme.default.min.css')}}" rel="stylesheet">
        <!--Learning Slider Css-->
        <link href="{{ asset('frontend/assets/css/LearningSlider.css')}}" rel="stylesheet">
        

    </head>
    <body>

        @include('layouts.body.header')
       
         

           
            <div class="container">
              <div class="learningtitle"> <H1> Learnings</H1>
                </div>
                <div class="slider-body">
                  
                    <div id="slider" class="owl-carousel owl-theme owl-loaded owl-drag">
                        @foreach($learnings as $learning)
                        <div class="slider-item">
                            <div class="slider-img-body">
                                <video class="slider-img" controls oncanplay="myFunction()">
                                  <source src="{{asset($learning->video)}}" alt="Announcement image"  type="video/mp4">
                                </video>
                            </div>
                            <div class="slider-info">
                                <h1 class="slider-title">{{$learning->title}}</h1>
                                <p class="slider-description">{{$learning->description}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
     
        @include('layouts.body.footer')
        
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
