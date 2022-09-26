@extends('front.layout')
@section('css')

@stop
@section('content')
    <section data-settings="particles-1" class="main-section crumina-flying-balls particles-js bg-1 medium-padding120">
        <div class="container">
            <div class="row align-center">
                <div class="col-lg-8 col-lg-offset-2 col-md-12 col-sm-12 col-xs-12">
                    <header class="crumina-module crumina-heading heading--h2 heading--with-decoration">
                        <h2 class="heading-title heading--half-colored">Contact us</h2>
                    </header>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="section-title text-center">

        </div>
        <h3><span style="color: #ffffff;"><strong>How To Contact GoldMint Support directly from your account using our
                    automated Ticketing system very fast.</strong></span></h3>
        <p><span style="color: #ffffff;">1. <strong><a style="color: #ffffff;" href="https://goldmintng.com/login">Login</a>
                </strong>to your GoldMint Account</span></p>
        <p><span style="color: #ffffff;">2. Click on <strong><a style="color: #ffffff;"
                        href="https://goldmintng.com/user/ticket">Support</a> </strong>by the 'side menu'</span></p>
        <p><span style="color: #ffffff;">3. Click on Create Request</span></p>
        <p><span style="color: #ffffff;">4. Type your Support Message subject, Message information, and SUBMIT
                MESSAGE</span></p>
        <p>&nbsp;</p>
        <h4><span style="color: #ffffff;">E-mail: Support@goldmintng.com</span><br /><span
                style="color: #ffffff;">PHONE/SMS: +2347087394692</span></h4>
        <h4><span style="color: #ffffff;"> <img src="https://goldmintng.com/asset/images/580b57fcd9996e24bc43c543.png"
                    width="31" height="31" />WhatsApp Support: +2347087394692</span></h4>
        <p>&nbsp;</p>
        <h4><span style="background-color: #ff9900; color: #000000;">You'll be instantly responded to swiftly.</span></h4>
        <section class="services address-contact">


            <div class="medium-padding120">

                <div class="col-lg-4">
                    <div class="services-box-wrapper text-center">
                        <h5 class="mb-5 fw-500">Our Location</h5>
                        <p>{{ $set->address }}</p>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="services-box-wrapper text-center">
                        <h5 class="mb-5 fw-500 color-2">Email & Phone</h5>
                        <p>
                            <a href="">{{ $set->email }}</a>
                            <br>
                            <a href="">{{ $set->mobile }}</a>
                        </p>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="services-box-wrapper text-center">
                        <h5 class="mb-5 fw-500">Get In Touch</h5>
                        <p>Also find us social media below</p>
                        <div class="widget w-contacts">
                            <ul class="socials socials--white">
                                @foreach ($social as $socials)
                                    @if (!empty($socials->value))
                                        <li class="social-item">
                                            <a href="{{ $socials->value }}">
                                                <i class="fab fa-{{ $socials->type }} woox-icon"></i>
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
    </div>
    </section>
@stop
