@extends('layouts.app')
@section('title', 'Print On Demand')
@section('main-content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        @php
                            date_default_timezone_set('Asia/Karachi');
                            $currentHour = date('G');
                            $greeting;
                        @endphp
                        @if ($currentHour >= 5 && $currentHour < 12)
                            @php
                                $greeting = 'Good Morning';
                            @endphp
                        @elseif ($currentHour >= 12 && $currentHour < 18)
                            @php
                                $greeting = 'Good Afternoon';
                            @endphp
                        @else
                            @php
                                $greeting = 'Good Evening';
                            @endphp
                        @endif
                        <h4 class="mb-sm-0 font-size-18">{{ $greeting . ',' }} {{ $user->first_name }}</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-xl-4">
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-3">
                                        <h5 class="text-primary">Welcome Back !</h5>
                                        <p>POD Dashboard</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="{{ asset('/assets/images/profile-img.png') }}" alt=""
                                        class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <img src="{{ asset('/assets/images/users/avatar-7.jpg') }}" alt=""
                                            class="img-thumbnail rounded-circle">
                                    </div>
                                    <h5 class="font-size-15 text-truncate">{{ $user->first_name }}</h5>
                                    <p class="text-muted mb-0 text-truncate">{{ $user->role == 1 ? 'Admin' : 'User' }}</p>
                                </div>

                                <div class="col-sm-8">
                                    <div class="pt-4">

                                        <div class="row">
                                            <div class="col-6">
                                                <h5 class="font-size-15">125</h5>
                                                <p class="text-muted mb-0">Projects</p>
                                            </div>
                                            <div class="col-6">
                                                <h5 class="font-size-15">$1245</h5>
                                                <p class="text-muted mb-0">Revenue</p>
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <a href="{{ url('##') }}"
                                                class="btn btn-primary waves-effect waves-light btn-sm">View
                                                Profile <i class="mdi mdi-arrow-right ms-1"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Monthly Earning</h4>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="text-muted">This month</p>
                                    <h3>$34,252</h3>
                                    <p class="text-muted"><span class="text-success me-2"> 12% <i
                                                class="mdi mdi-arrow-up"></i> </span> From previous period</p>

                                    <div class="mt-4">
                                        <a href="{{ url('##') }}"
                                            class="btn btn-primary waves-effect waves-light btn-sm">View More
                                            <i class="mdi mdi-arrow-right ms-1"></i></a>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mt-4 mt-sm-0">
                                        <div id="radialBar-chart" data-colors='["--bs-primary"]' class="apex-charts"></div>
                                    </div>
                                </div>
                            </div>
                            <p class="text-muted mb-0">We craft digital, graphic and dimensional thinking.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card mini-stats-wid" style="background-color:#2e4374">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-white fw-medium" style="
    color: white;
">Orders</p>
                                            <h4 class="mb-0 text-white">1,235</h4>
                                        </div>

                                        <div class="flex-shrink-0 align-self-center">
                                            <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                <span class="avatar-title">
                                                    <i class="bx bx-copy-alt font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mini-stats-wid" style="background-color:#2e4374">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-white fw-medium">Revenue</p>
                                            <h4 class="mb-0 text-white">$35, 723</h4>
                                        </div>

                                        <div class="flex-shrink-0 align-self-center ">
                                            <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="bx bx-archive-in font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mini-stats-wid" style="background-color:#2e4374">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-white fw-medium">Average Price</p>
                                            <h4 class="mb-0 text-white">$16.2</h4>
                                        </div>

                                        <div class="flex-shrink-0 align-self-center">
                                            <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="card">
                        <div class="card-body">
                            <div class="d-sm-flex flex-wrap">
                                <h4 class="card-title mb-4">Email Sent</h4>
                                <div class="ms-auto">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('#') }}">Week</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('#') }}">Month</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active" href="{{ url('#') }}">Year</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div id="stacked-column-chart" class="apex-charts"
                                data-colors='["--bs-primary", "--bs-warning", "--bs-success"]' dir="ltr">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <!-- end row -->
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection
@if (session('success') == 200)
    @section('script')
        <script>
            Swal.fire({
                toast: true,
                icon: "success",
                title: "Welcome back to Print On Demand Dashboard...!",
                animation: false,
                position: "top-right",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
        </script>
    @endsection
@endif
