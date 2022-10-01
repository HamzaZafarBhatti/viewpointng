@extends('user.loginlayout')

@section('content')
    <div class="main-content" style="background-image:url('{{ url('/') }}/asset/images/viewpointng/wave-sofftwa8.png');">
        <!-- Header -->
        <div class="header py-7 py-lg-8 pt-lg-9">
            <div class="container">
                <div class="header-body text-center mb-7">
                    <div class="row justify-content-center">
                        <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                            <img style="display: block; margin-left: auto; margin-right: auto;" src="https://viewpointng.com/asset/images/viewpointng/viewpoint-icon-min.png" width="125" height="134" />
                            <h1 class="text-white">{{ __('ViewPoint Account Registration') }}</h1>
                            <p class="text-lead text-white">Register your ViewPoint Account with your best details - Stay Motivated Getting Paid Daily Watching Short Videos!</p>

                </div>
            </div>
        </div>
        <div class="container mt--8 pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">
                    <div class="border-0 mb-0">
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
                                                <span class="input-group-text text-dark">ACTIVATION CODE</span>
                                            </div>
                                            <input class="form-control" placeholder="" type="text" name="coupon"
                                                required>
                                        </div>
                                        <a href="{{ route('code_dispatcher') }}" style="text-decoration: none;color:white">No code?
                                            Click here to Purchase ACTIVATION CODE</a>
                                    </div>
                                    @error('coupon')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="form-group">
                                        <div class="input-group input-group-merge input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-dark">ACCOUNT TYPE</span>
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
                                  <p><span style="color: #ffffff;">By registering your account on ViewPoint, you agree to our <span style="color: #ff9900;"><a style="color: #ff9900;" href="https://viewpointng.com/privacy" target="_blank"><span style="color: #0000ff;">Privacy Policy</span></a></span><span style="color: #0000ff;">,</span> <a href="https://viewpointng.com/terms" target="_blank"><span style="color: #ff9900;"><span style="color: #0000ff;">Terms of Service</span></span></a></span></p>
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
                            <a href="https://viewpointng.com/referral/viewpoint" class="text-white"><small>Create New
                                    Account</small></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @stop
