@extends('user.userlayout')

@section('content')
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-6">
                    <h3><span style="background-color: #ffcc00;"><strong>GOLDMINT SPONSORED TASKS FOR TODAY IS
                                BELOW</strong></span></h3>
                    <p>&nbsp;</p>
                    <!-- Basic layout-->
                    @if ($post)
                        <div class="card blog-horizontal">
                            <div class="card-header">
                                <h2 class="card-title font-weight-semibold">
                                    <a href="{{ url('/') }}/single/{{ $post->id }}/{{ $post->title_slug }}"
                                        class="text-default">{{ $post->title }}</a>
                                </h2>
                            </div>

                            <div class="card-body">
                                <div class="card-img-actions mr-3">
                                    <img class="card-img img-fluid"
                                        src="{{ url('/') }}/asset/thumbnails/{{ $post->image }}" alt="">
                                    <div class="card-img-actions-overlay card-img">
                                        <a href="{{ url('/') }}/single/{{ $post->id }}/{{ $post->title_slug }}"
                                            class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round">
                                            <i class="icon-link"></i>
                                        </a>
                                    </div>
                                </div>

                                <p>{!! substr(strip_tags($post->details), 0, 150) !!}... <a
                                        href="{{ url('/') }}/single/{{ $post->id }}/{{ $post->title_slug }}"
                                        class="text-muted">Read more.</a></p>
                            </div>

                            <div
                                class="card-footer bg-transparent d-sm-flex justify-content-sm-between align-items-sm-center border-top-0 pt-0 pb-3">
                                <ul class="list-inline list-inline-dotted text-muted mb-3 mb-sm-0">
                                    <li class="list-inline-item">{{ date('M d, Y', strtotime($post->post_date)) }}</li>
                                </ul>
                                <a href="{{ url('/') }}/single/{{ $post->id }}/{{ $post->title_slug }}"
                                    class="text-muted">Views: {{ $post->views }}</a>
                            </div>
                        </div>
                        <p><strong><span style="background-color: #ffff99;">THINGS TO KNOW ABOUT GOLDMINTNG SPONSORED TASKS
                                    automatically converted to GOLDMINT Mobile Data (Monthly)</span></strong></p>
                        <ol>
                            <li>You will earn points based on your <span style="text-decoration: underline;">GOLDMINT Mining
                                    Hashrate Pla</span>n which would be automatically converted to <strong>GOLDMINT Mobile
                                    Data</strong> for you.</li>
                            <li>The <strong>GOLDMINT Mobile Data</strong> is a result of the SPONSORED Tasks you get to
                                involve yourself by sharing <span
                                    style="text-decoration: underline; color: #ff0000;"><strong>GOLDMINT Sponsored
                                        Posts</strong> </span>to your Facebook Profile, WhatsApp Status, and WhatsApp Group.
                            </li>
                            <li>Make sure your FACEBOOK PROFILE Link is updated on your<strong> GOLDMINT Profile</strong> to
                                ensure we check your profile before your Mobile Data would be disbursed to you.</li>
                            <li>GOLDMINT Mobile Data would disburse your Mobile Data every Month to the Mobile Number you
                                set on your account.</li>
                            <li><span style="text-decoration: underline;"><strong>SPONSORED TASKS are very
                                        important.</strong></span></li>
                        </ol>
                        <p>&nbsp;</p>
                    @endif
                    <!-- /basic layout -->
                </div>
            </div>
        </div>
    @stop

    @section('script')
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            $(document).ready(function() {
                if ("{{ $user_proof }}" == 1) {
                    swal({
                            title: null,
                            text: "Congrats on your most RECENT PAYMENT on GOLDMINT",
                            icon: "success",
                            buttons: ["Close", "Upload Payment Proof Now!"],
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                window.location.href = "{{ route('upload.proof') }}"
                            }
                        });
                }
            })
        </script>
    @endsection
