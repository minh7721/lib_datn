<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="none">
    <link rel="stylesheet" href="{{ asset('assets_v4/css/auth.css') }}">

    <title>Register</title>

</head>
<body>
<div class="container">
    <div id="log-in">
        <form class="login-form" action="{{ route('frontend.auth.postLogin') }}" method="post">
            {{ csrf_field() }}

            <div class="content">
                <div class="welcome-text">
                    <a href="/">
                        <img src="{{ asset('assets_v4/images/libshare-png-2.png') }}" class="logo">
                    </a>
                </div>
                <div class="field-container -name">
                    <input type="text" name="name" id="name" placeholder="Name"/>
                </div>
                <div class="field-container -username">
                    <input type="email" name="email" id="email" placeholder="Email"/>
                </div>
                <div class="field-container -password">
                    <input type="password" name="password" placeholder="Password"/>
                </div>
                <div class="field-container -password">
                    <input type="password" name="password_confirmation" placeholder="Password confirm"/>
                </div>

                @if ($errors->has('email'))
                    <div class="errors">
                        <i>{{ $errors->first('email') }}</i>
                    </div>
                @endif
                @if ($errors->has('password'))
                    <div class="errors">
                        <i>{{ $errors->first('password') }}</i>
                    </div>
                @endif

                @if ($errors->has('repassword'))
                    <div class="errors">
                        <i>{{ $errors->first('repassword') }}</i>
                    </div>
                @endif
                <button class="log-in-button" type="submit">Register</button>
                <div class="register-container">
                    <a class="forgot-password"
                       rel="nofollow"
                       href="#">Retype password</a>
                    <a class="register" rel="nofollow" href="{{ route('frontend.auth.getLogin') }}">Login</a>
                </div>
                <div class="social-login-separator"><span>or</span></div>

                <div class="social-login-buttons">
                    <a class="facebook-login ripple-effect"
                       rel="nofollow"
                       href="{{ route('frontend.login.facebook') }}">
                        <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2"
                             fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                        </svg>
                        <p>Log in using Facebook</p>
                    </a>
                    {{--                    <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">--}}
                    {{--                    </fb:login-button>--}}

                    <div id="status">
                    </div>

                    <!-- Load the JS SDK asynchronously -->
                    <a class="google-login ripple-effect"
                       rel="nofollow"
                       href="{{ route('frontend.login.google') }}">
                        <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2"
                             fill="none"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>
                        <p>Log in using Google</p>
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Client IP {{\Request::ip()}} -->
</body>
</html>
