@extends('userlayout')

@section('content')
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="content-wrapper">
            @if ($ticket_replies)
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
            @endif
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card bg-dark border-0">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-muted mb-0 text-white">GOLDMINT Mobile Data</h5>
                                            <span
                                                class="h2 font-weight-bold mb-0 text-yellow">{{ substr($user->profit / 10, 0, strlen($user->profit / 10)) }}
                                                MB of Data</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card bg-dark border-0">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-muted mb-0 text-white">Referral Earnings</h5>
                                            <span
                                                class="h2 font-weight-bold mb-0 text-yellow">₦{{ substr($user->ref_bonus, 0, strlen($user->ref_bonus)) }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="">
                                @if ($set->upgrade_status == 1)
                                    @if ($user->upgrade == 0)
                                        <div class="card bg-dark shadow">
                                            <!-- Card header -->
                                            <div class="card-body">
                                                <div class="row align-items-center">
                                                    <div class="col-8">
                                                        <!-- Title -->
                                                        <h5 class="h4 mb-0 text-white">UPGRADE Your Mining Plan?</h5>
                                                    </div>
                                                </div>
                                                <p class="card-text mb-4 text-white">You can always increase your Mining
                                                    Power from the Upgrade Page at anytime by changing your Plan. Mine All
                                                    the GoldMint Coins as much as you want.</p>
                                                <a href="https://goldmintng.com/user/upgrade_plan"
                                                    class="btn btn-sm btn-neutral">Upgrade account</a>
                                                <div class="modal fade" id="modal-formx" tabindex="-1" role="dialog"
                                                    aria-labelledby="modal-form" aria-hidden="true">
                                                    <div class="modal-dialog modal- modal-dialog-centered modal-sm"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body p-0">
                                                                <div class="card border-0 mb-0">
                                                                    <div class="card-body px-lg-5 py-lg-5">
                                                                        <div class="text-left mt-2 mb-3">Don't let your
                                                                            money sit there, upgrade your account & start
                                                                            receiving bonuses</div>
                                                                        <div class="text-left mt-2 mb-3">Upgrade fee costs
                                                                            {{ $set->upgrade_fee }}BTC</div>
                                                                        <div class="text-left">
                                                                            <a href="{{ route('user.upgrade') }}"
                                                                                class="btn btn-neutral">Upgrade</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <p style="text-align: center;"><span style="background-color: #ffcc00;"><strong>Minimum Withdrawal Data</strong></span></p>
<table style="height: 90px; width: 100%; border-collapse: collapse;" border="3">
<tbody>
<tr style="height: 36px;">
<td style="width: 33.3333%; height: 36px;"><strong>PLAN</strong></td>
<td style="width: 16.6666%; text-align: center; height: 36px;"><strong>MINE BALANCE<br /></strong></td>
<td style="width: 16.6666%; text-align: center; height: 36px;"><strong>Mobile Data <br /></strong></td>
<td style="width: 16.6666%; text-align: center; height: 36px;"><strong>REFERRAL Earnings <br /></strong></td>
</tr>
<tr style="height: 18px;">
<td style="width: 33.3333%; height: 18px;"><strong>MINERED</strong></td>
<td style="width: 16.6666%; height: 18px; text-align: center;">20K GMC</td>
<td style="width: 16.6666%; height: 18px; text-align: center;">500MB</td>
<td style="width: 16.6666%; height: 18px; text-align: center;">₦5000</td>
</tr>
<tr style="height: 18px;">
<td style="width: 33.3333%; height: 18px;"><strong>DRAGONMINT</strong></td>
<td style="width: 16.6666%; height: 18px; text-align: center;">40K GMC</td>
<td style="width: 16.6666%; height: 18px; text-align: center;">500MB</td>
<td style="width: 16.6666%; height: 18px; text-align: center;">₦5000</td>
</tr>
<tr style="height: 18px;">
<td style="width: 33.3333%; height: 18px;"><strong>PANGOLIN</strong></td>
<td style="width: 16.6666%; height: 18px; text-align: center;">60K GMC</td>
<td style="width: 16.6666%; height: 18px; text-align: center;">500MB</td>
<td style="width: 16.6666%; height: 18px; text-align: center;">₦5000</td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
<p style="text-align: center;"><strong><span style="background-color: #ffcc00;">GOLDMINT Cashouts Timeline</span></strong></p>
<table style="width: 100%; border-collapse: collapse; border-style: solid; margin-left: auto; margin-right: auto; height: 72px;" border="3">
<tbody>
<tr style="height: 54px;">
<td style="width: 12.5%; text-align: center;">
<p><strong>MINE </strong><strong>SELF-CASHOUT</strong></p>
</td>
<td style="width: 12.5%; text-align: center; height: 54px;"><strong>MINE BALANCE<br /></strong></td>
<td style="width: 25%; text-align: center; height: 54px;"><strong>REFERRAL EARNING</strong></td>
<td style="width: 25%; text-align: center; height: 54px;">
<p><strong>GOLDMINT Mobile Data<br /></strong></p>
</td>
</tr>
<tr style="height: 18px;">
<td style="width: 12.5%; text-align: center;"><span style="color: #008000;">Daily Cashout</span></td>
<td style="width: 12.5%; text-align: center; height: 18px;"><span style="color: #008000;">Monthly Cashout</span></td>
<td style="width: 25%; text-align: center; height: 18px;"><span style="color: #008000;">Daily Cashout</span></td>
<td style="width: 25%; text-align: center; height: 18px;"><span style="color: #008000;">Monthly Data
</span></td>
</tr>
</tbody>
</table><br>
                                    @endif
                                @endif

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card bg-dark border-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h3 class="card-title mb-0 text-white">2fa security</h3>
                                            <span class="badge badge-pill badge-primary">
                                                @if ($user->fa_status == 0)
                                                    Disabled
                                                @else
                                                    Active
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card bg-dark">
                                <!-- Card header -->
                                <div class="card-header bg-transparent">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <!-- Surtitle -->
                                            <h6 class="surtitle text-yellow">Last 5 mining operations</h6>
                                            <!-- Title -->
                                            <h5 class="h3 mb-0 text-white">Progress track</h5>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card body -->
                                <div class="card-body">
                                    <!-- List group -->
                                    <ul class="list-group list-group-flush list my--3">
                                        @foreach ($profit as $k => $val)
                                            <li class="list-group-item px-0 bg-dark">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <h5 class="text-white">Hash: {{ $val->trx }} <span
                                                                class="text-yellow">@
                                                                {{ $val->plan->hashrate }}</span>
                                                        </h5>
                                                        @php
                                                            if ($val->amount < 1) {
                                                                $val->amount = 1;
                                                            }
                                                        @endphp
                                                        <div class="progress progress-xs mb-0">
                                                            <div class="progress-bar bg-yellow" role="progressbar"
                                                                aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                                                style="width: {{ ($val->profit * 100) / $val->amount > 0 }}%;">
                                                            </div>
                                            </li>
                                        @endforeach
                                    </ul>
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
                                                class="h2 font-weight-bold mb-0 text-yellow">{{ substr($user->profit, 0, 9) }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    @if ($set->kyc == 1)
                        <div class="card bg-dark">
                            <!-- Card image -->
                            <!-- List group -->
                            <!-- Card body -->
                            <div class="card-body">
                                <h3 class="card-title mb-3 text-white">Identity verification</h3>
                                <p class="card-text mb-4 text-white">Upload an identity document, for example, driver
                                    licence, voters card, international passport, national ID.</p>
                                <span class="badge badge-pill text-yellow">
                                    @if ($user->kyc_status == 0)
                                        Unverified
                                    @else
                                        Verified
                                    @endif
                                </span>

                                @if (empty($user->kyc_link))
                                    <div class="row align-items-center">
                                        <div class="col-12 text-right">
                                            <a href="{{ route('user.profile') }}#kyc"
                                                class="btn btn-sm btn-neutral">Upload</a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
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
                    $('.ticket_reply .close').click(function() {
                        var ticket_id = $(this).parents('.ticket_reply').attr('data-id');
                        $.ajax({
                            url: '{{ route('user.message_seen') }}',
                            method: 'get',
                            data: {
                                ticket_id: ticket_id
                            },
                            success: function(response) {

                            }
                        })
                    })
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
