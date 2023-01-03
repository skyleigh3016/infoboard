<nav class ="nav" id=nav>
            <input type="checkbox" id="check">
            <label for="check" class="checkbtn">
                <i class="fas fa-bars"></i>
            </label>


     

            <div class="cmdilogo-position"><a href="welcome"><img class="cmdilogo-size" src="/images/cmdilogo.jpg"  ></a> </div>
                <div class="haha">
                   
                        <label class="cmdilogo-text1">CMDI</label>
                        <br>
                        <label class="cmdilogo-text2">Infoboard</label>
                  
                </div>
            <ul>
                <li class="li" id="li"><a id="a2" class="{{ (request()->is('infoboard/home')) ? 'active' : '' }}"style="text-decoration: none" href="{{ route('infoboard/home') }}">home</a></li>
                <li class="li" id="li"><a id="a2" class="{{ (request()->is('announcement')) ? 'active' : '' }}" style="text-decoration: none" href="{{url('/announcement')}}">announcement</a></li>
                <li class="li" id="li"><a id="a2" class="{{ (request()->is('calendar/event')) ? 'active' : '' }}"style="text-decoration: none" href="{{url('/calendar/event')}}">Event-Calendar</a></li>
                <li class="li" id="li"><a id="a3" class="{{ (request()->is('learningvideo')) ? 'active' : '' }}"style="text-decoration: none" href="{{url('/learningvideo')}}">Learning</a></li>
                <li class="li" id="li"><a id="a2" class="{{ (request()->is('login')) ? 'active' : '' }}" style="text-decoration: none; color:orange"href="{{ route('welcome') }}">Login</a></li>
            </ul>   
       
        </nav>