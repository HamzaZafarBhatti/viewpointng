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
                            <h3 class="mb-0 text-yellow">GET ACTIVATION CODE</h3>
                            {{-- <p><span style="color: #ffffff;"><strong>GoldMint Self Cashout</strong></span></p> --}}
                            <p><span style="color: #ffffff;">You can request use your GoldMint Mine Balance to get ACTIVATION CODE</span></p>
                            <p><span style="color: #ffffff;">Mine Balance:
                                {{ substr($user->balance, 0, 9) }}GMC</span></p>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('get_coupon_code.submit') }}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-3 text-white">Amount to get ACTIVATION CODE</label>
                                    <div class="col-lg-9">
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend bg-secondary">
                                                <span class="input-group-text text-white bg-dark">GMC</span>
                                            </div>
                                            <input type="number" step="any" maxlength="10" value="{{ $set->coupon_code_rate }}" readonly="readonly"
                                                class="form-control bg-dark text-white" placeholder="10000">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-3 text-white">Pin</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="pin" class="form-control bg-dark text-white" placeholder="0000" required="">
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
                                <div class="text-right">
                                    <button type="submit" class="btn btn-secondary">GET ACTIVATION CODE</button>
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
                            <h3 class="mb-0 text-white">My ACTIVATION CODES</h3>
                        </div>
                        <div class="table-responsive py-4">
                            <table class="table table-flush table-dark" id="datatable-buttons">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>S/n</th>
                                        <th>Activation code</th>
                                        <th>Plan name</th>
                                        <th>Status</th>
                                        <th>Referral username</th>
                                        <th>Created</th>
                                        <th>Updated</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($coupons as $k => $val)
                                        <tr>
                                            <td>{{ ++$k }}.</td>
                                            <td>{{$val->serial}}</td>
                                            <td>{{$val->plan ? $val->plan->name : 'N/A'}}</td>
                                            <td>
                                                @if($val->status=='inactive')
                                                    <span class="badge badge-danger">Disabled</span>
                                                @elseif($val->status=='active')
                                                    <span class="badge badge-success">Active</span> 
                                                @endif
                                            </td>  
                                            <td>{{ $val->user->username ?? 'N/A' }}</td>
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