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
                                    <h3 class="mb-0 text-white">Referral link</h3>
                                </div>
                                <div class="card-body">
                                    <p class="text-white">Automatically Earn to your Referral Earnings Balance by sharing
                                        your referral
                                        link to your friends, family and associate. Also, Share your Referral Link to your
                                        WhatsApp Groups, Facebook Groups. Earn a percentage of whatever Mining Plan your
                                        referred user purchase to.</p><br>
                                    <p><span style="color: #ffffff;">You Also Earn from <strong>INDIRECT Referral
                                                Earning</strong> which is also recorded to your Referral Earning
                                            Balance.</span></p>
                                    <p><span style="background-color: #ffcc00; color: #000000;"><strong>Indirect Referral
                                                Earnin</strong>g is the earnings you earn from referrals under those whom
                                            you referred. </span></p>
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
                        <div class="card bg-dark">
                            <div class="card-header bg-transparent header-elements-inline">
                                <h3 class="mb-0 text-white">Direct Referrals</h3>
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
                                            @foreach ($referrals as $k => $val)
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
