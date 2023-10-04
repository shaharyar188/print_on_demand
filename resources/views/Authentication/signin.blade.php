<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>POD | Print On Demand</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('/assets/images/favicon.ico') }}">
    <link href="{{ asset('/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    @if (session('error') == 300)
                        <div class="alert alert-danger" role="alert">
                            <strong> Something is very wrong! </strong> Your Credentails <b>are not
                                matched</b> —with the records!
                        </div>
                    @endif
                    @if (session('error') == 400)
                        <div class="alert alert-danger" role="alert">
                            <strong> Something is very wrong! </strong> Your <b>are not elidigible</b> —for
                            the login. Because You have no access form the Admin!
                        </div>
                    @endif
                    @if (session('error') == 500)
                        <div class="alert alert-danger" role="alert">
                            <strong> Something is very wrong! </strong> Your <b>are not
                                elidigible</b> Because Login is the first Priority!
                        </div>
                    @endif
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">Welcome Back !</h5>
                                        <p>Sign in to continue to POD.</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="{{ asset('/assets/images/profile-img.png') }}" alt=""
                                        class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="auth-logo">
                                <a href="{{ url('/') }}" class="auth-logo-light">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="{{ asset('/assets/images/logo-light.svg') }}" alt=""
                                                class="rounded-circle" height="34">
                                        </span>
                                    </div>
                                </a>

                                <a href="{{ url('/') }}" class="auth-logo-dark">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="{{ asset('/assets/images/logo.svg') }}" alt=""
                                                class="rounded-circle" height="34">
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div>
                                @php
                                    $email_cookie = '';
                                    $password_cookie = '';
                                @endphp
                                @if (Cookie::has('useremail') && Cookie::has('userpassword') && Cookie::has('remember'))
                                    @php
                                        $email_cookie = Cookie::get('useremail');
                                        $password_cookie = Cookie::get('userpassword');
                                        @$remember_cookie = Cookie::get('remember');
                                    @endphp
                                @endif
                                @if (@$remember_cookie == 'on')
                                    @php
                                        $checked = 'checked';
                                    @endphp
                                @else
                                    @php
                                        $checked = '';
                                    @endphp
                                @endif
                                <form action="{{ route('authentication.login') }}" method="POST"
                                    class="needs-validation" novalidate>
                                    @csrf
                                    <div class="mb-3">
                                        <label for="iconInput" class="form-label">Email</label>
                                        <div class="form-icon">
                                            <input type="email" name="email" value="{{ $email_cookie }}"
                                                class="form-control form-control-icon" required id="iconInput"
                                                placeholder="example@gmail.com">
                                            <i class="ri-mail-unread-line"></i>
                                        </div>
                                        @error('email')
                                            <strong class="text-danger">{{ ucfirst($message) }}</strong>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <div class="input-group auth-pass-inputgroup">
                                            <input type="password" class="form-control"
                                                placeholder="Enter password" name="password" value="{{ $password_cookie }}" aria-label="Password"
                                                aria-describedby="password-addon">
                                            <button class="btn btn-light" type="button" id="password-addon"><i
                                                    class="mdi mdi-eye-outline"></i></button>
                                        </div>
                                        @error('password')
                                            <strong class="text-danger">{{ ucfirst($message) }}</strong>
                                        @enderror
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" name="rememberme" {{ $checked }}
                                            type="checkbox" id="remember-check">
                                        <label class="form-check-label" for="remember-check">
                                            Remember me
                                        </label>
                                    </div>
                                    <div class="mt-3 d-grid">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit"
                                            id="insert">Log In</button>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <a href="{{ route('authenticaion.forget') }}" class="text-muted"><i
                                                class="mdi mdi-lock me-1"></i> Forgot your password?</a>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('/assets/js/app.js') }}"></script>
    <script>
        // --------------------------loading button coading-------------------
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        } else {
                            const button = document.getElementById("insert");
                            button.innerHTML =
                                "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Processing...";
                            button.setAttribute('disabled', 'disabled');
                            setTimeout(time, 1000);

                            // function time() {
                            //     button.removeAttribute('disabled');
                            //     button.innerHTML = "Add " + module_name;
                            // }
                        }
                        form.classList.add('was-validated')
                    }, false)
                })
        })()
        // --------------------------loading button coading-------------------
    </script>
</body>

</html>
