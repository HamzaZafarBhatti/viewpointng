@extends('front.layout')
@section('css')
    <style>
        .text_end {
            text-align: end;
        }
        .image_container {
            height: 300px;
        }
        .image_cover {
            width: 100%;
            height: 100%;
            object-fit: cover;
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
    <h4><span style="color: #ffffff;"><em><strong>Proofs of Payments to our esteemed VIDEO EARNERS and MLM EARNERS on ViewPoint</strong></em></span></h4>
    <section class="medium-padding120 responsive-align-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <header class="crumina-module heading--h2 heading--with-decoration">
                        <div class="heading-sup-title">{{ $set->site_name }}</div>
                        <div class="text_end">
                            <a href="{{ route('upload.proof') }}" type="button"
                                class="btn btn--large btn--transparent btn--secondary">Upload proof</a>
                        </div>
                    </header>
                    @foreach ($proofs as $object)
                        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 mb30">
                            <div>
                                <h6>{{ $object->caption }}</h6>
                            </div>
                            <div class="crumina-module crumina-info-box info-box--style4">
                                <div class="image_container">
                                    <img src="{{ url('/') }}/asset/payment_proofs/{{ $object->image }}" alt="" class="image_cover" />
                                    {{-- <i class="fa fa-{{ $services->icon }} woox-icon text-yellow"></i> --}}
                                </div>
                                <div class="info-box-content" style="text-align: left; margin-top: 1rem;">
                                    <p class="info-box-text">Name: {{ $object->user->name }}</p>
                                    <p class="info-box-text">Username: {{ $object->user->username }}</p>
                                    <p class="info-box-text">Date Uploaded: {{ \Carbon\Carbon::parse($object->created_at)->format('Y-m-d') }}</p>
                                </div>
                            </div>
                        </div>
                        {{-- <tr>
                                <td>{{ $object->user->name }}</td>
                                <td>{{ $object->user->email }}</td>
                                <td>{{ $object->user->phone }}</td>
                                <td>{{ $object->caption }}</td>
                                <td><img src="{{ url('/') }}/asset/payment_proofs/{{ $object->image }}" alt=""
                                        width="22" height="22" /></td>
                            </tr> --}}
                    @endforeach

                </div>
                <div class="col-md-12">
                    {{$proofs->render()}}
                    {{-- {{ $proofs->links() }} --}}
                </div>
            </div>
        </div>
    </section>
@stop
