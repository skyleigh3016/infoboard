

@php
$stories = DB::table('stories')
->whereNull('deleted_at')

->get();



@endphp

@php
$sliders = DB::table('sliders')->get();


@endphp


<!DOCTYPE html>
<html lang="en">
        <meta charset="utf-8">
        <title>InfoBoard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ asset('images/logos/cmdilogo.jpg') }}" type="image/x-icon">

        <!-- Favicons -->

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  @include('layouts.body.header')
        <!--js link-->
        <script src="{{ URL::asset('js/navbar.js') }}"></script>
  <!-- Favicons -->
  <link href="image/logo.png" rel="icon">

  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/assets/vendor/venobox/venobox.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">

  <!--contact import folder-->
  <link href="{{asset('import/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('import/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('import/assets/vendor/aos/aos.css" rel="stylesheet')}}">
  <link href="{{asset('import/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('import/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('import/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">

  <!--first line-->
  <link href="{{asset('firstline/assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset ('firstline/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset ('firstline/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
 
  <!-- Template Main CSS File -->
  <link href="{{ asset('frontend/assets/css/style.css')}}" rel="stylesheet">
   
  <!-- Template Main CSS File contact-->
  <link href="{{asset('import/assets/css/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File vision, course-->
  <link href="{{asset('firstline/assets/css/style.css')}}" rel="stylesheet">


<script src="https://kit.fontawesome.com/3a4d1d45d1.js" crossorigin="anonymous"></script>
        
<!-- norman CSS File home -->
  <link href="{{ asset('frontend/assets/css/style1.css')}}" rel="stylesheet">
  <!--norman welcome-css links-->
<link href="{{ asset('frontend/assets/css/welcome.css')}}" rel="stylesheet">

<!--norman Bottom-Slider-css links-->
<link href="{{ asset('frontend/assets/css/jquery.flipster.min.css')}}" rel="stylesheet">

<script src="https://kit.fontawesome.com/3a4d1d45d1.js" crossorigin="anonymous"></script>
  
<!--testimonial photos-->
<style>
.responsive {
  width: 100%;
  height: auto;
}
</style>   

    </head>

    <body>

      
 <!-- Vendor JS Files -->
 <script src="{{ asset('frontend/assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('frontend/assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('frontend/assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('frontend/assets/vendor/jquery-sticky/jquery.sticky.js') }}"></script>
  <script src="{{ asset('frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('frontend/assets/vendor/venobox/venobox.min.js') }}"></script>
  <script src="{{ asset('frontend/assets/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('frontend/assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('frontend/assets/vendor/aos/aos.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
 

<!--welcome-css links-->
<link href="{{ URL::asset('/css/welcome.css') }}" rel="stylesheet">

<!--Bottom-Slider-css links-->
<link rel="stylesheet" href="{{ URL::asset('/css/jquery.flipster.min.css') }}">



<!-- ======= Hero Section/firstline ======= -->
<section id="hero" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
      <h1>One Family,<br>One Graduate</h1>
      <h2>Where true people empowerment begins but never ends.</h2>
     
    </div>
  </section><!-- End Hero -->


<!--slider/welcome css-->
<div class="contain" data-bs-interval="5000">

@foreach($sliders as $key => $slider)
<img class="mySlides" src="{{asset($slider -> image)}}" >
@endforeach

<button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1,0)">&#10094;</button>
<button class="w3-button w3-black w3-display-right" onclick="plusDivs(1,0)">&#10095;</button>

</div>

<script>
let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1} 
  slides[slideIndex-1].style.display = "flex";  

  setTimeout(showSlides, 25500); // Change image every 2 seconds
}
</script>


       

 <!-- ======= Why Us Section/firstline ======= -->
 <section id="why-us" class="why-us">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="content">
              <h3>Why Choose CMDI?</h3>
              <p><h5>
                CARD-MRI Development Institute, Inc. is the only college institution in the Bay, Laguna. Providing practitioner-led, quality education. The first school of microfinance and development in the Philippines. A recipient of Tertiary Education Subsidy from CHED. CMDI is a TESDA-Accredited Training and Asseement Center. Scholarships are offered for qualified students.
                </h5></p>
              
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-receipt"></i>
                    <h4>Vision</h4>
                    <p>Competent graduates taking active roles in creating positive social change in the Philippines and in the world.</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-cube-alt"></i>
                    <h4>Mission</h4>
                    <p>The School of Microfinance and Development aims to empower the students with the right knowledge, values, and skills
                        useful in development work using microfinance, micro-insurance, and other development tools or interventions.
                    </p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-images"></i>
                    <h4>Core Values</h4>
                    <p>CFISHES <br> Competence <br> Family Spirit <br> Integrity <br> Simplicity <br>Humility <br> Excellence <br> Stewardship</p> 
                  </div>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section>
    
<!-- End Why Us Section -->

<!-- ======= Video Section/import ======= -->
<section id="about" class="about">
<div class="container" data-aos="fade-up">
  <div class="row gx-0">

    <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
      <div class="content">
        <h3>Stay Connected with our CMDI Community!</h3>
        <h2>You can now interact with your friends, colleagues and teachers with our social media community exclusive to our institution.</h2>
        <p>
        Just register your account using your CMDI e-mail account. 
        </p>
        <p>
          You may click this: 
        </p>
        
        <div class="text-center text-lg-start">
          <a href="{{ route('register') }}" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
            <span>Register</span>
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>
      </div>
    </div>

    <div class="col-lg-6 " data-aos="zoom-out" data-aos-delay="200">
    <div class="home-video">
        <div class="vid-div">
        <div class="video">
            <video  src="{{ asset('video/MarketingVideoFinal.webm') }}" controls autoplay muted> </video>
            
        </div>
        </div>
    </div>
    </div>

  </div>
</div>
</section><!-- End About Section -->


<div class="top-stories-div">

<header class="section-header">
          <h2>Highlighting</h2>
          <p>Top Stories</p>
</header>

  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
  @foreach($stories as $key => $story)
    <div class="carousel-item active">
    <div class="phar-imag-div">
            <div class="pharagraph-div">
          
                <div><h2 style="color:black">{{ $story -> title }}</h2></div>
                <div> {!!$story->description!!}</div>
            </div>
    <div class="image-div">
                <img id="myImg" class="insidephoto" src="/images/{{ $story->image }}" style="width:100%;max-width:400px; ">
    </div><!--carousel-item active-->
          
        </div>
    </div>
            @endforeach


  <a class="carousel-control-prev" onclick="plusDivs(-1,1)"  href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" onclick="plusDivs(-1,1)" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

</div>

<script>
var slidesIndex = [1,1];
var slideId = ["mySlides", "phar-imag-div"]
showDivs(1, 0);
showDivs(1, 1);

function plusDivs(n, no) {
  showDivs(slidesIndex[no] += n, no);
}

function showDivs(n, no) {
  var i;
  var x = document.getElementsByClassName(slideId[no]);
  if (n > x.length) {slidesIndex[no] = 1}
  if (n < 1) {slidesIndex[no] = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";   
  }
  x[slidesIndex[no]-1].style.display = "flex"; 
}
</script>
</div>




    <!-- ======= Popular Courses Section ======= -->
    <section id="popular-courses" class="courses">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Courses</h2>
          <p>Baccalaureate Programs</p>
        </div>

        <div class="row" data-aos="zoom-in" data-aos-delay="100">

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="course-item">
              <img src="{{asset('firstline/assets/img/IS.jpg')}}" class="img-fluid" alt="...">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>BS INFORMATION SYSTEMS</h4>
                </div>

                <h3>Nurturing Computing Skills</h3>
                <p>It prepares students to succeed in a global environment as future information systems professionals by educating them strong analytical, technical, and leadership abilities.</p>
              </div>
            </div>
          </div> <!-- End Course Item-->

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <div class="course-item">
              <img src="{{asset('firstline/assets/img/entrep.jpg')}}" class="img-fluid" alt="...">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>BS ENTREPRENEURSHIP</h4>
                </div>

                <h3>Specializes in Microfinance</h3>
                <p>Designed to provide undergraduate students an in-depth understanding and appreciation of new venture operations in small business enterprises.</p>
              </div>
            </div>
          </div> <!-- End Course Item-->

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
            <div class="course-item">
              <img src="{{asset('firstline/assets/img/bsa.png')}}" class="img-fluid" alt="...">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>BS ACCOUNTANCY</h4>
                </div>

                <h3>Pursue Accounting Career</h3>
                <p>Strives to foster qualities that improve a student's professional and research competence, understanding the societal duties, and respect for an accountant's high level of honesty and objectivity.</p>
              </div>
            </div>
          </div> <!-- End Course Item-->
          <br>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="course-item">
              <img src="{{asset('firstline/assets/img/bsais.jpg')}}" class="img-fluid" alt="...">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>BS ACCOUNTING INFORMATION SYSTEM</h4>
                </div>

                <h3>Support Accounting with Technology</h3>
                <p>This career integrates business, accounting, and computer system knowledge, giving competence in selecting the finest software or creating and managing the overall information system.</p>
              </div>
            </div>
          </div> <!-- End Course Item-->

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="course-item">
              <img src="{{asset('firstline/assets/img/cmdimodel.jpg')}}" class="img-fluid" alt="...">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>BS TOURISM MANAGEMENT</h4>
                </div>

                <h3>Be Part of Tourism Industry</h3>
                <p>Trains passionate young individuals in travel and tourism, enabling them to meet and satisfy the expanding demand of tourism industry and to move forward in the business field.</p>
              </div>
            </div>
          </div> <!-- End Course Item-->
        </div>

      </div>
    </section><!-- End Popular Courses Section -->






    <!-- ======= Testimonials Section ======= -->
        
   <div class="hero">
   <header class="section-header">
          <h2>Testimonials</h2>
          <p>How CMDI Prepare Us</p>
        </header>

        <div class="carousel" >
            <ul>
                <li><img src="{{ asset('images/s1.jpg') }}" ></li>
                <li><img src="{{ asset('images/s2.jpg') }}"  ></li>
                <li><img src="{{ asset('images/s3.jpg') }}"  ></li>
                <li><img src="{{ asset('images/s4.jpg') }}" ></li>
                <li><img src="{{ asset('images/s5.jpg') }}" ></li>
                <li><img src="{{ asset('images/s6.jpg') }}" ></li>
                
            </ul>
        </div>
    </div>

  
<script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
<script src="{{ asset('frontend/assets/js/jquery.flipster.min.js') }}"></script>

 <script>
     $('.carousel').flipster({
         style: 'carousel',
         spacing: -0.3,

     });
 </script>



<!--End Testimonials Section -->



    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact-us">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Contact</h2>
          <p>Contact Us</p>
        </header>

        <div class="row gy-4">

          <div class="col-lg-6">

            <div class="row gy-4">
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-geo-alt"></i>
                  <h3>Address</h3>
                  <p>Purok 3, Brgy. Tranca<br>Bay, Laguna</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-telephone"></i>
                  <h3>Call Us</h3>
                  <p>+49 5730 031<br> <br></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-envelope"></i>
                  <h3>Email and Website</h3>
                  <p><a>cmdi.inc@cardmri.com</a><br><a href="https://cmdi.edu.ph/">CMDI Website</a></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-clock"></i>
                  <h3>Open Hours</h3>
                  <p>Monday - Friday<br>8:00AM - 05:00PM</p>
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-6">
            <form method="post" action="{{route('store.contact') }}" class="php-email-form">
            @csrf  
            <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Your Email: cmdi.edu.ph" required>
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <input type="submit" name="" class="btn btn-primary" value="Send Message"></input>
                </div>

              </div>
            </form>

          </div>

        </div>

      </div>

    </section><!-- End Contact Section -->


<!--welcome css-->
<footer  id="bottom-id" class="bottom-div">
<div class="bottom-line">

      <div class="mr-md-auto text-center text-md-left">
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
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>



  </div> 
</body>
<!--js link-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
<script src="{{ asset('frontend/assets/js/jquery.flipster.min.js') }}"></script>
  


</html>
