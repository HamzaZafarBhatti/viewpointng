@extends('user.userlayout')

@section('content')
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-6">
                    <h3><span style="background-color: #ffff99; color: #008000;"><strong>VIDEO VIRAL SHARE - VIEWPOINT</strong></span></h3>
                    <p><strong><span style="text-decoration: underline; color: #ff0000; background-color: #ffff99;">What is Expected Of You When Participating In the VIDEO VIRAL SHARE Task</span><br /></strong></p>
<ol>
<li>The VIDEO VIRAL SHARE Daily task is compulsory and as such, you are to Share the TASK on Facebook as instructed in the VIRAL SHARE POST.</li>
<li>Make sure your FACEBOOK PROFILE Link is updated on your<strong> VIEWPOINT Account Profile</strong> to ensure we check your profile before your VIRAL SHARE Payments are disbursed to you.</li>
<li><span style="text-decoration: underline;"><strong>VIRAL SHARE TASKS are very important.</strong></span></li>
</ol>
<p>&nbsp;</p>
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

                                <h4><strong>{!! substr(strip_tags($post->details), 0, 150) !!}... <a
                                        href="{{ url('/') }}/single/{{ $post->id }}/{{ $post->title_slug }}"
                                        class="text-muted">CLICK HERE TO GO TO THE VIRAL SHARE POST.</a></strong></h4>
                            </div>

                            <div
                                class="card-footer bg-transparent d-sm-flex justify-content-sm-between align-items-sm-center border-top-0 pt-0 pb-3">
                                <ul class="list-inline list-inline-dotted text-muted mb-3 mb-sm-0">
                                    <li class="list-inline-item">Video Viral Share Posted today: {{ date('M d, Y', strtotime($post->post_date)) }}</li>
                                </ul>
                                <a href="{{ url('/') }}/single/{{ $post->id }}/{{ $post->title_slug }}"
                                    class="text-muted">Views: {{ $post->views }}</a>
                            </div>
                        </div>
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
                            text: "✨CONGRATULATIONS ON YOUR LATEST CASHOUT. ✨ Upload Your Payment PROOF!",
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
