@include('layouts.includes.head')


<body class="bg-light">

    <main class="">

        <div class="container bg-light col-lg-9">

            <div class="d-md-flex justify-content-between">

                <div class="d-flex align-items-center py-2">
                    <div class="shadow rounded-8">
                        <img class="" src="{{ asset('images/logos/cmdilogo.jpg') }}" alt="MyCMDI" style="width: 80px">
                    </div>
                    <div class="ms-4">
                        <h1 class="text-primary mt-3 fw-bold mb-0">MyCMDI</h1>
                        <p>A social media platform for every CMDIans.</p>
                    </div>
                </div>

                <div class="d-flex align-items-center justify-content-end mb-3">
                    <a class="btn btn-secondary" href="{{ route('infoboard/home') }}"><i
                            class="fas fa-user-edit"></i> InfoBoard Home</a>
                    @auth
                        <a class="btn btn-primary ms-2" href="{{ route('home') }}"><i class="fas fa-home"></i>
                            Home</a>
                    @else
                        <a class="btn btn-primary ms-2" href="{{ route('register') }}"><i class="fas fa-user-plus"></i>
                            Register</a>
                    @endauth
                </div>
            </div>


            <div class="row">
                <div class="col-md-6 p-5">
                    <!-- <img class="img-fluid mb-3" src="{{ asset('images/asset_img/welcome_art.png') }}" alt=""> -->
                    <img class="img-fluid mb-3" src="{{ asset('images/asset_img/cmdi.jpg') }}" alt="">

                    <div class="d-flex justify-content-center mt-5">
                        <a href="#" class="mx-2 shadow">
                            <img src="{{ asset('images/asset_img/app-store-badge-google-play.png') }}" alt=""
                                style="height: 50px">
                        </a>
                        <a href="#" class="mx-2 shadow">
                            <img src="{{ asset('images/asset_img/Download-On-The-App-Store-PNG-Image.png') }}"
                                alt="" style="height: 50px">
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card px-4 py-3 rounded-8 shadow-lg">
                        <div class="card-header">
                            <h2>Login</h2>
                            <p>Welcome to CARD-MRI Development Institute Inc.</p>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="mb-4">
                                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                                    <input type="email" class="form-control py-2 @error('email') is-invalid @enderror"
                                        id="email" name="email" aria-describedby="emailHelp">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="password"
class="form-control py-2  @error('password') is-invalid @enderror"
 id="password" name="password">
 <button type="button" id="show-passwd">
						<img src="{{ asset('showhidepassword/eye_open.svg') }}"  />
					</button>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-4 form-check">
                                    <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                                    <label class="form-check-label" for="exampleCheck1">Remember me</label>
                                </div>

                                <div class="d-flex justify-content-between pt-3">

                                    <button type="button" class="btn btn-link px-0 forgetPassBtn"
                                        onclick="location.href='{{ route('password.request') }}'" @auth disabled
                                        @endauth>Forgot your password?</button>

                                    <button type="submit" class="btn btn-primary " @auth disabled @endauth>
                                        <div class="d-flex">Login <i class="fas fa-sign-in-alt mt-1 ms-1"></i></div>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </main>


    <footer class="py-3 mt-5">
        <div class="container">
            <div class="d-flex justify-content-center">
                <img src="{{ asset('images/logos/cardleasingfinanace.jpg') }}" alt="" style="height: 45px">
                <img class="ms-4" src="{{ asset('images/logos/card_ink.png') }}" alt="" style="height: 45px">
                <img class="ms-4" src="{{ asset('images/logos/SME-logo.png') }}" alt=""
                    style="height: 45px">
                <img class="ms-4" src="{{ asset('images/logos/cmit.png') }}" alt=""
                    style="height: 45px">
            </div>
            <div class="d-md-flex justify-content-center small mt-3">
                <div class="text-muted">&copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>. Developed and supported by <a href="https://github.com/skyleigh3016/infoboard"
                        target="blank">TEAM LARAVEL</a>
                </div>
                <div class="ms-1">
                    &middot;
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="#">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>


    @include('layouts.includes.scripts')
</body>

</html>
