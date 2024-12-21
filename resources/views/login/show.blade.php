<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}
    <title>Login & Register</title>
    <!-- PrimeIcons CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/primeicons@6.0.1/primeicons.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}" >
    <link rel="stylesheet" href="https://unpkg.com/primeicons/primeicons.css"/>

</head>
<body>
<div class="container">
    <div class="forms-container">
        <div class="signin-signup">
            <form method="POST" action="{{ route('login') }}" class="sign-in-form">
                @csrf
                <h2 class="title">Sign in</h2>
                <div class="input-field">
                    <i class="pi pi-user"></i>
                    <input type="text" name="email" placeholder="email" value="{{ old('email') }}"/>
                    @error('email')
                    <div class="text-danger">

                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="input-field">
                    <i class="pi pi-lock"></i>
                    <input type="password" name="password" placeholder="Password" />
                </div>
                <button type="submit" class="btn solid" >Login</button>
                {{--                    <p class="social-text">Or Sign in with social platforms</p>--}}
            </form>
            {{-- register --}}
            <form action="#" class="sign-up-form">
                <h2 class="title">Sign up</h2>
                <div class="input-field">
                    <i class="pi pi-user"></i>
                    <input type="text" placeholder="First name"/>
                </div>
                <div class="input-field">
                    <i class="pi pi-user"></i>
                    <input type="text" placeholder="Last Name"/>
                </div>
                <div class="input-field">
                    <i class="pi pi-phone"></i>
                    <input type="text" placeholder="Phone"/>
                </div>
                <div class="input-field">
                    <i class="pi pi-user"></i>
                    <input type="text" placeholder="User Name"/>
                </div>
                <div class="input-field">
                    <i class="pi pi-envelope"></i>
                    <input type="email" placeholder="Email"/>
                </div>
                <div class="input-field">
                    <i class="pi pi-lock"></i>
                    <input type="password" placeholder="Password"/>
                </div>
                <input type="submit" class="btn" value="Sign up"/>
                <p class="social-text">Or Sign up with social platforms</p>
            </form>

        </div>


    </div>
    <div class="panels-container">
        <div class="panel left-panel">
            <div class="content">
                <h3>Are you new here?</h3>
                <p>You can create your account by pressing Sign up.</p>
                <button class="btn transparent" id="sign-up-btn" onclick="toggleSignUpMode()">Sign up</button>
            </div>
            <img src="assets/demo/images/login/sing-in.svg" class="image" alt=""/>
        </div>
        <div class="panel right-panel">
            <div class="content">
                <h3>Are you one of us?</h3>
                <p>Go back to sign in and use your username and password to log in.</p>
                <button class="btn transparent" id="sign-in-btn" onclick="toggleSignUpMode()">Sign in</button>
            </div>
            <img src="assets/demo/images/login/sing-up.svg" class="image" alt=""/>
        </div>
    </div>
</div>
<script>
    // function toggleSignUpMode() {
    //     document.querySelector('.container').classList.toggle('sign-up-mode');
    // }
    const signUpBtn = document.getElementById('sign-up-btn');
    const signInBtn = document.getElementById('sign-in-btn');
    const container = document.querySelector('.container');

    signUpBtn.addEventListener('click', () => {
        container.classList.add('sign-up-mode');
    });

    signInBtn.addEventListener('click', () => {
        container.classList.remove('sign-up-mode');
    });
</script>
</body>
</html>
