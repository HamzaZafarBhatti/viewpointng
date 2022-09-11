@extends('userlayout')

@section('content')
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="content-wrapper">
            @include('alert')
            <div class="row">
                <div class="col-md-12">
                    <div class="card bg-dark">
                        <div class="card-header header-elements-inline bg-transparent">
                            <h3 class="text-yellow">Reactivate Account</h3>
                            {{-- {{dd($user_plan)}} --}}
                            <h4 class="mb-0 text-yellow">Current Mining Plan: {{ !empty($user_plan) ? $user_plan->name : 'N/A' }}</h4>
                            <h4 class="mb-0 text-yellow">Account will Expire On: {{ \Carbon\Carbon::parse($user->activated_at)->addMonths($user_plan->active_period)->diffForHumans(\Carbon\Carbon::now()) }}</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('do_reactivate_account') }}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2 text-yellow">Activation PIN Code:</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="coupon" class="form-control">
                                    </div>
                                </div><p><strong><span style="color: #ffcc00;"><a style="color: #ffcc00;" href="https://goldmintng.com/coupon" target="_blank">Click Here</a></span> <span style="color: #ffffff;">to Get Activation PIN Code from our Dispatchers</span></strong></p>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-neutral">Reactivate Account<i
                                            class="icon-paperplane ml-2"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @stop
