@extends('user.loginlayout')

@section('content')
    <div class="main-content bg-dark" style="background-image:url('{{ url('/') }}/asset/frontend/img/bg-2.png');">
        <!-- Header -->
        <div class="header py-7 py-lg-8 pt-lg-9">
            <div class="container">
                <div class="header-body text-center mb-7">
                    <div class="row justify-content-center">
                        <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                            <h1 class="text-white">{{ __('GoldMint Account Registration') }}</h1>
                            <p class="text-lead text-white">{{ $ui['header_body'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt--8 pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">
                    <div class="border-0 mb-0">
                        <div class="card-header bg-transparent pb-5">
                            <div class="text-white text-center mt-2 mb-3">Register your GoldMint Account with your primary
                                details - Easy way to MINE GoldMint Coin. </div>
                        </div>
                        @include('alert')
                        <div class="card-body px-lg-5 py-lg-5">
                            @if ($set->registration == 1)
                                <form role="form" action="{{ route('user.do_register') }}" method="post">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <div class="input-group input-group-merge input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-dark">Full Names</span>
                                            </div>
                                            <input class="form-control" placeholder="" type="text" name="name">
                                        </div>
                                    </div>
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="form-group mb-3">
                                        <div class="input-group input-group-merge input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-dark">Username</span>
                                            </div>
                                            <input class="form-control" placeholder="" type="text" name="username">

                                        </div>
                                    </div>
                                    @error('username')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="form-group mb-3">
                                        <div class="input-group input-group-merge input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-dark">E-Mail</span>
                                            </div>
                                            <input class="form-control" placeholder="" type="email" name="email">

                                        </div>
                                    </div>
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="form-group">
                                        <div class="input-group input-group-merge input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-dark">Phone Number</span>
                                            </div>
                                            <input class="form-control" placeholder="" type="text" name="phone">

                                        </div>
                                    </div>
                                    @error('phone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="form-group">
                                        <div class="input-group input-group-merge input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-dark">Password</span>
                                            </div>
                                            <input class="form-control" placeholder="" type="password" name="password">

                                        </div>
                                    </div>
                                    @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="form-group">
                                        <div class="input-group input-group-merge input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-dark">Confirm Password</span>
                                            </div>
                                            <input class="form-control" placeholder="" type="password"
                                                name="password_confirmation">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group input-group-merge input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-dark">Activation PIN CODE</span>
                                            </div>
                                            <input class="form-control" placeholder="" type="text" name="coupon"
                                                required>
                                        </div>
                                        <a href="{{ route('code_dispatcher') }}" style="text-decoration: none;color:white">No code?
                                            Click here to BUY Activation code </a>
                                    </div>
                                    @error('coupon')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="form-group">
                                        <div class="input-group input-group-merge input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-dark">Account Type</span>
                                            </div>
                                            <select name="account_type_id" class="form-control" required>
                                                <option value="">Select Account Type</option>
                                                @if ($account_types)
                                                    @foreach ($account_types as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-default my-4">REGISTER ACCOUNT!</button>
                                    </div>
                                    <p><span style="color: #ffffff;">By registering your account on GoldMint, you agree to
                                            our <span style="color: #ff9900;"><a style="color: #ff9900;"
                                                    href="https://goldmintng.com/privacy" target="_blank">Privacy
                                                    Policy</a></span>, <a href="https://goldmintng.com/terms"
                                                target="_blank"><span style="color: #ff9900;">Terms of Service</span></a>,
                                            <span style="color: #ff9900;"><a style="color: #ff9900;"
                                                    href="https://goldmintng.com/page/7" target="_blank">Cookies
                                                    Policy</a></span> &amp; <a href="https://goldmintng.com/page/8"
                                                target="_blank"><span style="color: #ff9900;">Disclaimer
                                                    Policy</span></a></span></p>
                                </form>
                            @else
                                <div class="text-dark text-center mt-2 mb-3"><strong>We are not currenctly accepting new
                                        users</strong></div>
                            @endif
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                            <a href="{{ route('user.password.reset') }}" class="text-white"><small>Forgot
                                    password?</small></a>
                        </div>
                        <div class="col-6 text-right">
                            <a href="{{ route('user.register') }}" class="text-white"><small>Create New
                                    account</small></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @stop
