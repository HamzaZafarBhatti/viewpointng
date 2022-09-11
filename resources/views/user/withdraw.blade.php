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
                            <h3 class="mb-0 text-yellow">Withdraw to Bank</h3>
                            <p><span style="color: #ffffff;"><strong>GoldMint Withdrawal</strong></span></p>
                            <p><span style="color: #ffffff;">Withdrawal is automatically PAID To your Bank account after
                                    each Request.</span></p>
                            <p><span style="color: #ffffff;">You can request your GOLDMINT MINE Balance and Referral Earnings. If you wish to withdraw your GOLDMINT Sponsored Task Earnings which is automatically converted to your GOLDMINT Mobile Data, Go to the GOLDMINT Mobile Data Withdrawal page.</span></p>
                            <p><span style="color: #ffffff;">AVAILABLE AMOUNT TO WITHDRAW: <span
                                        style="color: #ffcc00;">MINE BALANCE: {{ substr($user->balance, 0, 9) }}GMC <small style="font-weight: bold">({{$user_plan->convert_rate}} GMC (GOLDMINT COIN) = 1 NGN)</small></span> | <span style="color: #ffcc00;">Referral
                                        Earnings: ₦{{ substr($user->ref_bonus, 0, 6) }}</span></span></p>
                          
                              <p>
                                <span style="color: #ffffff;">WITHDRAWAL START TIME (MINE BALANCE, MOBILE DATA BALANCE): </span>
                                <span style="color: #ffcc00;">{{ \Carbon\Carbon::parse($set->withdraw_start)->format('l jS \\of F Y h:i:s A') }}</span>
                            </p>
                            <p>
                                <span style="color: #ffffff;">WITHDRAWAL END TIME (MINE BALANCE, MOBILE DATA BALANCE): </span>
                                <span style="color: #ffcc00;">{{ \Carbon\Carbon::parse($set->withdraw_end)->format('l jS \\of F Y h:i:s A') }}</span>
                            </p>  
                        </div>

                        <div class="card-body">
                            <form action="{{ route('withdraw.submit') }}" method="post" id="setting_form">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2 text-white">Withdraw type</label>
                                    <div class="col-lg-10">
                                        <select class="form-control select bg-dark text-white" name="type" id="type"
                                            required>
                                            <option value="2">MINE Balance</option>
                                            <option value="3">Referral Earnings</option>
                                        </select>
                                    </div>
                                </div>
                                @if ($errors->has('type'))
                                    <span class="error form-error-msg ">
                                        {{ $errors->first('type') }}
                                    </span>
                                @endif
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2 text-white">Amount</label>
                                    <div class="col-lg-10">
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend bg-secondary">
                                                <span class="input-group-text text-white bg-dark currency">GMC</span>
                                            </div>
                                            <input type="number" step="any" name="amount" maxlength="10"
                                                class="form-control bg-dark text-white" placeholder="10000" required="">
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
                                    <button type="submit" class="btn btn-secondary withdraw">Withdraw to BANK</button>
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
                            <h3 class="mb-0 text-white">Withdrawal to BANK History</h3>
                        </div>
                        <div class="table-responsive py-4">
                            <table class="table table-flush table-dark" id="datatable-buttons">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>S/n</th>
                                        <th>Amount</th>
                                        <th>Bank Account</th>
                                        <th>Status</th>
                                        <th>Withdrawal Type</th>
                                        <th>Created</th>
                                        <th>Updated</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($withdraw as $k => $val)
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
                                            <td>
                                                @if ($val->type == 1)
                                                    <span class="badge badge-info">GoldMint Profit</span>
                                                @elseif($val->type == 2)
                                                    <span class="badge badge-info">Mine balance</span>
                                                @elseif($val->type == 3)
                                                    <span class="badge badge-info">Referral Earning</span>
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
                var type = document.getElementById('type')
                type.addEventListener('change', function() {
                    var value = this.value;
                    console.log(value);
                    if(value == 3) {
                        $('.currency').html('₦');
                    } else {
                        $('.currency').html('GMC');
                    }
                })
                $('.withdraw').click(function(e) {
                    e.preventDefault();
                    var form = document.getElementById('setting_form')
                    var type = document.getElementById('type').value
                    console.log(type)
                    if (type == 3) {
                        form.submit()
                    } else {
                        var now = new Date();
                        var withdrawStart = new Date('{{ $set->withdraw_start }}');
                        var withdrawEnd = new Date('{{ $set->withdraw_end }}');
                        console.log(now > withdrawStart, now < withdrawEnd)
                        if (now > withdrawStart && now < withdrawEnd) {
                            form.submit()
                        } else {
                            swal("WITHDRAWAL STATUS", "Not Eligible For Withdrawal - Date not reach", "error");
                        }
                    }
                })
            })
        </script>
    @endsection
