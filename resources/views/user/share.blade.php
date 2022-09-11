@extends('userlayout')

@section('content')
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card bg-dark">
                        <div class="card-body">
                            <h3 class="text-yellow">Transfer GOLDMINT MINE</h3>
                            <a data-toggle="modal" data-target="#modal-formx" href="" class="btn btn-sm btn-neutral"><i
                                    class="fa fa-arrow-right"></i> Create Transfer Request</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="modal fade" id="modal-formx" tabindex="-1" role="dialog" aria-labelledby="modal-form"
                    aria-hidden="true">
                    <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-body p-0">
                                <div class="card bg-white border-0 mb-0">
                                    <div class="card-body px-lg-5 py-lg-5">
                                        <form action="{{ route('share.submit') }}" method="post" id="modal-details">
                                            @csrf
                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-2">Amount</label>
                                                <div class="col-lg-10">
                                                    <div class="input-group input-group-merge">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">GMC</span>
                                                        </div>
                                                        <input type="number" step="any" id="amount" name="amount" maxlength="10"
                                                            class="form-control" required="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-2">Username</label>
                                                <div class="col-lg-10">
                                                    <input type="text" name="username" id="username" class="form-control" required="">
                                                </div>
                                            </div>
                                            <div class="text-right">
                                                <a href="#" data-toggle="modal" data-target="#modal-form"
                                                    class="btn btn-primary">Send<i class="icon-paperplane ml-2"></i></a>
                                            </div>
                                            <div class="modal fade" id="modal-form" tabindex="-1" role="dialog"
                                                aria-labelledby="modal-form" aria-hidden="true">
                                                <div class="modal-dialog modal- modal-dialog-centered modal-sm"
                                                    role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body p-0">
                                                            <div class="card border-0 mb-0">
                                                                <div class="card-body px-lg-5 py-lg-5">
                                                                    <div class="text-dark text-center mt-2 mb-3">Enter PIN
                                                                        Code</div>
                                                                    <div class="form-group">
                                                                        <div
                                                                            class="input-group input-group-merge input-group-alternative">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text text-dark"><i
                                                                                        class="ni ni-lock-circle-open"></i></span>
                                                                            </div>
                                                                            <input class="form-control" placeholder="Pin" id="pin"
                                                                                type="pin" name="pin">
                                                                        </div>
                                                                    </div>
                                                                    <div class="text-right">
                                                                        <button type="submit"
                                                                            class="btn btn-primary pin_submit"
                                                                            form="modal-details">Submit</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($share as $k => $val)
                    <div class="col-md-4">
                        <div class="card bg-dark">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col ml--2">
                                        <h4 class="mb-0 text-success">
                                            Hash: #{{ $val->ref_id }}
                                        </h4>
                                        <p class="text-sm text-white mb-0">Sender: {{ $val->sender['username'] }}</p>
                                        <p class="text-sm text-white mb-0">Receiver: {{ $val->receiver['username'] }}</p>
                                        <p class="text-sm text-white mb-0">Mine Amount Sent:
                                            {{ substr($val->amount, 0, 9) }}GMC
                                        </p>
                                        <p class="text-sm text-white mb-0">Created:
                                            {{ date('Y/m/d h:i:A', strtotime($val->created_at)) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
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
                    $('.pin_submit').click(function(e) {
                        e.preventDefault();
                        var form = document.getElementById('modal-details')
                        // swal("Success!", "{{ session('success') }}", "success");
                        swal({
                                title: "Are you sure?",
                                text: "{{ $transfer_fee }}% Amount will be deducted from the transaction!",
                                icon: "warning",
                                buttons: true,
                                dangerMode: true,
                            })
                            .then((willDelete) => {
                                if (willDelete) {
                                    form.submit();
                                } else {
                                    $('#amount').val('');
                                    $('#username').val('');
                                    $('#pin').val('');
                                    $('#modal-form').modal('hide')
                                    $('#modal-formx').modal('hide')
                                }
                            });
                    })
                })
            </script>
        @endsection
