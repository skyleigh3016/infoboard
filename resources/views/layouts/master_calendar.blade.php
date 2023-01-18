<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Event Calendar</title>
        <link rel="icon" href="{{ asset('images/logos/cmdilogo.jpg') }}" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        
<!-- norman CSS File home -->
<link href="{{ asset('frontend/assets/css/style1.css')}}" rel="stylesheet">
  <!--norman welcome-css links-->
<link href="{{ asset('frontend/assets/css/welcome.css')}}" rel="stylesheet">

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

<!-- Template Main CSS File -->
<link href="{{ asset('frontend/assets/css/style.css')}}" rel="stylesheet">
      

      <script src="https://kit.fontawesome.com/3a4d1d45d1.js" crossorigin="anonymous"></script>
      <!-- norman CSS File home -->
<link href="{{ asset('frontend/assets/css/style1.css')}}" rel="stylesheet">
<!--norman welcome-css links-->
<link href="{{ asset('frontend/assets/css/welcome.css')}}" rel="stylesheet">

<!--norman Bottom-Slider-css links-->
<link href="{{ asset('frontend/assets/css/jquery.flipster.min.css')}}" rel="stylesheet">

<script src="https://kit.fontawesome.com/3a4d1d45d1.js" crossorigin="anonymous"></script>
<style>

  
.modal-body{
  height:350px;
  overflow:hidden;
}

.modal-body:hover{overflow-y:auto}
 .popupheader{
  background-color:black;
  color:white;
 }
 .fade{
  opacity:1;
  -webkit-transaction:opacity 1s linear;
  transaction:opacity 1s linear;
 }
 h1 {
  text-align: center;
}
p {
  text-align: justify;
}

</style>
</head>
<body>




<!-- Modal -->
<div class="modal fade" id="bookingModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header popupheader">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">IS WEEK</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     <p>   Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis repudiandae odit iste iusto voluptatem! Officiis aspernatur incidunt commodi assumenda, quibusdam quod labore at aut veritatis quasi nemo cumque ex consequuntur.
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Autem, vel accusantium cupiditate est ipsam quod, consectetur debitis enim fuga odio eos possimus dicta sint nemo magni, facere maiores fugiat voluptate!
        </p> 
        <p> Start Date:</p>
        <p> End Date:</p>
      <p> Time:</p>
      <p> Venue:</p>
      <p> RSVP:</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>



  @include('layouts.body.header')
   
       
            <div class="col-12">
           
                <div class="col-md-11 offset-1 mt-5 mb-5">

                    <div style = "margin-top:160px; margin-bottom:160px; display:center;  padding-top: 5px; padding-right: 80px; padding-bottom: 5px; padding-left: 5px;" id="calendar">

                    </div>

                </div>
            </div>

<!--welcome css-->
<footer id="bottom-id" class="bottom-div">
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
    <script>

$(document).ready(function() {
  var booking = @json($events);

  $('#calendar').fullCalendar({


  events: booking,
  selectable: true,
  selecthelper: true,
  select: function(start, end, allDays) {
  
   
  },
  eventClick: function(event){
    
    $('#').modal('toggle');

  },

    })
});

 </script>

    </body>
</html>