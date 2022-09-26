@extends('front.layout')
@section('css')
    <style>
        .shareable-btn {
            background: #ffba01;
            padding: 5px 10px;
            border-radius: 50px;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        .share-title {
            display: flex;
            gap: 1em;
            justify-content: start;
            align-items: center;
        }

        .btn-container {
            display: flex;
            gap: 1em;
        }

        @media (max-width: 1199px) {
            .share-title {
                gap: 0;
                justify-content: center;
                flex-direction: column;
            }
        }

    </style>
@stop
@section('content')
    <section data-settings="particles-1" class="main-section crumina-flying-balls particles-js bg-1 medium-padding120">
        <div class="container">
            <div class="row align-center">
                <div class="col-lg-8 col-lg-offset-2 col-md-12 col-sm-12 col-xs-12">
                    <header class="crumina-module crumina-heading heading--h2 heading--with-decoration">
                        {{-- <div class="heading-sup-title">{{ $xcat->categories }}</div> --}}
                        <h2 class="heading-title heading--half-colored">{{ $post->title }}</h2>
                    </header>

                    <div class="post-details-wrap">
                        <div class="post__date">
                            <a href="#" class="number">{{ date('j', strtotime($post->post_date)) }}</a>
                            <time class="published" datetime="2018-03-14 12:00:00">
                                {{ date('M', strtotime($post->post_date)) }},
                                <span>{{ date('Y', strtotime($post->post_date)) }}</span>
                            </time>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="blog-single">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 left-blog-d">
                    <div class="post-wrapper">
                        <article class="post post-signle">
                            <div class="post-thumb">
                                <img src="{{ url('/') }}/asset/thumbnails/{{ $post->image }}" alt="">
                            </div>
                            <div class="blog-content">
                                <p class="post__text">{!! $post->details !!}</p>
                                <div class="single-blog-bottom-content">
                                    <div class="blog-share">
                                        <div class="share-title">
                                            @include('front.partial-single')
                                        </div>
                                        @include('partials.share')
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
                @include('partials.sidebar')
            </div>
            <!-- NAV -->
        </div>
    </section>
@stop

@section('script')
    <script>
        $(document).on('click', '.shareable-btn', function(e) {
            e.preventDefault();
            var platform = $(this).attr('data-platform')
            console.log('clicked')
            if (platform == 'fb') {
                $.ajax({
                    url: '{{ route('user.creditReferralAmount') }}',
                    method: 'post',
                    data: {
                        post_id: '{{ $post->id }}',
                        '_token': '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(resp) {
                        console.log(resp)
                        $('.share-title').empty().html(resp.html_text)
                        window.open(
                            "https://www.facebook.com/sharer.php?u={{ url('/') }}/single/{{ $post->id }}/{{ $post->title_slug }}",
                            '_blank' // <- This is what makes it open in a new window.
                        );

                    }
                })
            } else if (platform == 'wa') {
                window.open(
                    "https://wa.me/?text={{ url('/') }}/single/{{ $post->id }}/{{ $post->title_slug }}",
                    '_blank' // <- This is what makes it open in a new window.
                );
            }
        })
    </script>
@endsection
