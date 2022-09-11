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
                            <h3 class="mb-0 text-yellow">Withdraw GOLDMINT Mobile Data to your Phone Number</h3>
                            <p><span style="color: #ffffff;"><strong>GOLDMINT Mobile DATA Withdrawal</strong></span></p>
                            <p><span style="color: #ffffff;">Withdrawal is of your GOLDMINT Mobile Data automatically
                                    processed to your Phone number after each Request.</span></p>
                            <p><span style="color: #ffffff;">You can request your GOLDMINT Mobile Data.</span></p>
                            <p><span style="color: #ffffff;">AVAILABLE MOBILE DATA TO BE PROCESSED:
                                    <span style="color: #ffcc00;">GOLDMINT Mobile DATA:
                                        {{ substr($user->profit / 10, 0, 9) }}MB</span></span></p>
                            <p>
                                <span style="color: #ffffff;">MOBILE DATA WITHDRAWAL START TIME: </span>
                                <span
                                    style="color: #ffcc00;">{{ \Carbon\Carbon::parse($set->withdraw_start)->format('l jS \\of F Y h:i:s A') }}</span>
                            </p>
                            <p>
                                <span style="color: #ffffff;">MOBILE DATA WITHDRAWAL END TIME: </span>
                                <span
                                    style="color: #ffcc00;">{{ \Carbon\Carbon::parse($set->withdraw_end)->format('l jS \\of F Y h:i:s A') }}</span>
                            </p>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('data_withdraw.submit') }}" method="post" id="setting_form">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2 text-white">Data</label>
                                    <div class="col-lg-10">
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend bg-secondary">
                                                <span class="input-group-text text-white bg-dark">MB</span>
                                            </div>
                                            <input type="number" step="any" name="amount" maxlength="4"
                                                class="form-control bg-dark text-white" value="500" required="" readonly>
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
                                    <label class="col-form-label col-lg-2 text-white">Phone Number</label>
                                    <div class="col-lg-10">
                                        <select name="details" id="details" class="form-control bg-dark text-white"
                                            required>
                                            <option value="">Choose Phone Number</option>
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
                                    <button type="submit" class="btn btn-secondary withdraw">Withdraw to Phone
                                        Number</button>
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
                            <h3 class="mb-0 text-white">Withdrawal to Phone Number History</h3>
                        </div>
                        <div class="table-responsive py-4">
                            <table class="table table-flush table-dark" id="datatable-buttons">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>S/n</th>
                                        <th>Amount</th>
                                        <th>Phone Number</th>
                                        <th>Status</th>
                                        <th>Created</th>
                                        <th>Updated</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_withdraw as $k => $val)
                                        <tr>
                                            <td>{{ ++$k }}.</td>
                                            <td>{{ substr($val->amount / 10, 0, 9) }} MB</td>
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
                $('.withdraw').click(function(e) {
                    e.preventDefault();
                    var form = document.getElementById('setting_form')
                    var now = new Date();
                    var withdrawStart = new Date('{{ $set->withdraw_start }}');
                    var withdrawEnd = new Date('{{ $set->withdraw_end }}');
                    console.log(now > withdrawStart, now < withdrawEnd)
                    if (now > withdrawStart && now < withdrawEnd) {
                        form.submit()
                    } else {
                        swal("WITHDRAWAL STATUS", "Not Eligible For Withdrawal - Date not reach", "error");
                    }
                })
            })
        </script>
    @endsection
