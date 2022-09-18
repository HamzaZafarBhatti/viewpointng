@extends('user.userlayout')

@section('content')
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="content-wrapper">
            {{-- @if ($ticket_replies)
                @foreach ($ticket_replies as $item)
                    @if (!$item->latest_replies->isEmpty())
                        <div class="row ticket_reply" data-id="{{ $item->ticket_id }}">
                            <div class="col-lg-12">
                                <div class="alert alert-success border-0 alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                                    <span class="font-weight-bold"><a
                                            href="{{ url('/') }}/user/reply-ticket/{{ $item->id }}">Ticket:
                                            {{ $item->ticket_id }}</a></span>
                                    <ul style="margin-bottom: 0;">
                                        @foreach ($item->latest_replies as $reply)
                                            <li>Message: {{ $reply->reply }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif --}}
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-6">
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
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card bg-dark border-0">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-muted mb-0 text-white">Sponsored Share Amount</h5>
                                            <span
                                                class="h2 font-weight-bold mb-0 text-yellow">{{ /* substr($user->profit, 0, 9) */0 }}</span>
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

            {{-- <div id="modal_payment_proof" class="modal fade {{ $user_proof ? 'show' : '' }}show" tabindex="-1" style="display: block;" aria-modal="true"
                aria-labelledby="modal-form" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body p-0">
                            <div class="card border-0 mb-0">
                                <div class="card-body px-lg-5 py-lg-5">
                                    <div class="text-left mt-2 mb-3">Congrats on your most RECENT PAYMENT on GOLDMINT</div>
                                    <div class="text-left">
                                        <button type="button" class="btn btn-link" data-dismiss="modal" onclick="close_modal()">Close</button>
                                        <a href="{{ route('upload.proof') }}" class="btn btn-neutral">Upload Payment Proof Now!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
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
