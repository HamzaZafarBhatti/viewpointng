@extends('userlayout')

@section('content')
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12">

                    <!-- Basic layout-->
                    <div class="card bg-dark">
                        <div class="card-header header-elements-inline bg-transparent">
                            <h3 class="mb-0 text-yellow">Withdraw of MINE BALANCE to BANK</h3>
                            <p><span style="color: #ffffff;"><strong>GoldMint Self Cashout</strong></span></p>
                            <p><span style="color: #ffffff;">Withdrawal for the SELF-CASHOUT is automatically available of
                                    ₦4000 once you refer a minimum of 3 DOWNLINES For the PANGOLIN PLAN.</span></p>
                            <p><span style="color: #ffffff;">You can request your GoldMint Mine Balance</span></p>
                            <p><span style="color: #ffffff;">Mine Balance:
                                    ₦{{ substr($user->balance, 0, 9) }}</span></p>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('selfcashout.submit') }}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2 text-white">Self-Cashout Amount to Withdraw</label>
                                    <div class="col-lg-10">
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend bg-secondary">
                                                <span class="input-group-text text-white bg-dark">₦</span>
                                            </div>
                                            <input type="number" step="any" maxlength="10" value="{{ $selfcashout_amount }}" readonly="readonly"
                                                class="form-control bg-dark text-white" placeholder="10000">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2 text-white">Self Cashout ELigibility</label>
                                    <div class="col-lg-10">
                                        @if ($user->is_selfcashout >= 3)
                                            <p class="col-form-label text-success"><img
                                                    src="https://goldmintng.com/asset/global_assets/mining/green-check-m-goldmint.png"
                                                    alt="" width="31" height="32" /> ELIGIBLE FOR SELF CASHOUT - WITHDRAW
                                                MINE TO BANK</p>
                                        @else
                                            <p class="col-form-label text-danger"><img
                                                    src="https://goldmintng.com/asset/global_assets/mining/green-check-mgoldmint-e6.png"
                                                    alt="" width="31" height="32" /> NOT ELIGIBLE FOR SELF CASHOUT - YOU
                                                NEED 3 PANGOLIN DOWNLINES TO BE ELIGIBLE</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2 text-white">Pin</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="pin" class="form-control bg-dark text-white"
                                            placeholder="0000" required="">
                                        @if ($user->pin == '0000')
                                            <a href="{{ route('user.password') }}">Click Here to Set Pin</a>
                                        @endif
                                    </div>
                                </div>
                                @if ($errors->has('pin'))
                                    <span class="error form-error-msg ">
                                        {{ $errors->first('pin') }}
                                    </span>
                                @endif
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2 text-white">Bank Account</label>
                                    <div class="col-lg-10">
                                        <select name="details" id="details" class="form-control bg-dark text-white"
                                            required>
                                            <option value="">Choose Bank Account</option>
                                            <option value="{{ $account['account_no'] }}">{{ $account['account'] }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                @if ($errors->has('details'))
                                    <span class="error form-error-msg ">
                                        {{ $errors->first('details') }}
                                    </span>
                                @endif
                                <div class="text-right">
                                    <button type="submit" class="btn btn-secondary"
                                        {{ $user->is_selfcashout < 3 ? 'disabled' : '' }}>Withdraw to BANK</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /basic layout -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card bg-dark" id="logs">
                        <div class="card-header header-elements-inline bg-transparent">
                            <h3 class="mb-0 text-white">SELF-CASHOUT Withdrawal to BANK History</h3>
                        </div>
                        <div class="table-responsive py-4">
                            <table class="table table-flush table-dark" id="datatable-buttons">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>S/n</th>
                                        <th>Amount</th>
                                        <th>Bank Account</th>
                                        <th>Status</th>
                                        <th>Created</th>
                                        <th>Updated</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($selfcashout as $k => $val)
                                        <tr>
                                            <td>{{ ++$k }}.</td>
                                            <td>₦{{ substr($val->amount, 0, 9) }}</td>
                                            <td>{{ $val->details }}</td>
                                            <td>
                                                @if ($val->status == 1)
                                                    <span class="badge badge-success">Approved</span>
                                                @elseif($val->status == 0)
                                                    <span class="badge badge-danger">Pending</span>
                                                @elseif($val->status == 2)
                                                    <span class="badge badge-info">Declined</span>
                                                @endif
                                            </td>
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
