@extends('front.layout')
@section('css')
    <style>
        table thead,
        table tbody {
            text-align: center;
        }

        td:first-child {
            display: flex;
            /* width: 100%; */
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        td img {
            width: 3rem;
            height: 3rem;
            border-radius: 50px;
        }

    </style>
@stop
@section('content')
    <section data-settings="particles-1"
        class="main-section crumina-flying-balls particles-js bg-1 medium-padding120 responsive-align-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                    <img class="responsive-width-50" src="{{ url('/') }}/asset/images/{{ $ui->s2_image }}"
                        alt="image">
                </div>
                <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
                    <header class="crumina-module crumina-heading heading--h1 heading--with-decoration">
                        <h3 class="heading-title f-size-90 weight-normal no-margin">
                            {{ $ui->header_title }}
                        </h3>
                        <h2 class="c-primary">{{ $ui->header_body }}</h2>
                    </header>
                    <a data-scroll href="https://goldmintng.com/referral/goldmint"
                        class="btn btn--large btn--transparent btn--secondary">Start Mining GoldMint</a> <a data-scroll
                        href="https://goldmintng.com/login" class="btn btn--large btn--transparent btn--secondary">Login to
                        GoldMint</a>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row medium-padding80">
                <div class="align-center">
                    <header class="crumina-module crumina-heading heading--h2 heading--with-decoration">
                        <h4 class="heading-title weight-normal">GoldMint is a robotized Mining platform machine used for
                            mining, minting & cashing out the GoldMint Coin as revenue</h4>
                        <div class="heading-text">Mine GoldMint Coin with your most preferred time, hashrate and machine -
                            as well as for the earning of GoldMint Coins everyday.</div>
                    </header>
                </div><br>
                <h3 style="text-align: center;"><span style="color: #ffffff;">How GoldMint Works</span><span
                        style="color: #ffcc00;">.</span></h3>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    @foreach ($service as $services)
                        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 mb30">
                            <div class="crumina-module crumina-info-box info-box--style4">
                                <div class="info-box-thumb">
                                    <i class="fa fa-{{ $services->icon }} woox-icon text-yellow"></i>
                                </div>
                                <div class="info-box-content">
                                    <h4 class="info-box-title">{{ $services->title }}</h4>
                                    <p class="info-box-text">{{ $services->details }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
    </section>
    <section class="medium-padding120 responsive-align-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <header class="crumina-module crumina-heading heading--h2 heading--with-decoration">
                        <div class="heading-sup-title">Start Mining GoldMint Coins</div>
                        <h2 class="heading-title weight-normal">{{ $ui->s6_title }}</h2>
                    </header>

                    <p>{{ $ui->s6_body }}</p>
                </div>

                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 mt30">
                    <img class="responsive-width-50" src="{{ url('/') }}/asset/images/{{ $ui->s7_image }}"
                        alt="phone">
                </div>
            </div>
        </div>
    </section>
    <h2 style="text-align: center;"><span style="color: #ffffff;">Choose your Mining Hashrate Plan</span><span
            style="color: #ffcc00;">.</span></h2>
    <section class="pt-mobile-80">
        <div class="container">
            <div class="row medium-padding100">
                {{-- @foreach ($plan as $val)
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb30" data-mh="pricing-item">
                        <div class="crumina-module crumina-pricing-table pricing-table--style1">
                            <div class="pricing-thumb">
                                <img src="{{ url('/') }}/asset/images/{{ $val->image }}" class="woox-icon"
                                    alt="bitcoin">
                            </div>
                            <h5 class="pricing-title">{{ $val->name }}</h5>
                            <div class="price">
                                <div class="price-sup-title">Price:</div>
                                <div class="price-value">₦{{ $val->min_deposit }}</div>
                            </div>
                            <ul class="pricing-tables-position">
                                <li class="position-item">
                                    <div class="currency-details-item">
                                        <h6 class="title">Duration:</h6>
                                        <h6 class="value">For {{ $val->duration . $val->period }}(s)</h6>
                                    </div>
                                </li>
                                <li class="position-item">
                                    <div class="currency-details-item">
                                        <h6 class="title">Referral:</h6>
                                        <h6 class="value">{{ $val->ref_percent }}%</h6>
                                    </div>
                                </li>
                                <li class="position-item">
                                    <div class="currency-details-item">
                                        <h6 class="title">Mining Power/ Hashrate:</h6>
                                        <h6 class="value">{{ $val->hashrate }}</h6>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endforeach --}}
            </div>
        </div>
    </section>
    <h3 style="text-align: center;"><strong><span style="color: #ff9900;">Get Started by Mining GoldMint
                Coin!</span></strong></h3>
    <h3 style="text-align: center;"><strong><span style="color: #ff9900;">Unlimited Earning with the most powerful
                Hashrate!</span></strong><br><a data-scroll href="https://goldmintng.com/referral/goldmint"
            class="btn btn--large btn--transparent btn--secondary">Register to Start Mining!</a> <a data-scroll
            href="https://goldmintng.com/login" class="btn btn--large btn--transparent btn--secondary">Login to GoldMint</a>
    </h3>

    <section class="medium-padding120 responsive-align-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <header class="crumina-module crumina-heading heading--h2 heading--with-decoration">
                        <div class="heading-sup-title">Frequent questions</div>
                        <h2 class="heading-title weight-normal">{{ $ui->s5_title }}</h2>
                    </header>
                    <p>{{ $ui->s5_body }}</p>
                </div>

                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 mt30">
                    <ul class="crumina-module crumina-accordion accordion--style3" id="accordion4">
                        {{-- @foreach ($faq as $vfaq)
                            <li class="accordion-panel">
                                <div class="panel-heading">
                                    <a href="#{{ $vfaq->id }}" class="accordion-heading collapsed"
                                        data-toggle="collapse" data-parent="#accordion" aria-expanded="false">
                                        <span class="icons">
                                            <svg class="woox-icon icon-plus-sign">
                                                <use
                                                    xlink:href="{{ url('/') }}/asset/frontend/svg-icons/sprites/icons.svg#icon-plus-sign">
                                                </use>
                                            </svg>
                                            <svg class="woox-icon active icon-min-sign">
                                                <use
                                                    xlink:href="{{ url('/') }}/asset/frontend/svg-icons/sprites/icons.svg#icon-min-sign">
                                                </use>
                                            </svg>
                                        </span>
                                        <span class="title">{{ $vfaq->question }}</span>
                                    </a>
                                </div>

                                <div id="{{ $vfaq->id }}" class="panel-collapse collapse" aria-expanded="false"
                                    role="tree">
                                    <div class="panel-info">
                                        {!! $vfaq->answer !!}
                                    </div>
                                </div>
                            </li>
                        @endforeach --}}
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row medium-padding120">
                <div class="align-center">
                    <header class="crumina-module crumina-heading heading--h2 heading--with-decoration">
                        <h2 class="heading-title weight-normal">{{ $ui->s8_title }}</h2>
                        <div class="heading-text">{{ $ui->s8_body }}</div>
                    </header>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="counters">
                        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                            <div class="crumina-module crumina-counter-item">
                                <div class="counter-numbers counter">
                                    {{ $ui->total_assets }}
                                </div>
                                <h4 class="counter-title">Asset To Mine</h4>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                            <div class="crumina-module crumina-counter-item">
                                <div class="counter-numbers counter">
                                    {{ $ui->experience }}
                                </div>
                                <h4 class="counter-title">Mining Hashrate</h4>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                            <div class="crumina-module crumina-counter-item">
                                <div class="counter-numbers counter">
                                    {{ $ui->traders }}
                                </div>
                                <h4 class="counter-title">Backers</h4>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                            <div class="crumina-module crumina-counter-item">
                                <div class="counter-numbers counter">
                                    {{ $ui->countries }}
                                </div>
                                <h4 class="counter-title">Countries supported</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- @if (count($review) > 0)
        <section class="pt-mobile-80">
            <div class="container">
                <div class="row medium-padding100">
                    @foreach ($review as $vreview)
                        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 mb30">
                            <div class="crumina-module crumina-testimonial-item testimonial-item--with-bg">
                                <div class="testimonial-content">
                                    <h6 class="testimonial-text">
                                        <svg class="woox-icon icon-quote-icon quote">
                                            <use xlink:href="svg-icons/sprites/icons.svg#icon-quote-icon"></use>
                                        </svg>
                                        <svg class="woox-icon icon-quote-icon2 quote quote-close">
                                            <use xlink:href="svg-icons/sprites/icons.svg#icon-quote-icon2"></use>
                                        </svg>
                                        {{ $vreview->review }}
                                    </h6>
                                    <div class="author-block">
                                        <div class="avatar avatar80">
                                            <img src="{{ url('/') }}/asset/review/{{ $vreview->image_link }}"
                                                alt="avatar">
                                        </div>
                                        <div class="author-content">
                                            <a href="#" class="author-name">{{ $vreview->name }}</a>
                                            <div class="author-prof">{{ $vreview->occupation }}</div>
                                            <ul class="rait-stars">
                                                <li>
                                                    <svg class="woox-icon icon-star-1">
                                                        <use
                                                            xlink:href="{{ url('/') }}/asset/frontend/svg-icons/sprites/icons.svg#icon-star-1">
                                                        </use>
                                                    </svg>
                                                </li>
                                                <li>
                                                    <svg class="woox-icon icon-star-1">
                                                        <use
                                                            xlink:href="{{ url('/') }}/asset/frontend/svg-icons/sprites/icons.svg#icon-star-1">
                                                        </use>
                                                    </svg>
                                                </li>

                                                <li>
                                                    <svg class="woox-icon icon-star-1">
                                                        <use
                                                            xlink:href="{{ url('/') }}/asset/frontend/svg-icons/sprites/icons.svg#icon-star-1">
                                                        </use>
                                                    </svg>
                                                </li>
                                                <li>
                                                    <svg class="woox-icon icon-star-1">
                                                        <use
                                                            xlink:href="{{ url('/') }}/asset/frontend/svg-icons/sprites/icons.svg#icon-star-1">
                                                        </use>
                                                    </svg>
                                                </li>
                                                <li>
                                                    <svg class="woox-icon icon-star-1">
                                                        <use
                                                            xlink:href="{{ url('/') }}/asset/frontend/svg-icons/sprites/icons.svg#icon-star-1">
                                                        </use>
                                                    </svg>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif --}}

    <section class="pt-mobile-80">
        <div class="container">
            <div class="row medium-padding100">
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 mb30">
                    <div class="crumina-module crumina-testimonial-item testimonial-item--with-bg">
                        <h5>Latest Registrations</h5>
                        <table>
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Plan</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @if (count($registrations) > 0)
                                    @foreach ($registrations as $item)
                                        <tr>
                                            <td><img src="{{ $item->image ? url('/') . '/asset/profile/' . $item->image : url('/') . '/asset/profile/react.jpg' }}"
                                                    alt="{{ $item->username }}">{{ $item->name }}</td>
                                            <td>{{ $item->plan }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="2">No data found!</td>
                                    </tr>
                                @endif --}}
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 mb30">
                    <div class="crumina-module crumina-testimonial-item testimonial-item--with-bg">
                        <h5 style="text-align: right;">Latest Withdraws</h5>
                        <table>
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @if (count($withdraws) > 0)
                                    @foreach ($withdraws as $item)
                                        <tr>
                                            <td><img src="{{ $item->user->image? url('/') . '/asset/profile/' . $item->user->image: url('/') . '/asset/profile/react.jpg' }}"
                                                    alt="{{ $item->user->username }}">{{ $item->user->name }}</td>
                                            <td>₦{{ $item->amount }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="2">No data found!</td>
                                    </tr>
                                @endif --}}
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 mb30">
                    <div class="crumina-module crumina-testimonial-item testimonial-item--with-bg">
                        <h5 style="text-align: right;">Latest Self Cashouts</h5>
                        <table>
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @if (count($self_cashouts) > 0)
                                    @foreach ($self_cashouts as $item)
                                        <tr>
                                            <td><img src="{{ $item->user->image? url('/') . '/asset/profile/' . $item->user->image: url('/') . '/asset/profile/react.jpg' }}"
                                                    alt="{{ $item->user->username }}">{{ $item->user->name }}</td>
                                            <td>₦{{ $item->amount }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="2">No data found!</td>
                                    </tr>
                                @endif --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
