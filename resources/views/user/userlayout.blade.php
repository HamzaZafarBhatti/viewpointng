<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <base href="{{ url('/') }}" />
    <title>{{ $title }} | {{ $set->site_name }}</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
    <meta name="robots" content="index, follow">
    <meta name="apple-mobile-web-app-title" content="{{ $set->site_name }}" />
    <meta name="application-name" content="{{ $set->site_name }}" />
    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta name="description" content="{{ $set->site_desc }}" />
    <link rel="shortcut icon" href="{{ url('/') }}/asset/{{ $logo->image_link2 }}" />
    <link rel="apple-touch-icon" href="{{ url('/') }}/asset/{{ $logo->image_link2 }}" />
    <link rel="apple-touch-icon" sizes="72x72" href="{{ url('/') }}/asset/{{ $logo->image_link2 }}" />
    <link rel="apple-touch-icon" sizes="114x114" href="{{ url('/') }}/asset/{{ $logo->image_link2 }}" />
    <link rel="stylesheet" href="{{ url('/') }}/asset/css/sweetalert.css" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,600,700&display=swap">
    <link rel="stylesheet" href="{{ url('/') }}/asset/dashboard/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="{{ url('/') }}/asset/dashboard/vendor/@fortawesome/fontawesome-free/css/all.min.css"
        type="text/css">
    <link rel="stylesheet"
        href="{{ url('/') }}/asset/dashboard/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ url('/') }}/asset/dashboard/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ url('/') }}/asset/dashboard/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/asset/dashboard/css/argon.css?v=1.1.0" type="text/css">
    <link rel="stylesheet" href="{{ url('/') }}/asset/frontend/css/sweetalert.css" type="text/css">
    <style>
        .bg-dark {
            background-color: darkgreen !important;
        }
    </style>
    @yield('css')
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-245518865-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-245518865-2');
</script>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4399828676243819"
     crossorigin="anonymous"></script>
</head>
<!-- header begin-->

<body>
    <!-- Sidenav -->
    <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-dark bg-dark" id="sidenav-main">
        <div class="scrollbar-inner">
            <!-- Brand -->
            <div class="sidenav-header d-flex align-items-center">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ url('/') }}/asset/{{ $logo->image_link }}" class="navbar-brand-img" alt="...">
                </a>
                <div class="ml-auto">
                    <!-- Sidenav toggler -->
                    <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin"
                        data-target="#sidenav-main">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line bg-white"></i>
                            <i class="sidenav-toggler-line bg-white"></i>
                            <i class="sidenav-toggler-line bg-white"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <!-- Nav items -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.dashboard') }}">
                                <i class="ni ni-shop"></i>
                                <span class="nav-link-text">Dashboard</span>
                            </a>
                        </li>
                        @if ($user->account_type->id == 1)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.mining.page') }}">
                                <i class="ni ni-tv-2"></i>
                                <span class="nav-link-text">Watch Video</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.withdraw') }}">
                                <i class="ni ni-money-coins"></i>
                                <span class="nav-link-text">Video Earnings Withdrawal</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.withdraw_ref') }}">
                                <i class="ni ni-money-coins"></i>
                                <span class="nav-link-text">Ref Balance Withdrawal</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.latest_sponsored_post') }}">
                                <i class="ni ni-single-copy-04"></i>
                                <span class="nav-link-text">Viral Video Tasks</span>
                            </a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.digitalskillscourses') }}">
                                <i class="ni ni-single-copy-04"></i>
                                <span class="nav-link-text">Digital Skills & Courses</span>
                            </a>
                        </li>
                        @endif
                        @if ($user->account_type->id == 2)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.withdraw_mlm') }}">
                                <i class="ni ni-money-coins"></i>
                                <span class="nav-link-text">Bank Account Withdrawal</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.dashboard') }}">
                                <i class="ni ni-button-power"></i>
                                <span class="nav-link-text">Activate or Re-Activate</span>
                            </a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.referral') }}">
                                <i class="ni ni-satisfied"></i>
                                <span class="nav-link-text">My Referrals</span>
                            </a>
                        </li>
                    </ul>
                    <!-- Divider -->
                    <hr class="my-3">
                    <!-- Heading -->
                    <h6 class="navbar-heading p-0 text-muted">ENGAGE US</h6>
                    <!-- Navigation -->
                    <ul class="navbar-nav mb-md-3">
                        <li class="nav-item">
                            <a class="nav-link" href="https://facebook.com/viewpointngofficial/">
                                <i class="ni ni-curved-next"></i>
                                <span class="nav-link-text">Facebook</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://facebook.com/groups/viewpointng">
                                <i class="ni ni-curved-next"></i>
                                <span class="nav-link-text">Facebook Group</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.youtube.com/channel/UCmL1RHK-c26F0jtJcT1RxNQ	
">
                                <i class="ni ni-curved-next"></i>
                                <span class="nav-link-text">Youtube</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://t.me/viewpointng">
                                <i class="ni ni-curved-next"></i>
                                <span class="nav-link-text">Telegram Channel</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://api.whatsapp.com/send?phone=2348147944875">
                                <i class="ni ni-curved-next"></i>
                                <span class="nav-link-text">WhatsApp Chat</span>
                            </a>
                        </li>
                    </ul>
                    <!-- Divider -->
                    <hr class="my-3">
                    <!-- Heading -->
                    <h6 class="navbar-heading p-0 text-muted">ACCOUNT SETTINGS</h6>
                    <!-- Navigation -->
                    <ul class="navbar-nav mb-md-3">
                        <li class="nav-item">
                            <a class="nav-link" href="https://viewpointng.com/contact" target="_blank">
                                <i class="ni ni-support-16"></i>
                                <span class="nav-link-text">Support</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.profile_edit') }}">
                                <i class="ni ni-single-02"></i>
                                <span class="nav-link-text">My Account</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://viewpointng.com/user/pin">
                                <i class="ni ni-single-02"></i>
                                <span class="nav-link-text">Set PIN</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.password') }}">
                                <i class="ni ni-key-25"></i>
                                <span class="nav-link-text">Security</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://viewpointng.com/payment_proof" target="_blank">
                                <i class="ni ni-satisfied"></i>
                                <span class="nav-link-text">Payment Proof</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.logout') }}">
                                <i class="ni ni-button-power"></i>
                                <span class="nav-link-text">Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="main-content" id="panel">
         <!-- Search form -->
                    <div>
                        <div style="padding-left: 48px;"><h3 class="mb-0 text-dark">Account Type: {{ auth()->user()->account_type->name }}</h3></div>
                    </div>
        <!-- Topnav -->
        <nav class="navbar navbar-top navbar-expand navbar-light">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                   
                    <!-- Navbar links -->
                    <ul class="navbar-nav align-items-center ml-md-auto">
                        <li class="nav-item d-xl-none">
                            <!-- Sidenav toggler -->
                            <div class="pr-3 sidenav-toggler sidenav-toggler-light" data-action="sidenav-pin"
                                data-target="#sidenav-main">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="">
                        <h3 class="mb-0 text-dark">
                            {{ $user->account_type_id == 1 ? 'Video Earning' : 'Account' }} Balance: #{{ substr($user->balance, 0, 9) }}
                        </h3>
                        @if ($user->account_type_id == 2)
                            @if ($user->is_locked)
                            <small class="text-success font-weight-bolder">Unlocked</small>
                            @else
                            <small class="text-danger font-weight-bolder">Locked</small>
                            @endif
                        @endif
                    </div>
                    <ul class="navbar-nav align-items-center ml-auto ml-md-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="javascript:void;" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <div class="media align-items-center">
                                    <a href="{{ route('user.profile_edit') }}"><span
                                            class="avatar avatar-sm rounded-circle">
                                            <img alt="Image placeholder"
                                                src="{{ $user->image ? url('/') . '/asset/profile/' . $user->image : 'https://ui-avatars.com/api/?name=' . $user->username }}"></a>
                                    </span>
                                </div>

                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="header pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-7">
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links">
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header end -->

        @yield('content')


        <!-- footer begin -->
        <footer class="footer pt-0">

        </footer>
    </div>
    </div>
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/{{ $set->tawk_id }}/default';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="{{ url('/') }}/asset/dashboard/vendor/jquery/dist/jquery.min.js"></script>
    <script src="{{ url('/') }}/asset/dashboard/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('/') }}/asset/dashboard/vendor/js-cookie/js.cookie.js"></script>
    <script src="{{ url('/') }}/asset/dashboard/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="{{ url('/') }}/asset/dashboard/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <!-- Optional JS -->
    <script src="{{ url('/') }}/asset/dashboard/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ url('/') }}/asset/dashboard/vendor/chart.js/dist/Chart.extension.js"></script>
    <script src="{{ url('/') }}/asset/dashboard/vendor/jvectormap-next/jquery-jvectormap.min.js"></script>
    <script src="{{ url('/') }}/asset/dashboard/js/vendor/jvectormap/jquery-jvectormap-world-mill.js"></script>
    <script src="{{ url('/') }}/asset/dashboard/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ url('/') }}/asset/dashboard/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ url('/') }}/asset/dashboard/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ url('/') }}/asset/dashboard/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js">
    </script>
    <script src="{{ url('/') }}/asset/dashboard/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ url('/') }}/asset/dashboard/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="{{ url('/') }}/asset/dashboard/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{ url('/') }}/asset/dashboard/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
    <script src="{{ url('/') }}/asset/dashboard/vendor/clipboard/dist/clipboard.min.js"></script>
    <!-- Argon JS -->
    <script src="{{ url('/') }}/asset/dashboard/js/argon.js?v=1.1.0"></script>
    <!-- Demo JS - remove this in your project -->
    <script src="{{ url('/') }}/asset/dashboard/js/demo.min.js"></script>
    <script src="{{ url('/') }}/asset/frontend/js/sweetalert.js"></script>
</body>

</html>
@include('sweetalert::alert')
@yield('script')
@if (session('success'))
    <script>
        "use strict";
        $(document).ready(function() {
            swal("Success!", "{{ session('success') }}", "success");
        });
    </script>
@endif

@if (session('alert'))
    <script>
        "use strict";
        $(document).ready(function() {
            swal("Sorry!", "{{ session('alert') }}", "error");
        });
    </script>
@endif
@if (session('html_alert'))
    <script>
        "use strict";
        $(document).ready(function() {
            swal("Sorry!", "{!! session('html_alert') !!}", "error");
        });
    </script>
@endif
<script>
    @if (Session::has('message'))
        "use strict";
        var type = "{{ Session::get('alert-type', 'info') }}";
        switch (type) {
        case 'info':
        toastr.info("{{ Session::get('message') }}");
        break;
        case 'warning':
        toastr.warning("{{ Session::get('message') }}");
        break;
        case 'success':
        toastr.success("{{ Session::get('message') }}");
        break;
        case 'error':
        toastr.error("{{ Session::get('message') }}");
        break;
        } @endif
</script>
<script type="text/javascript">
    $(window).on('load', function() {
        // $('#modal-notification').modal('show');
    });
</script>
