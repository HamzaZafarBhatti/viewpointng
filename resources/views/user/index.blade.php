@extends('user.userlayout')

@section('content')
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="content-wrapper">
            @if (auth()->user()->account_type->id == 1)
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card bg-dark border-0">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-muted mb-0 text-white">Referral Balance</h5>
                                                <span
                                                    class="h2 font-weight-bold mb-0 text-yellow">₦{{ $user->affliate_ref_balance }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card bg-dark border-0">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-muted mb-0 text-white">Sponsored Share Amount
                                                </h5>
                                                <span
                                                    class="h2 font-weight-bold mb-0 text-yellow">{{ $sponsor_bal }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-dark">
                            <!-- Card header -->
                            <div class="card-header bg-transparent">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <!-- Surtitle -->
                                        <h6 class="surtitle text-yellow">Last 5 mining operations</h6>
                                        <!-- Title -->
                                        <h5 class="h3 mb-0 text-white">Progress track</h5>
                                    </div>
                                </div>
                            </div>
                            <!-- Card body -->
                            <div class="card-body">
                                <!-- List group -->
                                <ul class="list-group list-group-flush list my--3">
                                    @foreach ($profit as $k => $val)
                                        <li class="list-group-item px-0 bg-dark">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <h5 class="text-white">Hash: {{ $val->trx }} <span
                                                            class="text-yellow">@
                                                            {{ $val->plan->hashrate }}</span>
                                                    </h5>
                                                    @php
                                                        if ($val->amount < 1) {
                                                            $val->amount = 1;
                                                        }
                                                    @endphp
                                                    <div class="progress progress-xs mb-0">
                                                        <div class="progress-bar bg-yellow" role="progressbar"
                                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                                            style="width: {{ ($val->profit * 100) / $val->amount > 0 }}%;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        @if ($set->referral == 1)
                            <div class="card bg-dark">
                                <div class="card-header bg-transparent header-elements-inline">
                                    <h3 class="mb-0 text-white">Referral link</h3>
                                </div>
                                <div class="card-body">
                                    <p class="text-white">Automatically Earn to your Referral Earnings Balance by sharing
                                        your referral
                                        link to your friends, family and associate. Also, Share your Referral Link to your
                                        WhatsApp Groups, Facebook Groups. Earn a percentage of whatever Mining Plan your
                                        referred user purchase to. You also earn from Indirect Referral Earnings.</p><br>
                                    <form action="javascript:void;" method="post">
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <input type="url" readonly class="form-control bg-dark text-yellow"
                                                    value="{{ url('/') }}/referral/{{ $user->username }}">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-md-none col-lg-6"></div>
                    <div class="col-lg-6">
                        <div class="row">
                            @if (!$user->cycle)
                            <div class="col-md-6 mb-2">
                                <button class="btn btn-block btn-primary">Activated</button>
                            </div>
                            @else
                            <div class="col-md-6 mb-2">
                                <button class="btn btn-block btn-danger" data-toggle="modal" data-target="#reactivate_modal">Re-activate</button>
                            </div>
                            <div id="reactivate_modal" class="modal fade" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">   
                                            <h3>Reactivate your Plan</h3>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <form action="{{ route('user.reactivate_plan') }}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label class="col-form-label">Activation Code</label>
                                                    <div class="">
                                                        <div class="input-group input-group-merge">
                                                            <input type="text" name="pin" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn bg-success">Re-activate</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="col-md-6">
                                <a type="button" href="{{ route('user.withdraw_mlm') }}" class="btn btn-block btn-success">Cashout</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card bg-dark border-0">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-muted mb-0 text-white">Referral Balance</h5>
                                                <span
                                                    class="h2 font-weight-bold mb-0 text-yellow">₦{{ $user->ref_balance }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card bg-dark border-0">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <p class="text-white">
                                            Unlock your ${{ $set->balance_reg_mlm }} balance and accumulcate even more earnings for each cycle
                                            completed. Win Fantastic prizes on each completed cycles.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card bg-dark border-0">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-muted mb-0 text-white">Direct Referrals</h5>
                                                <span
                                                    class="h2 font-weight-bold mb-0 text-yellow">{{ $user->cycle_direct_referrals }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card bg-dark border-0">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-muted mb-0 text-white">Indirect Referrals
                                                </h5>
                                                <span
                                                    class="h2 font-weight-bold mb-0 text-yellow">{{ $user->cycle_indirect_referrals }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card bg-dark border-0">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-muted mb-0 text-white">Last 10 Referrals
                                                </h5>
                                                <table class="table table-bordered text-white">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Username</th>
                                                            <th>Email</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if ($referrals)
                                                            @foreach ($referrals as $item)
                                                                <tr>
                                                                    <td>{{ $loop->iteration }}</td>
                                                                    <td>{{ $item->username }}</td>
                                                                    <td>{{ $item->email }}</td>
                                                                </tr>
                                                            @endforeach
                                                        @else
                                                        <tr>
                                                            <td colspan="2">No Referrals found!</td>
                                                        </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card bg-dark border-0">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-muted mb-0 text-white">Locked Referrals</h5>
                                                <span
                                                    class="h2 font-weight-bold mb-0 text-yellow">{{ $user->locked_referral }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card bg-dark border-0">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-muted mb-0 text-white">Cycles
                                                </h5>
                                                <span
                                                    class="h2 font-weight-bold mb-0 text-yellow">{{ $user->cycle }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                @if ($set->referral == 1)
                                    <div class="card bg-dark">
                                        <div class="card-header bg-transparent header-elements-inline">
                                            <h3 class="mb-0 text-white">Referral link</h3>
                                        </div>
                                        <div class="card-body">
                                            <p class="text-white">Automatically Earn to your Referral Earnings Balance by sharing
                                                your referral
                                                link to your friends, family and associate. Also, Share your Referral Link to your
                                                WhatsApp Groups, Facebook Groups. Earn a percentage of whatever Mining Plan your
                                                referred user purchase to. You also earn from Indirect Referral Earnings.</p><br>
                                            <form action="javascript:void;" method="post">
                                                <div class="form-group row">
                                                    <div class="col-lg-12">
                                                        <input type="url" readonly class="form-control bg-dark text-yellow"
                                                            value="{{ url('/') }}/referral/{{ $user->username }}">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endif
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
