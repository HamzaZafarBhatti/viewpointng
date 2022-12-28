@extends('user.userlayout')

@section('content')
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12">

                    <!-- Basic layout-->
                    <div class="card bg-dark">
                        <div class="card-header header-elements-inline bg-transparent">
                            <h3><span style="background-color: #ffff99;"><strong>REF BALANCE WITHDRAWAL TO BANK</strong></span></h3>
<p><span style="color: #ffffff;"><strong>Minimum REF WITHDRAWAL: VIDEO EARNER: ₦3000 | VIDEO PREMIUM: ₦5000<br /></strong></span></p>
<p><strong><span style="color: #ffffff;">Service Maintenance Fee: VIDEO EARNER: ₦300 | VIDEO PREMIUM: ₦400</span><br /></strong></p><br>
<p><span style="color: #000000;"><span style="color: #ffffff;"><strong>REF EARNING Withdrawal</strong> is </span><span style="background-color: #ffcc99;"><strong>every Wednesday and Sundays between 7 am to 12 pm.</strong></span></span></p>
                            <h3 class="mb-0 text-yellow">REF EARNING Balance: ₦{{ $user->affliate_ref_balance }}</h3>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('user.withdraw_ref_submit') }}" method="post" id="setting_form">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2 text-white">Amount</label>
                                    <div class="col-lg-10">
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend bg-secondary">
                                                <span class="input-group-text text-white bg-dark currency">₦</span>
                                            </div>
                                            <input type="number" step="any" name="amount" maxlength="10"
                                                class="form-control bg-dark text-white" placeholder="3000" required="">
                                        </div>
                                    </div>
                                </div>
                                @if ($errors->has('amount'))
                                    <span class="error form-error-msg ">
                                        {{ $errors->first('amount') }}
                                    </span>
                                @endif
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2 text-white">Pin</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="pin" class="form-control bg-dark text-white"
                                            placeholder="000000" required="">
                                        @if ($user->pin == '000000')
                                            <a href="{{ route('user.pin') }}">Click Here to Set Pin</a>
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
                                    <button type="submit" class="btn btn-secondary withdraw">Cashout REF Earnings to BANK</button>
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
                            <h3 class="mb-0 text-white">Earning Balance Withdrawal to BANK History</h3>
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
                                    @foreach ($withdraw as $k => $val)
                                        <tr>
                                            <td>{{ ++$k }}.</td>
                                            <td>₦{{ substr($val->amount, 0, 9) }}</td>
                                            <td>{{ $val->account_no }}</td>
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
