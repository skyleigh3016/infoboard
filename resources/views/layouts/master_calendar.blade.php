<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Full Calendar js</title>
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
  <!-- <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Booking title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="text" class="form-control" id="title">
          <span id="titleError" class="text-danger"></span>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" id="saveBtn" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div> -->

  <!-- <div class="modal fade" id="bookingModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">IS WEEK</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fugit illo cupiditate eveniet similique quam. Pariatur est, harum sint consectetur facilis ullam quaerat nobis aspernatur molestias? Hic, amet facere? Cum, eos?
      
    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tenetur vel consequuntur quasi tempore facere blanditiis nulla assumenda, ratione quos mollitia distinctio perferendis repellat placeat pariatur doloribus dolores facilis error hic.</div>
    </p>   
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fugit illo cupiditate eveniet similique quam. Pariatur est, harum sint consectetur facilis ullam quaerat nobis aspernatur molestias? Hic, amet facere? Cum, eos?
      
      Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tenetur vel consequuntur quasi tempore facere blanditiis nulla assumenda, ratione quos mollitia distinctio perferendis repellat placeat pariatur doloribus dolores facilis error hic.</div>
      </p>  
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div> -->

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

                    <div style = "display:center;  padding-top: 5px; padding-right: 80px; padding-bottom: 5px; padding-left: 5px;" id="calendar">

                    </div>

                </div>
            </div>
            @include('layouts.body.footer')
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
    
    $('#bookingModal').modal('toggle');

  },

    })
});

 </script>

    </body>
</html>