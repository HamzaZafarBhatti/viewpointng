@extends('userlayout')

@section('content')
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="content-wrapper">
            <div class="row">
                @foreach ($plan as $val)
                    <div class="col-md-4">
                        <div class="pricing card-group flex-column flex-md-row mb-3">
                            <div class="card card-pricing border-0 bg-dark text-center mb-4">
                                <div class="card-header bg-transparent">
                                    <div class="row align-items-center">
                                        <div class="col-lg-4 col-7">
                                            <!-- Title -->
                                            <h4 class="text-uppercase ls-1 text-white py-3 mb-0 text-left">
                                                {{ $val->name }}</h4>
                                        </div>
                                        <div class="col-lg-8 col-12 text-right">
                                            {{-- <div class="{{ $val->id === $user_plan[0]->id ? 'd-none' : '' }}"> --}}
                                            <a href="https://goldmintng.com/coupon" class="btn btn-sm btn-white">Buy
                                                Activation PIN Code</a>
                                            {{-- <a href="#" data-toggle="modal" data-target="#buy{{ $val->id }}"
                                                    class="btn btn-sm btn-default">Purchase plan</a> --}}
                                            {{-- </div> --}}
                                            <div class="modal fade" id="calculate{{ $val->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                                                <div class="modal-dialog modal- modal-dialog-centered modal-sm"
                                                    role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body p-0">
                                                            <div class="card bg-secondary border-0 mb-0">
                                                                <div class="card-header bg-transparent pb-5">
                                                                    <div class="text-muted text-center mt-2 mb-3">
                                                                        <small>Calculate profit</small>
                                                                    </div>
                                                                    <div class="btn-wrapper text-center">
                                                                        <h4
                                                                            class="text-uppercase ls-1 text-default py-3 mb-0">
                                                                            {{ $val->name }}</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="card-body px-lg-5 py-lg-5">
                                                                    <form role="form" action="{{ url('user/calculate') }}"
                                                                        method="post">
                                                                        @csrf
                                                                        <div class="form-group mb-3">
                                                                            <div
                                                                                class="input-group input-group-merge input-group-alternative">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text">₦</span>
                                                                                </div>
                                                                                <input type="number" step="any"
                                                                                    class="form-control" placeholder=""
                                                                                    name="amount" required>
                                                                                <input type="hidden" name="plan_id"
                                                                                    value="{{ $val->id }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="text-center">
                                                                            <button type="submit"
                                                                                class="btn btn-default my-4">Calculate</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="modal fade" id="buy{{ $val->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="modal-form" aria-hidden="true">
                                            <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body p-0">
                                                        <div class="card bg-secondary border-0 mb-0">
                                                            <div class="card-header bg-transparent pb-5">
                                                                <div class="text-muted text-center mt-2 mb-3">
                                                                    <small>Purchase plan</small></div>
                                                                <div class="btn-wrapper text-center">
                                                                    <h4 class="text-uppercase ls-1 text-default py-3 mb-0">
                                                                        {{ $val->name }}</h4>
                                                                </div>
                                                            </div>
                                                            <div class="card-body px-lg-5 py-lg-5">
                                                                <form role="form" action="{{ url('user/buy') }}"
                                                                    method="post">
                                                                    @csrf
                                                                    <div class="form-group mb-3">
                                                                        <div
                                                                            class="input-group input-group-merge input-group-alternative">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text">₦</span>
                                                                            </div>
                                                                            <input type="number" step="any"
                                                                                class="form-control" placeholder=""
                                                                                name="amount" required>
                                                                            <input type="hidden" name="plan"
                                                                                value="{{ $val->id }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="text-center">
                                                                        <button type="submit"
                                                                            class="btn btn-default my-4">Purchase</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="card-body px-lg-7">
                                    <div class="display-2 text-yellow">₦{{ $val->min_deposit }}</div>
                                    <span class="text-muted">For {{ $val->duration . ' ' . $val->period }}(s)</span>
                                    <ul class="list-unstyled my-4">
                                        <li>
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <div class="icon icon-xs icon-shape shadow rounded-circle text-yellow">
                                                        <i class="fa fa-check"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <span class="pl-2">{{ $val->percent }}% Mining Hashrate/
                                                        Hour</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <div class="icon icon-xs icon-shape shadow rounded-circle text-yellow">
                                                        <i class="fa fa-check"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <span class="pl-2">Indirect Referral Commission</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <div class="icon icon-xs icon-shape shadow rounded-circle text-yellow">
                                                        <i class="fa fa-check"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <span class="pl-2">₦700 Instant Mine Bonus
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <div class="icon icon-xs icon-shape shadow rounded-circle text-yellow">
                                                        <i class="fa fa-check"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <span class="pl-2">Expected Monthly MINE EARNINGS as Payment
                                                        in Naira is multiplied by exchange rate of GMC COIN.
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <div class="icon icon-xs icon-shape shadow rounded-circle text-yellow">
                                                        <i class="fa fa-check"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <span class="pl-2">Mining Power Hashrate:
                                                        {{ $val->hashrate }} </span>
                                                </div>
                                            </div>
                                        </li>
                                        @if ($set->upgrade_status == 1)
                                            <li>
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <div
                                                            class="icon icon-xs icon-shape shadow rounded-circle text-yellow">
                                                            <i class="fa fa-check"></i>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <span class="pl-2"> Profit
                                                            bonus from Sponsored Post Share</span>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif
                                        <li>
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <div class="icon icon-xs icon-shape shadow rounded-circle text-yellow">
                                                        <i class="fa fa-check"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <span class="pl-2">{{ $val->ref_percent }}% Referral
                                                        Earnings</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @include('alert')
            <div class="row">
                <div class="col-md-12">
                    <div class="card bg-dark">
                        <div class="card-header header-elements-inline bg-transparent">
                            <h3 class="text-yellow">Upgrade Plan</h3>
                            {{-- {{dd($user_plan)}} --}}
                            <h4 class="mb-0 text-yellow">Current Mining Plan:
                                {{ !empty($user_plan) ? $user_plan->name : 'N/A' }}</h4>
                            <h4 class="mb-0 text-yellow">Account will Expire On:
                                {{ \Carbon\Carbon::parse($user->activated_at)->addMonths($user_plan->active_period)->diffForHumans(\Carbon\Carbon::now()) }}
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('user/upgrade_plan') }}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2 text-yellow">Activation PIN Code:</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="coupon" class="form-control">
                                    </div>
                                </div>
                                <p><strong><span style="color: #ffcc00;"><a style="color: #ffcc00;"
                                                href="https://goldmintng.com/coupon" target="_blank">Click Here</a></span>
                                        <span style="color: #ffffff;">to Get Activation PIN Code from our
                                            Dispatchers</span></strong></p>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-neutral">Upgrade Plan<i
                                            class="icon-paperplane ml-2"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @stop
        @section('script')
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script>
                $(document).ready(function() {
                    if ("{{ $user_proof }}" == 1) {
                        swal({
                                title: null,
                                text: "Congrats on your most RECENT PAYMENT on GOLDMINT",
                                icon: "success",
                                buttons: ["Close", "Upload Payment Proof Now!"],
                            })
                            .then((willDelete) => {
                                if (willDelete) {
                                    window.location.href = "{{ route('upload.proof') }}"
                                }
                            });
                    }
                })
            </script>
        @endsection
