<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{{ url('/') }}" />
    <title>{{ $title }} | {{ $set->site_name }}</title>
    <meta charset="utf-8" />
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
    <link rel="stylesheet" href="{{ url('/') }}/asset/global_assets/css/icons/fontawesome/styles.min.css" />
    <link rel="stylesheet" href="{{ url('/') }}/asset/css/plugins.css">
    <link rel="stylesheet" href="{{ url('/') }}/asset/frontend/css/theme-styles.css">
    <link rel="stylesheet" href="{{ url('/') }}/asset/frontend/css/blocks.css">
    <link rel="stylesheet" href="{{ url('/') }}/asset/frontend/css/widgets.css">
    <link rel="stylesheet" href="{{ url('/') }}/asset/frontend/css/font-awesome.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,600,700&display=swap">
    <link rel="stylesheet" href="{{ url('/') }}/asset/frontend/css/sweetalert.css" type="text/css">
    <style>
        .header.headroom--not-top,
        body {
            background-color: #125a00;
            /* color: darkblue; */
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
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-11008936663"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-11008936663');
</script>
<!-- Event snippet for VIEWPOINT-Sign-up conversion page -->
<script>
  gtag('event', 'conversion', {'send_to': 'AW-11008936663/G0gOCKji74IYENeVvIEp'});
</script>

</head>
<!-- header begin-->

<body class="crumina-grid">

    <!-- Preloader -->

    <div id="hellopreloader">
        <div class="preloader">
            <p><img src="https://viewpointng.com/asset/frontend/img/Pulse-0.7s-254px.gif" /></p>

            <div class="text">ViewPoint - Get Entertained Watching Videos | Stay Motivated Getting Paid...</div>
        </div>
    </div>
    <header class="header" id="site-header">
        <div class="container">
            <div class="header-content-wrapper">
                <a href="{{ route('home') }}" class="site-logoo">
                    <img src="https://viewpointng.com/asset/images/viewpointng/viewpoint6-min.png" width="285" height="72" />
                </a>

                <nav id="primary-menu" class="primary-menu">

                    <!-- menu-icon-wrapper -->
                    <a href='javascript:void(0)' id="menu-icon-trigger" class="menu-icon-trigger showhide">
                        <span id="menu-icon-wrapper" class="menu-icon-wrapper">
                            <svg width="1000px" height="1000px">
                                <path id="pathD"
                                    d="M 300 400 L 700 400 C 900 400 900 750 600 850 A 400 400 0 0 1 200 200 L 800 800">
                                </path>
                                <path id="pathE" d="M 300 500 L 700 500"></path>
                                <path id="pathF"
                                    d="M 700 600 L 300 600 C 100 600 100 200 400 150 A 400 380 0 1 1 200 800 L 800 200">
                                </path>
                            </svg>
                        </span>
                    </a>
                    <ul class="primary-menu-menu">
                        <li class="menu-item-has-children">
                            <a href="https://viewpointng.com">Home</a>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="javascript:void;">MENU</a>
                            <ul class="sub-menu">
                                <li><a href="{{ route('about') }}">About us</a></li>
                                <li><a href="{{ route('blog') }}">BLOG</a></li>
                                <li><a href="{{ route('payment_proof') }}">Payment Proof</a></li>
                                <li><a href="https://play.google.com/store/apps/details?id=com.viewpointngltd.app">Download VIEWPOINT App</a></li>
                            </ul>
                        </li>
                       {{-- <li>
                            <a href="{{ route('about') }}">About us</a>
                        </li> --}}
                        {{-- <li>
                            <a href="https://goldmintng.com/page/9">How It Works</a>
                        </li> --}}
                        <li class="menu-item-has-children">
                            <a href="{{ route('code_dispatcher') }}">CODE VENDORS</a>
                        </li>
                        <li>
                            <a href="{{ route('verify_pin') }}">VERIFY CODE</a>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="javascript:void;">HELP</a>
                            <ul class="sub-menu">
                                <li><a href="{{ route('faq') }}">FAQs</a></li>
                                {{-- <li class="menu-item-has-children">
                                    <a href="javascript:void;">Blog</a>
                                    <ul class="sub-menu">
                                        @foreach ($cat as $vcat)
                                            <li>
                                                <a href="{{ url('/') }}/cat/{{ $vcat->id }}/1">
                                                    {{ $vcat->categories }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li> --}}
                                <li><a href="{{ route('terms') }}">Terms & Conditions</a></li>
                                <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                                {{-- <li><a href="https://goldmintng.com/page/7">Cookies Policy</a></li> --}}
                                {{-- <li><a href="https://goldmintng.com/page/8">Disclaimer Policy</a></li> --}}
                                <li><a href="{{ route('contact') }}">Contact us</a></li>
                                <li><a href="https://viewpointng.com/payment_proof">Payment PROOFS</a></li>
                                <li><a href="https://web.facebook.com/groups/viewpointng">Facebook Group</a></li>
                                {{-- <li><a href="{{ route('coupon') }}">PIN Code Dispatchers</a></li> --}}
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('topearners') }}">Top Earners</a>
                        </li>
                        @guest
                            <li>
                                <a href="{{ route('user.login') }}">Login</a>
                            </li>
                            <li>
                                <a href="{{ route('user.onboarding', ['username' => 'viewpoint']) }}">Register</a>
                            </li>
                        @endguest
                        @auth
                            <li>
                                <a href="{{ route('user.dashboard') }}">Dashboard</a>
                            </li>

                        @endauth
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <div class="main-content-wrapper">
        <!-- header end -->

        @yield('content')


        <!-- footer begin -->
    </div>
    <footer id="site-footer" class="footer ">

        {{-- <canvas id="can"></canvas> --}}
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-sm-offset-0 col-xs-12">
                    <div class="widget w-info">
                        <a href="javascript:void" class="site-logoo">
                            <img src="{{ url('/') }}/asset/{{ $logo->image_link }}" alt="Woox">
                        </a>
                        <p>{{ $set->site_desc }}</p>
                    </div>

                    <div class="widget w-contacts">
                        <ul class="socials socials--white">
                            <li class="social-item">
                                        <a href="https://facebook.com/viewpointngofficial/">
                                            <i class="fab fa-facebook woox-icon"></i>
                                        </a>
                                    </li>
                                     <li class="social-item">
                                        <a href="https://www.youtube.com/channel/UCmL1RHK-c26F0jtJcT1RxNQ">
                                            <i class="fab fa-youtube woox-icon"></i>
                                        </a>
                                    </li>
                                     <li class="social-item">
                                        <a href="https://facebook.com/groups/viewpointng/">
                                            <i class="fab fa-facebook woox-icon"></i>
                                        </a>
                                    </li>
                                     <li class="social-item">
                                        <a href="https://t.me/viewpointng">
                                            <i class="fab fa-telegram woox-icon"></i>
                                        </a>
                                    </li>
                                     <li class="social-item">
                                        <a href="https://t.me/viewpointchat">
                                            <i class="fab fa-telegram woox-icon"></i>
                                        </a>
                                    </li>
                                     <li class="social-item">
                                        <a href="https://chat.whatsapp.com/LN16rlwOn00HQDk3FoAto4">
                                            <i class="fab fa-whatsapp woox-icon"></i>
                                        </a>
                                    </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>

        <div class="sub-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-sm-offset-0 col-xs-12">

                        <span>© All rights reserved {{ date('Y') }}.</span>
                        <span>{{ $set->site_name }} - {{ $set->title }}.</span>
                    </div>

                </div>
            </div>
        </div>

        <a class="back-to-top" href="#">
            <svg class="woox-icon icon-top-arrow">
                <use xlink:href="{{ url('/') }}/asset/frontend/svg-icons/sprites/icons.svg#icon-top-arrow"></use>
            </svg>
        </a>
    </footer>
    <!-- end footer -->


    <!-- Dependency Scripts -->
    <script src="{{ url('/') }}/asset/frontend/js/method-assign.js"></script>
    <script src="{{ url('/') }}/asset/frontend/js/jquery-3.3.1.js"></script>
    <script src="{{ url('/') }}/asset/frontend/js/sweetalert.js"></script>
    <script src="{{ url('/') }}/asset/frontend/js/js-plugins/leaflet.js"></script>
    <script src="{{ url('/') }}/asset/frontend/js/js-plugins/MarkerClusterGroup.js"></script>
    <script src="{{ url('/') }}/asset/frontend/js/js-plugins/crum-mega-menu.js"></script>
    <script src="{{ url('/') }}/asset/frontend/js/js-plugins/waypoints.js"></script>
    <script src="{{ url('/') }}/asset/frontend/js/js-plugins/jquery-circle-progress.js"></script>
    <script src="{{ url('/') }}/asset/frontend/js/js-plugins/segment.js"></script>
    <script src="{{ url('/') }}/asset/frontend/js/js-plugins/bootstrap.js"></script>
    <script src="{{ url('/') }}/asset/frontend/js/js-plugins/imagesLoaded.js"></script>
    <script src="{{ url('/') }}/asset/frontend/js/js-plugins/jquery.matchHeight.js"></script>
    <script src="{{ url('/') }}/asset/frontend/js/js-plugins/jquery-countTo.js"></script>
    <script src="{{ url('/') }}/asset/frontend/js/js-plugins/Headroom.js"></script>
    <script src="{{ url('/') }}/asset/frontend/js/js-plugins/jquery.magnific-popup.js"></script>
    <script src="{{ url('/') }}/asset/frontend/js/js-plugins/popper.min.js"></script>
    <script src="{{ url('/') }}/asset/frontend/js/js-plugins/particles.js"></script>
    <script src="{{ url('/') }}/asset/frontend/js/js-plugins/perfect-scrollbar.js"></script>
    <script src="{{ url('/') }}/asset/frontend/js/js-plugins/jquery.datetimepicker.full.js"></script>
    <script src="{{ url('/') }}/asset/frontend/js/js-plugins/svgxuse.js"></script>
    <script src="{{ url('/') }}/asset/frontend/js/js-plugins/select2.js"></script>
    <script src="{{ url('/') }}/asset/frontend/js/js-plugins/smooth-scroll.js"></script>
    <script src="{{ url('/') }}/asset/frontend/js/js-plugins/sharer.js"></script>
    <script src="{{ url('/') }}/asset/frontend/js/js-plugins/isotope.pkgd.min.js"></script>
    <script src="{{ url('/') }}/asset/frontend/js/js-plugins/ajax-pagination.js"></script>
    <script src="{{ url('/') }}/asset/frontend/js/js-plugins/swiper.min.js"></script>
    <script src="{{ url('/') }}/asset/frontend/js/js-plugins/material.min.js"></script>
    <script src="{{ url('/') }}/asset/frontend/js/js-plugins/orbitlist.js"></script>
    <script src="{{ url('/') }}/asset/frontend/js/js-plugins/highstock.js"></script>
    <script src="{{ url('/') }}/asset/frontend/js/js-plugins/bootstrap-datepicker.js"></script>
    <script src="{{ url('/') }}/asset/frontend/js/js-plugins/TimeCircles.js"></script>
    <script src="{{ url('/') }}/asset/frontend/js/js-plugins/ion.rangeSlider.js"></script>
    <!-- FontAwesome 5.x.x JS -->
    <script defer src="{{ url('/') }}/asset/frontend/fonts/fontawesome-all.js"></script>
    <script src="{{ url('/') }}/asset/frontend/js/main.js"></script>

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
    <script>
        console.log("{{ session('pin_success') }}")
        console.log("{{ session('success') }}")
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
            }
        @endif
    </script>


</body>

</html>
