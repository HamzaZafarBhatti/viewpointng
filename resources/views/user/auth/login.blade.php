@extends('user.loginlayout')

@section('content')
    <div class="main-content" style="background-image:url('{{ url('/') }}/asset/images/viewpointng/wave-soft0wa8.png');">
        <!-- Header -->
        <div class="header py-7 py-lg-8 pt-lg-9">
            <div class="container">
                <div class="header-body text-center mb-7">
                    <div class="row justify-content-center">
                        <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                            <img style="display: block; margin-left: auto; margin-right: auto;" src="https://viewpointng.com/asset/images/viewpointng/viewpoint-icon-min.png" width="125" height="134" />
                            <h1 class="text-white">{{ __('Login to ViewPoint') }}</h1>
                            <p><strong><span style="color: #ffffff;">Login to your ViewPoint Account -Stay Motivated Getting Paid Daily Watching Short Videos!</span></strong></p>
                            
                       
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container mt--8 pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">
                    <div class="border-0 mb-0 bg-transparent">
                       
                        <div class="card-body px-lg-5 py-lg-5">
                            <form role="form" action="{{ route('user.do_login') }}" method="post">
                                @csrf
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text text-dark">E-Mail</span>
                                        </div>
                                        <input class="form-control" placeholder="" type="email" name="email">
                                        @error('username')
                                            <span class="error form-error-msg ">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text text-dark">Password</i></span>
                                        </div>
                                        <input class="form-control" placeholder="" type="password" name="password">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-default my-4">LOGIN</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                            <a href="{{ route('user.password.reset') }}" class="text-white"><small>Forgot
                                    password?</small></a>
                        </div>
                        <div class="col-6 text-right">
                            <a href="https://viewpointng.com/referral/viewpoint" class="text-white"><small>Register ViewPoint Account</small></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @stop
