{{-- Left side list --}}
<div class="list-group list-group-light mb-4">
    <!-- <a href="{{ route('notice.view') }}" class="list-group-item list-group-item-action px-3 border-0">
        <i class="bi bi-megaphone-fill fa-lg text-primary me-3"></i> Official Announcement</a>

    <a href="{{ route('routines') }}" class="list-group-item list-group-item-action px-3 border-0">
        <i class="fas fa-calendar-alt fa-lg text-info me-3"></i> School Event</a> -->

    <a href="{{ route('videos') }}" class="list-group-item list-group-item-action px-3 border-0">
        <i class="fas bi-collection-play-fill fa-lg text-danger me-3"></i> Videos</a>

  
    <!-- <a href="{{ route('teacher_student_info') }}" class="list-group-item list-group-item-action px-3 border-0">
        <i class="fas fa-user-friends fa-lg text-warning me-3"></i> Student information</a> -->
</div>

<div class="card text-start">
    <div class="card-body">
        <h4 class="card-title text-center">Admission</h4>
        <hr>
        <img class="img-fluid rounded-4" src="{{ asset('images/asset_img/home.png') }}" alt="">
        <p class="card-text small text-muted mt-2">Start your journey at CARD-MRI Development Institute, Inc. (CMDI) and be one of the passionate and competitive students by completing some simple steps! </p>

        <a href="{{ route('admission.procedure') }}" class="btn btn-primary bg-gradient btn-block"><i
                class="fas fa-user-edit"></i> Admission Procedure</a>
    </div>
</div>
