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
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">Free Register</h5>
                                        <p>Get your free POD account now.</p>
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
                                <form id="form_submit" class="needs-validation" novalidate action="##">

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="firstname" class="form-label">First Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="first_name"
                                                    placeholder="Enter First Name" required>
                                                <strong class="text-danger" id="first_name">
                                                </strong>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="lastname" class="form-label">Last Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="last_name"
                                                    placeholder="Enter Last Name" required>
                                                <strong class="text-danger" id="last_name">
                                                </strong>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="useremail" class="form-label">Email <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" id="useremail"
                                            placeholder="Enter email" required>
                                        <strong class="text-danger" id="name">
                                        </strong>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <div class="input-group auth-pass-inputgroup">
                                            <input type="password" class="form-control" name="password" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon" required>
                                            <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-4 d-grid">
                                        <button class="btn btn-primary waves-effect waves-light"
                                            type="submit" id="insert">Register</button>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <div>
                                            <p>Already have an account ? <a href="{{ url('/') }}"
                                                    class="fw-medium text-primary"> Login</a> </p>
                                        </div>
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
    <script src="{{ asset('/assets/js/pages/validation.init.js') }}"></script>
    <script src="{{ asset('/assets/js/app.js') }}"></script>
    <script>
        (function() {
            'use strict'
            var forms = document.querySelectorAll('.needs-validation')
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault();
                            event.stopPropagation();
                        } else {
                            event.preventDefault();
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            var formData = new FormData(form_submit);
                            // --------------------------loading button coading-------------------
                            const button = document.getElementById("insert");
                            button.innerHTML =
                                "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Processing...";
                            button.setAttribute('disabled', 'disabled');
                            // --------------------------loading button coading-------------------
                            $.ajax({
                                url: "{{ url('/registeration') }}",
                                method: "POST",
                                contentType: false,
                                processData: false,
                                data: formData,
                                dataType: "json",
                                success: function(response) {
                                    if (response.message == 200) {
                                        $(".text-danger").text("");
                                        $('form').trigger("reset");
                                        button.removeAttribute('disabled');
                                        button.innerHTML =
                                            "Sign Up";
                                        setTimeout(time, 500);


                                    } else {
                                        button.removeAttribute('disabled');
                                        button.innerHTML =
                                            "Sign Up";
                                        alert('not registered')
                                    }
                                    $('form').trigger("reset");
                                    form.classList.remove('was-validated');
                                },
                                error: function(error) {
                                    button.removeAttribute('disabled');
                                    button.innerHTML =
                                        "Sign Up";
                                    var error = error.responseJSON;
                                    $.each(error.errors, function(index, value) {
                                        $('#' + index).html(value);
                                    });
                                }
                            });
                        }
                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
</body>

</html>
