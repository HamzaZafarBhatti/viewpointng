@extends('user.userlayout')

@section('content')
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="content-wrapper">
            @if (auth()->user()->account_type->id == 1)
           
                            <h2 class="mb-0 text-black">Hi {{ $user->name }}!</h3><br>
                             <div class="col-md-6">
                                <a type="button" href="https://viewpointng.com/user/withdraws_ref" class="btn btn-block btn-success">Cashout ₦{{ $user->affliate_ref_balance }} Ref Balance</a>
                            </div><br>
                <h3 class="mb-0 text-black">My Referral Link</h3>
                                </div>
                                    <form action="javascript:void;" method="post">
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <input type="url" readonly class="form-control bg-dark text-yellow"
                                                    value="{{ url('/') }}/referral/{{ $user->username }}">
                                            </div>
                                        </div>
                                    </form>
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card bg-dark border-0">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-muted mb-0 text-white">Ref Balance</h5>
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
                                                <h5 class="card-title text-muted mb-0 text-white">Viral Video Share
                                                </h5>
                                                <span
                                                    class="h2 font-weight-bold mb-0 text-yellow">#{{ $sponsor_bal }}<p><span style="font-size:11px;"><span style="color:#FFFFFF;"><strong>Viral Video Share Earnings are also automatically added to your Video Earning Points as above.</strong></span></span></p>
</span>
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
                                        <h6 class="surtitle text-yellow">5 MOST RECENT VIDEOS WATCH HISTORY</h6>
                                        <!-- Title -->
                                        <h5 class="h3 mb-0 text-white">Video Earning History</h5>
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
                                                    <h5 class="text-white">Video Session: VIEWPOINT{{ $val->trx }} <span
                                                            class="text-yellow">on Youtube</span>
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
                                    <h3 class="mb-0 text-white">My Referral link</h3>
                                    <p><span style="color:#ffffff"><strong><span style="font-size:11px">Copy your ViewPoint Referral Link below to earn 58% Referral Commission. </span></strong></span></p>
                                </div>
                                <div class="card-body">
                                   
                                    <form action="javascript:void;" method="post">
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <input type="url" readonly class="form-control bg-dark text-yellow"
                                                    value="{{ url('/') }}/referral/{{ $user->username }}">
                                                     <br><p class="text-white">Automatically Earn to your Earnings Balance of 58% Commission by sharing
                                        your referral
                                        link to your friends, family and associate. Also, Share your Referral Link to your
                                        WhatsApp Groups, Facebook Groups. Keep Earning 58% even if your downlines decides to join ViewPoint to either our VIDEO EARNING PLAN or our MLM EARNING PLAN.</p><br>
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
                            @if (!$user->is_locked)
                            <div class="col-md-6 mb-2">
                                <button class="btn btn-block btn-primary">Account Activated</button>
                            </div>
                            @else
                            <div class="col-md-6 mb-2">
                                <button class="btn btn-block btn-danger" data-toggle="modal" data-target="#reactivate_modal">Re-Activate Account</button>
                            </div>
                            <div id="reactivate_modal" class="modal fade" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">   
                                            <h3>Re-Activate your MLM PLAN For CYCLE {{ $user->cycle }}</h3>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <form action="{{ route('user.reactivate_plan') }}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label class="col-form-label">ACTIVATION CODE</label>
                                                    <div class="">
                                                        <div class="input-group input-group-merge">
                                                            <input type="text" name="pin" class="form-control" required>
                                                        </div><p style="text-align: right;"><span style="color: #0000ff;"><a style="color: #0000ff;" href="https://viewpointng.com/coupon" target="_blank"><strong>Get ACTIVATION CODE</strong></a></span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn bg-success">Re-Activate</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="col-md-6">
                                <a type="button" href="{{ route('user.withdraw_mlm') }}" class="btn btn-block btn-success">Withdraw to Bank</a>
                            </div>
                        </div>
                    </div>
                </div><h2 class="mb-0 text-black">Hi {{ $user->name }}!</h3><br>
                                    <h3 class="mb-0 text-black">My Referral Link</h3>
                                </div>
                                    <form action="javascript:void;" method="post">
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <input type="url" readonly class="form-control bg-dark text-yellow"
                                                    value="{{ url('/') }}/referral/{{ $user->username }}">
                                            </div>
                                        </div>
                                    </form>
                <div class="row mt-3">
                    <div class="col-lg-3">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card bg-dark border-0">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-muted mb-0 text-white">Total Account Balance Withdrawal</h5>
                                                <span
                                                    class="h2 font-weight-bold mb-0 text-yellow">₦{{ $total_withdraws_amount }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card bg-dark border-0">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <p><span style="color: #ffffff;"><strong>Unlock your ₦10,000</strong> for each completed</span> <span style="color: #008000;"><strong><span style="background-color: #ffff99;">CYCLE</span></strong></span> <span style="color: #ffffff;"><strong>(4 Direct Referrals &amp; 4 Indirect Referrals)</strong> - Get Paid Daily Instantly.</span></p>
<p><span style="color: #ffffff;">WIN Fantantic Prizes by climbing the ladder of your CYCLES.</span> <span style="color: #0000ff;"><strong><a style="color: #0000ff;" href="https://viewpointng.com/about" target="_blank">See more details here</a></strong></span></p>
<p><span style="color: #ffffff;">Once each</span> <span style="color: #008000;"><strong><span style="background-color: #ffff99;">CYCLE</span></strong></span> <span style="color: #ffffff;">is completed. <strong>RE-ACTIVATE</strong> your MLM Account to move to the next </span><span style="color: #008000;"><strong><span style="background-color: #ffff99;">CYCLE</span></strong></span>.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card bg-dark border-0">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-muted mb-0 text-white">Direct Referrals</h5>
                                                <span
                                                    class="h2 font-weight-bold mb-0 text-yellow">{{ $user->cycle_direct_referrals }}<br><p><span style="color:#ffffff"><span style="font-size:11px">You need <strong>4 REFERRAL DOWNLINES</strong> to get your ₦10,000 Unlocked in your Account Balance</span></span></p>
</span>
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
                                                    class="h2 font-weight-bold mb-0 text-yellow">{{ $user->cycle_indirect_referrals }}<br><p><span style="color:#ffffff"><span style="font-size:11px">You need <strong>4 INDIRECT REFERRAL DOWNLINES</strong> to get your ₦10,000 Unlocked in your Account Balance</span></span></p>
</span>
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
                                                <p><span style="font-size:11px"><span style="color:#ffffff">The last 10 Referrals include your <strong>Direct and Indirect Referrals</strong> together. If you wish to see a separate view of your Referrals, please go to </span><strong><a href="https://viewpointng.com/user/referrals" style="color: #0000ff;" target="_blank"><span style="color:#0000cc"><span style="background-color:#ffffcc">My Referrals</span></span></a></strong><span style="color:#ffffff"><span style="background-color:#ffffcc"> </span>for a detailed analysis.</span></span></p>

                                                <table class="table table-bordered text-white">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Account Username</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if ($referrals)
                                                            @foreach ($referrals as $item)
                                                                <tr>
                                                                    <td>{{ $loop->iteration }}</td>
                                                                    <td>{{ $item->username }}</td>
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
                    <div class="col-lg-3">
                        <div class="row">
                            <div class="col-md-12">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card bg-dark border-0">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-muted mb-0 text-white">CYCLES
                                                </h5>
                                                <span
                                                    class="h2 font-weight-bold mb-0 text-yellow">{{ $user->cycle }}</span><br><p><span style="color:#ffffff"><span style="font-size:11px">Number of CYCLES completed</span></span></p>

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
                                            <p><span style="color:#ffffff"><strong><span style="font-size:11px">Copy your ViewPoint Referral Link below to Unlock ₦10,000 for each Completed CYCLE as Earning. </span></strong></span></p>
                                        </div>
                                        <div class="card-body">
                                            
                                            <form action="javascript:void;" method="post">
                                                <div class="form-group row">
                                                    <div class="col-lg-12">
                                                        <input type="url" readonly class="form-control bg-dark text-yellow"
                                                            value="{{ url('/') }}/referral/{{ $user->username }}">
                                                    </div>
                                                </div>
                                            </form>
                                            <br><p class="text-white">Automatically Earn by climbing the ladder of your CYCLES in bulding your network structure of REFERRALS. You Earn ₦10,000 Flat for each completed CYCLE upon referring to ViewPoint. Refer your friends, family and associate. Also, Share your Referral Link to your
                                        WhatsApp Groups, Facebook Groups. Keep Earning and climbing your CYCLES when you refer your downlines to join ViewPoint to either our VIDEO EARNING PLAN or our MLM EARNING PLAN.</p><br>
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
                        text: "✨CONGRATULATIONS ON YOUR LATEST CASHOUT. ✨ Upload Your Payment PROOF!",
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
