@extends('user.userlayout')

@section('content')
    <div class="container-fluid mt--6">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card bg-dark">
                        <div class="card-header bg-transparent">
                            <h3 class="mb-0 text-white">Referrals</h3>
                        </div>
                        @if ($set->referral == 1)
                            <div class="card bg-dark">
                                <div class="card-header bg-transparent header-elements-inline">
                                    <h3 class="mb-0 text-white">My Dedicated Referral link</h3>
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
                                <p><span style="color: #ffffff;"><strong>Automatically Earn to your Earnings Balance of Commission by sharing your referral link with your friends, family, and associate.</strong></span></p>
<p><span style="color: #ffffff;">Share your Referral Link to your WhatsApp Groups, and Facebook Groups. Keep Earning even if your downlines decide to join ViewPoint to our <span style="color: #ff0000;"><strong><span style="background-color: #ffff99;">VIDEO EARNING PLAN</span></strong></span> or our <span style="color: #ff0000;"><strong><span style="background-color: #ffff99;">MLM EARNING PLAN</span></strong></span>.</span></p>
                                </div>
                            </div>
                        @endif
                        <div class="card bg-dark">
                            <div class="card-header bg-transparent header-elements-inline">
                                <h3 class="mb-0 text-white">My Direct Referrals (Downlines)</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive py-4">
                                    <table class="table align-items-center table-flush table-dark">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>S/N</th>
                                                <th>Name</th>
                                                <th>Username</th>
                                                <th>My Downline's Referral Link</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($referrals as $k => $val)
                                                <tr>
                                                    <td>{{ ++$k }}.</td>
                                                    <td>{{ $val->referral->name ?? 'N/A' }}</td>
                                                    <td>{{ $val->referral->username ?? 'N/A' }}</td>
                                                    <td><span style="color: #ffffff;"><strong>viewpointng.com/referral/{{ $val->referral->username ?? 'N/A' }}</strong></span></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card bg-dark">
                            <div class="card-header bg-transparent header-elements-inline">
                                <h3 class="mb-0 text-white">Indirect Referrals</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive py-4">
                                    <table class="table align-items-center table-flush table-dark">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>S/N</th>
                                                <th>Name</th>
                                                <th>Username</th>
                                                <th>Created</th>
                                                <th>Updated</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($indirect_referrals as $k => $val)
                                                <tr>
                                                    <td>{{ ++$k }}.</td>
                                                    <td>{{ $val->referral->name ?? 'N/A' }}</td>
                                                    <td>{{ $val->referral->username ?? 'N/A' }}</td>
                                                    <td>{{ date('Y/m/d h:i:A', strtotime($val->created_at)) }}</td>
                                                    <td>{{ date('Y/m/d h:i:A', strtotime($val->updated_at)) }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-12">
                    <div class="card bg-dark">
                        <div class="card-header bg-transparent">
                            <h3 class="mb-0 text-white">Earnings</h3>
                        </div>
                        <div class="table-responsive py-4">
                            <table class="table align-items-center table-flush table-dark">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>S/N</th>
                                        <th>Amount</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Created</th>
                                        <th>Updated</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($earning as $k => $val)
                                        <tr>
                                            <td>{{ ++$k }}.</td>
                                            <td>{{ $currency->symbol . substr($val->amount, 0, 9) }}</td>
                                            <td>{{ $val->user->name }}</td>
                                            <td>{{ $val->user->username }}</td>
                                            <td>{{ date('Y/m/d h:i:A', strtotime($val->created_at)) }}</td>
                                            <td>{{ date('Y/m/d h:i:A', strtotime($val->updated_at)) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> --}}
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
