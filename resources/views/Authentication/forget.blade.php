<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>POD | Print On Demand</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    @if (session('success') == 200)
                        <div class="alert alert-success" role="alert">
                            <strong> Yey! Everything worked! </strong> Please Check <b>Your G-Mail Accout </b> —So,that
                            to reset the Password!
                        </div>
                    @endif
                    @if (session('error') == 300)
                        <div class="alert alert-danger" role="alert">
                            <strong> Something is very wrong! </strong> Your Internet Connection <b>are not
                                working</b> —Please Check it!
                        </div>
                    @endif
                    @if (session('error') == 400)
                        <div class="alert alert-danger" role="alert">
                            <strong> Something is very wrong! </strong> Your Email <b>is not
                                matched</b> —with the records!
                        </div>
                    @endif
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary"> Reset Password</h5>
                                        <p>Reset Password with POD.</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="{{ asset('/assets/images/profile-img.png') }}" alt=""
                                        class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div>
                                <a href="{{ url('index-2.html') }}">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="{{ asset('/assets/images/logo.svg') }}" alt=""
                                                class="rounded-circle" height="34">
                                        </span>
                                    </div>
                                </a>
                            </div>

                            <div class="p-2">
                                <h5 class="text-primary">Forgot Password?</h5>
                                <p class="text-muted">Enter your email and instructions will be sent to you!</p>
                                <div class="p-2">
                                    <form action="{{ route('authentication.resetLink') }}" method="POST"
                                        class="needs-validation" novalidate>
                                        @csrf
                                        <div class="mb-4">
                                            <label for="iconInput" class="form-label">Email</label>
                                            <div class="form-icon">
                                                <input type="email" name="email"
                                                    class="form-control form-control-icon" required id="iconInput"
                                                    placeholder="example@gmail.com">
                                                <i class="ri-mail-unread-line"></i>
                                                @error('email')
                                                    <strong class="text-danger">{{ ucfirst($message) }}</strong>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="text-center mt-4">
                                            <button class="btn btn-primary w-100" type="submit" id="insert">Send
                                                Reset
                                                Link</button>
                                        </div>
                                    </form><!-- end form -->
                                </div>

                                <div class="mt-5 text-center">
                                    <p class="mb-0">Wait, I remember my password... <a
                                            href="{{ route('authentication.signin') }}"
                                            class="fw-semibold text-primary text-decoration-underline"> Click
                                            here </a> </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('/assets/libs/node-waves/waves.min.js') }}"></script>

    <!-- App js -->
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
