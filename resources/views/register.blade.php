<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login & Register</title>
    <!-- PrimeIcons CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/primeicons@6.0.1/primeicons.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css', true) }}" >
</head>
<body>
    <div class="container sign-up-mode">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="" method="POST" class="sign-in-form">
                    @csrf
                    <h2 class="title">Sign in</h2>
                    <div class="input-field">
                        <i class="pi pi-user"></i>
                        <input type="text" name="username" placeholder="Username" />
                    </div>
                    <div class="input-field">
                        <i class="pi pi-lock"></i>
                        <input type="password" name="password" placeholder="Password" />
                    </div>
                    <input type="submit" value="Login" class="btn solid" />
                    <p class="social-text">Or Sign in with social platforms</p>
                </form>
                <form action="{{ route('register') }}" method="POST" class="sign-up-form" >
                    @csrf
                    <h2 class="title">Sign up</h2>
                    <div class="input-field">
                        <i class="pi pi-user"></i>
                        <input type="text" placeholder="First name" name="first_name"/>
                    </div>
                    <div class="input-field">
                        <i class="pi pi-user"></i>
                        <input type="text" placeholder="Last Name" name="last_name"/>
                    </div>
                    <div class="input-field">
                        <i class="pi pi-phone"></i>
                        <input type="text" placeholder="Phone" name="phone"/>
                    </div>
                    <div class="input-field">
                        <i class="pi pi-user"></i>
                        <input type="text" placeholder="User Name" name="name"/>
                    </div>
                    <div class="input-field">
                        <i class="pi pi-envelope"></i>
                        <input type="email" placeholder="Email" name="email"/>
                    </div>
                    <div class="input-field">
                        <i class="pi pi-lock"></i>
                        <input type="password" placeholder="Password"  name="password"/>
                    </div>
                    <input type="submit" class="btn" value="Sign up" />
                    <p class="social-text">Or Sign up with social platforms</p>
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Are you new here ?</h3>
                    <p style="font-size: 1.2rem;">
                        you can create your account by pressing Sing-up
                    </p>
                    <button class="btn transparent" id="sign-up-btn">
                        Sign up
                    </button>
                </div>
                <img src="assets/demo/images/login/sing-in.svg" class="image" alt="" />
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>Are you one of us ?</h3>
                    <p>
                        go back whit sing-in and use your user-name and password for login
                    </p>
                    <button type="button" class="btn transparent" id="sign-in-btn" onclick="window.location.href='{{route('login.show')}}'">
                        Sign in
                    </button>
                </div>
                <img src="assets/demo/images/login/sing-up.svg" class="image" alt="" />
            </div>
        </div>
    </div>

    <script>
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