@extends('user.loginlayout')

@section('content')
    <div class="main-content" style="background-image:url('{{ url('/') }}/asset/images/viewpointng/wave-sofftwa8.png');">
        <!-- Header -->
        <div class="header py-7 py-lg-8 pt-lg-9">
            <div class="container">

                <div class="text-center mb-5 pt-5">
                    <h1 class="error-title mt-5" style="font-size: 5rem;"><span>ACCOUNT SUSPENDED</span></h1>
                    <h4 class="text-uppercase mt-5">THIS ACCOUNT HAS BEEN SUSPENDED</h4>
                    <div class="mt-5 text-center">
                        <a class="btn btn-primary waves-effect waves-light" href="{{ route('user.login') }}">Back to
                            Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
