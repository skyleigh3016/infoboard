
<div class="navba">


<a href="{{ route('home') }}">
    <img src="{{ asset('images/logos/cmdilogo.jpg') }}" alt="MyCMDI"
        style="width: 35px; height:35px; box-shadow:0 0 10px #ccc; border-radius: 10px">
</a>



<a href="{{ url('/chatify') }}" >

Peoples
<!-- {{ config('app.name', 'MyCMDI') }} -->
</a>

<a href="{{ url('/group') }}">

Groups
<!-- {{ config('app.name', 'MyCMDI') }} -->
</a>

@guest
@if (Route::has('login'))
<a href="{{ route('login') }}">{{ __('Login') }}</a>
@endif
@if (Route::has('register'))
<a href="{{ route('register') }}">{{ __('Register') }}</a>
@endif

@else
<a  href="/group/create">Make group</a>
<a  href="/subscribe">Join group</a>
@if($users)
<a href="" style='padding: 11px 24px;'>
<i class='fas fa-bell' style='font-size:28px;color:red'></i>
</a>  
<div class="dropdown">
<input type='submit' id="{{ $user->id }}" onclick="myFunction()" value='{{$users}}' class="use dropbtn">
<div id="myDropdown" class="dropdown-content">
@foreach($message as $message)
<h4><a>{{ $message->message }}</a></h4>
@endforeach  
</div>
</div>
@else
<i class='fas fa-bell-slash' style='font-size:28px;color:blue;padding: 11px 24px;'></i>
@endif
<div class="dropdow">
<button class="dropbt">
{{ Auth::user()->name }} 
<i class="fa fa-caret-down"></i>
</button>

<div class="dropdown-content">
<a class="dropdown-item" href="{{ route('logout') }}"
onclick="event.preventDefault();document.getElementById('logout-form').submit();">
{{ __('Logout') }}
</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
@csrf
</form>
<div class="header">
@endguest
</div>   
</div>
</div> 
</div>

