<!doctype html>
<html class="no-js" lang="en">

<head>
    <base href="{{ url('/') }}" />
    <title>{{ $title }} | {{ $set->site_name }}</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
    <meta name="robots" content="index, follow">
    <meta name="apple-mobile-web-app-title" content="{{ $set->site_name }}" />
    <meta name="application-name" content="{{ $set->site_name }}" />
    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta name="description" content="{{ $set->site_desc }}" />
    <link rel="shortcut icon" href="{{ url('/') }}/asset/{{ $logo->image_link2 }}" />
    <link rel="apple-touch-icon" href="{{ url('/') }}/asset/{{ $logo->image_link }}" />
    <link rel="apple-touch-icon" sizes="72x72" href="{{ url('/') }}/asset/{{ $logo->image_link }}" />
    <link rel="apple-touch-icon" sizes="114x114" href="{{ url('/') }}/asset/{{ $logo->image_link }}" />
    <link rel="stylesheet" href="{{ url('/') }}/asset/css/sweetalert.css" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,600,700&display=swap">
    <link rel="stylesheet" href="{{ url('/') }}/asset/dashboard/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="{{ url('/') }}/asset/dashboard/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
        <link rel="stylesheet" href="{{ url('/') }}/asset/dashboard/css/argon.css?v=1.1.0" type="text/css">
        <link rel="stylesheet" href="{{ url('/') }}/asset/frontend/css/sweetalert.css" type="text/css">
         @yield('css')
         <style>
          /* .header.headroom--not-top, */
          body {
              background-color: #125a00;
              /* color: darkblue; */
          }
          .btn-default, .btn-default:hover {
            color: #125a00;
            border-color: #125a00;
            background-color: #ffff00;
          }
          .btn-default:hover {
            background-color: #cbcb07;
          }
          </style>
    </head>
<!-- header begin-->
  <body class="">
    <!-- Navbar -->
    <nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
      <div class="container">
        <a href="https://viewpointng.com/"><img src="https://viewpointng.com/asset/images/viewpointng/viewpoint6-min.png" width="234" height="59" /></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
          <div class="navbar-collapse-header">
            <div class="row">
              <div class="col-6 collapse-brand">
               <a href="https://viewpointng.com"><img src="https://viewpointng.com/asset/images/viewpointng/VIEWPOINT1-min.png" width="237" height="61" /></a>
              </div>
              <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>
          <ul class="navbar-nav mr-auto">
               <li class="nav-item">
              <a href="https://viewpointng.com/contact" class="nav-link text-white">
                <span class="nav-link-inner--text">CONTACT</span>
              </a>
            </li>
             <li class="nav-item">
              <a href="https://viewpointng.com/coupon" class="nav-link text-white">
                <span class="nav-link-inner--text">CODE VENDORS</span>
              </a>
            </li>
             <li class="nav-item">
              <a href="https://viewpointng.com/verify/pin" class="nav-link text-white">
                <span class="nav-link-inner--text">VERIFY CODE</span>
              </a>
            </li>
             <li class="nav-item">
              <a href="https://viewpointng.com/topearners" class="nav-link text-white">
                <span class="nav-link-inner--text">TOP EARNERS</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="https://web.facebook.com/groups/5288834967817951" class="nav-link text-white">
                <span class="nav-link-inner--text">CASHOUTS</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('user.login') }}" class="nav-link text-white">
                <span class="nav-link-inner--text">LOGIN</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('user.onboarding', ['username' => 'viewpoint']) }}" class="nav-link text-white">
                <span class="nav-link-inner--text">REGISTER</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
<!-- header end -->

@yield('content')


<!-- footer begin -->
<footer class="py-5" id="footer-main">
    <div class="container">
      <div class="row align-items-center justify-content-xl-between">
        <div class="col-xl-6">
          <div class="copyright text-center text-xl-left text-muted">
          <a href="{{ url('/') }}" class="font-weight-bold ml-1"><span class="text-yellow">{{ $set->site_name }}</span></a>  &copy; {{ date('Y') }}. All Rights Reserved. 
          </div>
        </div>
        <div class="col-xl-6">
          <ul class="nav nav-footer justify-content-center justify-content-xl-end">
           {{-- @foreach ($pages as $vpages)
                @if (!empty($vpages))
            <li class="nav-item">
              <a class="nav-link" href="{{url('/')}}/page/{{$vpages->id}}">{{$vpages->title}}</a>
            </li>
                @endif
           @endforeach --}}
          </ul>
        </div>
      </div>
    </div>
  </footer>
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/{{ $set->tawk_id }}/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{ url('/') }}/asset/dashboard/vendor/jquery/dist/jquery.min.js"></script>
  <script src="{{ url('/') }}/asset/dashboard/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ url('/') }}/asset/dashboard/vendor/js-cookie/js.cookie.js"></script>
  <script src="{{ url('/') }}/asset/dashboard/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="{{ url('/') }}/asset/dashboard/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
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
        $(document).ready(function () {
            swal("Success!", "{{ session('success') }}", "success");
        });
    </script>
@endif

@if (session('alert'))
    <script>
      "use strict";
        $(document).ready(function () {
            swal("Sorry!", "{{ session('alert') }}", "error");
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
