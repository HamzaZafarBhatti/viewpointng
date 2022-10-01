@extends('front.layout')
@section('css')

@stop
@section('content')
    <section data-settings="particles-1" class="main-section crumina-flying-balls particles-js bg-1 medium-padding120">
        <div class="container">
            <div class="row align-center">
                <div class="col-lg-8 col-lg-offset-2 col-md-12 col-sm-12 col-xs-12">
                    <header class="crumina-module crumina-heading heading--h2 heading--with-decoration">
                        <h2 class="heading-title heading--half-colored">Verify pin</h2>
                    </header>
                </div>
            </div>
        </div>
    </section>
    <p><strong><span style="color: #ffffff;">Do you have an ACTIVATION CODE and you wish to VERIFY if the CODE is genuine or valid? You can definitely CONFIRM the validity of the CODE below on ViewPoint. Kindly paste and enter the ACTIVATION CODE below.</span></strong></p>
    <section id="contact" class="wow soneFadeUp" data-wow-delay="0.3s">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="contact-froms">
                        <form action="{{ route('do_verify_pin') }}" method="post" class="contact-form"
                            data-saasone="contact-froms">
                            @csrf
                            @include('front.alert-front-end')
                            @if (isset($verify_pin_user) && $verify_pin_user)
                                <table>
                                    <thead>
                                        <tr>
                                            <th>ACTIVATION PIN CODE</th>
                                            <th>Username</th>
                                            <th>Date used</th>
                                            <th>Plan</th>
                                            <th>Referral</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Used</td>
                                            <td>{{ $verify_pin_user->username }}</td>
                                            <td>{{ \Carbon\Carbon::parse($verify_pin_user->coupon->updated_at)->toDateString() }}</td>
                                            <td>{{ $verify_pin_user->coupon->plan->name }}</td>
                                            <td>{{ !$verify_pin_user->parent->isEmpty() ? $verify_pin_user->parent[0]->username : 'N/A' }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            @endif
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" name="coupon" class="form-control input--squared input--dark"
                                        placeholder="Enter or Paste ACTIVATION CODE Here to Verify" requried>
                                </div>
                            </div>

                            <button type="submit" class="btn btn--large btn--primary">VERIFY ACTIVATION CODE</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
