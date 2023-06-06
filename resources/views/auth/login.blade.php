<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="none">
    <link rel="stylesheet" href="{{ asset('assets_v4/css/auth.css') }}">
    <title>Login</title>

{{--    <script>--}}
{{--        function statusChangeCallback(response) {  // Called with the results from FB.getLoginStatus().--}}
{{--            console.log('statusChangeCallback');--}}
{{--            console.log(response);                   // The current login status of the person.--}}
{{--            if (response.status === 'connected') {   // Logged into your webpage and Facebook.--}}
{{--                testAPI();--}}
{{--            } else {                                 // Not logged into your webpage or we are unable to tell.--}}
{{--                document.getElementById('status').innerHTML = 'Please log ' +--}}
{{--                    'into this webpage.';--}}
{{--            }--}}
{{--        }--}}


{{--        function checkLoginState() {               // Called when a person is finished with the Login Button.--}}
{{--            FB.getLoginStatus(function(response) {   // See the onlogin handler--}}
{{--                statusChangeCallback(response);--}}
{{--            });--}}
{{--        }--}}
{{--        window.fbAsyncInit = function() {--}}
{{--            FB.init({--}}
{{--                appId      : '1236038240554688',--}}
{{--                cookie     : true,--}}
{{--                xfbml      : true,--}}
{{--                version    : 'v16.0'--}}
{{--            });--}}

{{--            FB.AppEvents.logPageView();--}}

{{--        };--}}

{{--        (function(d, s, id){--}}
{{--            var js, fjs = d.getElementsByTagName(s)[0];--}}
{{--            if (d.getElementById(id)) {return;}--}}
{{--            js = d.createElement(s); js.id = id;--}}
{{--            js.src = "https://connect.facebook.net/en_US/sdk.js";--}}
{{--            fjs.parentNode.insertBefore(js, fjs);--}}
{{--        }(document, 'script', 'facebook-jssdk'));--}}

{{--        function testAPI() {                      // Testing Graph API after login.  See statusChangeCallback() for when this call is made.--}}
{{--            console.log('Welcome!  Fetching your information.... ');--}}
{{--            FB.api('/me', function(response) {--}}
{{--                console.log('Successful login for: ' + response.name);--}}
{{--                document.getElementById('status').innerHTML =--}}
{{--                    'Thanks for logging in, ' + response.name + '!';--}}
{{--            });--}}
{{--        }--}}
{{--    </script>--}}
</head>
<body>
<div class="container">
    <div id="log-in">
        <form class="login-form" method="post" action="{{ route('frontend.auth.postLogin') }}">
            {{ csrf_field()}}
            <div class="content">
                <div class="welcome-text">
                    <a href="/">
                        <img src="{{ asset('assets_v4/images/libshare-png-2.png') }}" class="logo">
                    </a>
                </div>
                <div class="field-container -username">
                    <input type="email"
                           name="email" placeholder="Email" value="{{ old('email') }}"/>
                </div>

                <div class="field-container -password">
                    <input type="password" name="password" placeholder="Password"/>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (Session::has('error'))
                    <div class="errors">
                        <i>{{Session::get('error')}}
                        </i>
                    </div>
                @endif

                <button class="log-in-button" type="submit">Sign in</button>

                <div class="register-container">
                    <a class="forgot-password"
                       rel="nofollow"
                       href="#">Forgot password</a>
                    <a class="register" href="#">Register</a>
                </div>

                <div class="social-login-separator"><span>OR</span></div>

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

{{--<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>--}}

</body>
</html>
