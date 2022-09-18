@extends('user.userlayout')

@section('content')
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="content-wrapper">
            @if (auth()->user()->account_type->id == 1)
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card bg-dark border-0">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-muted mb-0 text-white">Referral Earnings</h5>
                                                <span
                                                    class="h2 font-weight-bold mb-0 text-yellow">₦{{ /* substr($user->ref_bonus, 0, strlen($user->ref_bonus)) */ 0 }}</span>
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
                                                    class="h2 font-weight-bold mb-0 text-yellow">{{ /* substr($user->profit, 0, 9) */ 0 }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card bg-dark border-0">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-muted mb-0 text-white">All Time Cashout</h5>
                                                <span
                                                    class="h2 font-weight-bold mb-0 text-yellow">₦{{ /* substr($user->ref_bonus, 0, strlen($user->ref_bonus)) */ 0 }}</span>
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
                                            Unlock your $15000 balance and accumulcate even more earnings for each cycle completed. Win Fantastic prizes on each completed cycles.
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
                                                    class="h2 font-weight-bold mb-0 text-yellow">₦{{ /* substr($user->ref_bonus, 0, strlen($user->ref_bonus)) */ 0 }}</span>
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
                                                    class="h2 font-weight-bold mb-0 text-yellow">{{ /* substr($user->profit, 0, 9) */ 0 }}</span>
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
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Username</th>
                                                            <th>Email</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
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
                                                    class="h2 font-weight-bold mb-0 text-yellow">{{ /* substr($user->ref_bonus, 0, strlen($user->ref_bonus)) */ 0 }}</span>
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
                                                    class="h2 font-weight-bold mb-0 text-yellow">{{ /* substr($user->profit, 0, 9) */ 0 }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
