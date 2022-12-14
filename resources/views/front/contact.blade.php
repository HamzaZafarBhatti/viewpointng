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
        <h3><span style="color: #ffffff;"><strong>Contact ViewPoint Support directly very fast using any of our contact channels.</strong></span></h3>
 
        <p>&nbsp;</p>
        <h4><span style="text-decoration: underline; color: #000000; background-color: #ffff99;"><strong>BELOW ARE VIEWPOINT SOCIAL MEDIA HANDLES</strong></span></h4>
<p><strong><span style="color: #ffffff;">FACEBOOK:</span> <a href="https://facebook.com/viewpointngofficial/"><span style="color: #0000ff;">https://facebook.com/viewpointngofficial/</span></a> </strong></p>
<p><strong><span style="color: #ffffff;">FACEBOOK GROUP:</span> <a href="https://facebook.com/groups/viewpointng/"><span style="color: #0000ff;">https://facebook.com/groups/viewpointng/</span></a> </strong></p>
<p><strong><span style="color: #ffffff;">YOUTUBE CHANNEL:</span> <a href="https://www.youtube.com/channel/UCmL1RHK-c26F0jtJcT1RxNQ"><span style="color: #0000ff;">https://www.youtube.com/channel/UCmL1RHK-c26F0jtJcT1RxNQ</span></a> </strong></p>
<p><strong><span style="color: #ffffff;">TELEGRAM:</span> <a href="https://t.me/viewpointng"><span style="color: #0000ff;">https://t.me/viewpointng</span></a></strong></p>
<p><strong><span style="color: #ffffff;">TELEGRAM GROUP:</span> <a href="https://t.me/viewpointchat"><span style="color: #0000ff;">https://t.me/viewpointchat</span></a> </strong></p>
<p><strong><span style="color: #ffffff;">WHATSAPP SUPPORT:</span> 2348147944875</strong></p>
        <h4><span style="color: #ffffff;">E-MAIL: support@viewpointng.com</span><br /><span
                style="color: #ffffff;">PHONE/SMS: +2348147944875, 2349011391738</span></h4>
        <h4><span style="color: #ffffff;"> <img src="https://viewpointng.com/asset/images/580b57fcd9996e24bc43c543.png"
                    width="31" height="31" />WhatsApp Support: +2348147944875, +2349011391738</span></h4>
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
