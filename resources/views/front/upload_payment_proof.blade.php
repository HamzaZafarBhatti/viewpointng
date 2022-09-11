@extends('layout')
@section('css')
    <style>
        .text_end {
            text-align: end;
        }

    </style>
@stop
@section('content')
    <section data-settings="particles-1" class="main-section crumina-flying-balls particles-js bg-1 medium-padding120">
        <div class="container">
            <div class="row align-center">
                <div class="col-lg-8 col-lg-offset-2 col-md-12 col-sm-12 col-xs-12">
                    <header class="crumina-module crumina-heading heading--h2 heading--with-decoration">
                        <h2 class="heading-title heading--half-colored">{{ $title }}</h2>
                    </header>
                </div>
            </div>
        </div>
    </section>
    <section class="medium-padding120 responsive-align-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="contact-froms">
                        <h3><span style="color: #ffffff;"><strong>Write A Very Good TESTIMONY CAPTION</strong></span></h3>
                        <form action="{{ route('do_upload_proof') }}" method="post" class="contact-form" enctype="multipart/form-data">
                            @csrf
                            @include('alert-front-end')
                            <div class="row">
                                <div class="col-md-12">
                                    <textarea name="caption" id="caption" cols="30" rows="10" class="form-control input--squared input--dark" required></textarea>
                                </div>Upload Payment Proof
                                <div class="col-md-12">
                                    <input type="file" name="image">
                                </div>
                            </div>

                            <button type="submit" class="btn btn--large btn--primary">Submit Payment Proof</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
