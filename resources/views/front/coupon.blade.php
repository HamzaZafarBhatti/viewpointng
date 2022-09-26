@extends('front.layout')
@section('css')

@stop
@section('content')
    <section data-settings="particles-1" class="main-section crumina-flying-balls particles-js bg-1 medium-padding120">
        <div class="container">
            <div class="row align-center">
                <div class="col-lg-8 col-lg-offset-2 col-md-12 col-sm-12 col-xs-12">
                    <header class="crumina-module crumina-heading heading--h2 heading--with-decoration">
                        <h2 class="heading-title heading--half-colored">PIN Code Dispatchers</h2>
                    </header>
                </div>
            </div>
        </div>
    </section>
    <section class="medium-padding120 responsive-align-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <header class="crumina-module crumina-heading heading--h2 heading--with-decoration">
                        <div class="heading-sup-title">{{ $set->site_name }}</div>
                    </header>
                    <p style="text-align: center;"><span style="color: #ffffff;">Get your <strong>GoldMint Activation PIN
                                Code</strong> from our <span style="text-decoration: underline;">Trusted and Verified
                                Dispatchers</span> nationwide below.</span></p>
                    <p style="text-align: center;"><span style="color: #ffffff;">You can CALL, SMS, WhatsApp Chat with any
                            one of them and they'll promptly respond to you you.</span></p>
                    <table>
                        <tr>
                            <thead>
                                <td>NAME</td>
                                <td>CALL/SMS</td>
                                <td>STATUS</td>
                                <td>WHATSAPP</td>
                            </thead>
                        <tr>
                            @foreach ($vendors as $object)
                                <td>{!! $object->name !!}</td>
                                <td>{!! $object->whatsapp !!}</td>
                                <td><strong><span style="background-color: #008000; color: #ffffff;">&nbsp;
                                            Active&nbsp;&nbsp; <br /></span></strong></td>

                                <td><a
                                        href="https://api.whatsapp.com/send?phone={!! $object->whatsapp !!}&text=Hello, I want to purchase {{ $set->site_name }} Activation PIN Code immediately. Hope You're online and available?"><img
                                            src="https://goldmintng.com/asset/images/580b57fcd9996e24bc43c543.png"
                                            alt="" width="22" height="22" /> Chat</a> </td>
                        </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </section>
@stop
