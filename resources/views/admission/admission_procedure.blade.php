@include('layouts.includes.head')
@section('title')
    Admission procedures |
@endsection

<body>

    <div class="container">
        <div class="shadow-lg bg-white mb-5 rounded-5">

            <div class="mt-3 bg-grad-primary card-header d-flex justify-content-between p-0">
                <a class="btn text-white shadow-0" href="{{ url('/home') }}"><img class=""
                        src="{{ asset('images/logos/cmdilogo.jpg') }}" alt="" style="width: 50px;"></a>
                <h4 class="mt-2 ml-3 text-white mt-4">College Enrollment</h4>
                <a class="btn text-white m-3 shadow-0" href="{{ route('home') }}"><i class="fas fa-home"></i></a>
            </div>

            <div class="card-body px-3 px-lg-5 py-5">

                <h4>Admission Policy</h4>
                <hr>
                <p>
                    Students who completed Senior High School Grade 12, and high school graduates from 2016 below (but to undergo CMDI bridging program), and college level (transferees) are eligible for admission provided that they satisfy the admission policy and requirements of the school.
                </p>
            
                <h5><i>General Admission Guidelines</i></h5>
                1. Students who wish to study at CMDI shall be guided by the following admission requirement:
                <br>
                &emsp; a. Take an admission examination and pass the assessment qualification (including admission interview) for admission to the program.
                <br>
                &emsp; b. Submit complete document requirements to the Registrar's Office.
                <br>
                &emsp; c. Secure enrollment stub from the Registrar Office and submit to the Accounting Office for the assessment of school fees.
                <br>
                &emsp; d. Pay due school fees to the Cashier.
                <br>
                <br>
                2. Eligible students are required to accomplish the following requirements:
                
                <h6><i>&emsp; General Requirements for New Students:</i></h6>
        
                &emsp; 1. Admissions Form <br>
                &emsp; 2. Two (2) pcs. 2x2 colored ID pictures with white background (student) <br>
                &emsp; 3. One (1) pc. recent 2x2 ID photo - colored (each parent/spouse, if married) <br>
                &emsp; 4. Photocopy of Authenticated Birth Certificate of Student Applicant (PSA) <br>
                &emsp; 5. Original Copy of Report CARD (of most recently completed school year or quarter of the current school year) <br>
                &emsp; 6. Original Copy of Certificate of Good Moral

                <br>
                <br>
                <h6><i>&emsp; Requirements for Transferees:</i></h6>
                
                &emsp; 1. Admissions Form <br>
                &emsp; 2. Original Copy of Transcript of Records or Certified True Copy of Grades <br>
                &emsp; 3. Honorable Dismissal from last school attended/ Certificate of Good Moral Character <br>
                &emsp; 4. Photocopy of Philippine Statistics Authority (PSA)/ Municipal Civil E\Registrar-Certified Birth Certificate <br>
                &emsp; 5. Two (2) pcs. 2x2 colored ID pictures with white background <br>
            
                <br>
                3. Late Enrollment
                <p>
                    CMDI allows late enrollment of students only up to two weeks from the start of the classes and shall pay corresponding late enrollment fees.
                </p>

                4. Cancellation of Enrollment
                <br>
                &emsp; a.Should the student decide to cancel enrollment for whatever reason, it shall be the responsibility of the student to face possible consequences related to such decision, which includes financial obligation and curriculum requirements.
                <br>
                &emsp; b. APPLICATION FOR CANCELLATION OF ENROLLMENT must be accomplished and must secure clearance from the following offices:
                <li>Subject Instructors</li>
                <li>Adviser</li>
                <li>OSAS</li>
                <li>Guidance</li>
                <li>Canteen</li>
                <li>Library</li>
                <li>Computer Laboratory</li>
                <li>Finance and Accounting</li>
                <li>Registrar</li>
                <li>Program Head</li>
                <li>Dean</li>
                <br>
                &emsp; c. Any student who wishes to discontinue studies at the CMDI during the term must notify the Office of the Registrar in writing not later than the due date allowed for the term. The cancellation shall take effect only upon receipt of application for cancellation by Office of the Registrar.
                <br>
                &emsp; d. A student who wishes to return in the following term after cancellation of enrollment need not apply for reactivation.
                <br>
                <br>
                
                <br>
                <h4>Courses Offered at CMDI Bay</h4>
                <hr>
                <h5>Baccalaureate Programs</h5>
                <li>Bachelor of Science in Entrepreneurship with Specialization in Microfinance</li>
                <li>Bachelor of Science in Accountancy</li>
                <li>Bachelor of Science in Accounting Information System</li>
                <li>Bachelor of Science in Information System</li>
                <li>Bachelor of Science in Tourism Management</li>
                <br>
                <h5>Senior High School Programs</h5>
                <li>Accountancy, Business and Management (ABM)</li>
                <li>Information and Communications Technology (ICT)</li>
                <li>Home Economics (HE)</li>
                <br>



                @include('layouts.includes.scripts')

            </div>
        </div>
    </div>
</body>
