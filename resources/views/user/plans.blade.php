@extends('userlayout')

@section('css')
    <style>
        .activate {
            text-align: center;
        }

        .activate i {
            cursor: pointer;
        }

        .activate i.disabled {
            opacity: 0.5;
            cursor: not-allowed;
            pointer-events: none;
        }

        .deadline {
            display: none;
            justify-content: center;
        }

        .deadline-format {
            background: var(--clr-grey-1);
            color: var(--clr-white);
            margin-right: 1rem;
            width: 5rem;
            height: 5rem;
            display: grid;
            place-items: center;
            text-align: center;
        }

        .deadline-format span {
            display: block;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 0.85rem;
        }

        .deadline h4:not(.expired) {
            font-size: 2rem;
            margin-bottom: 0.25rem;
            letter-spacing: var(--spacing);
        }

    </style>
@endsection

@section('content')
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="card bg-dark">
                        <div class="card-header header-elements-inline bg-transparent">
                            <h3 class="mb-0 text-white">GoldMint Coin Mining Machine</h3>
                            <p><span style="color: #ffcc00;"><strong>TURN ON the Mining Machine to START MINING GoldMint Coins</strong></span></p>
<p><span style="color: #ffffff;"><strong>GoldMint Coin Price (GMC):</strong> <strong><span style="background-color: #ffcc00;"><span style="color: #000000;">{{$user_plan->convert_rate}} GMC = ₦1 </span><br /></span></strong></span></p>
<p><span style="color: #ffffff;">Upon completion of MINING, the GoldCoins would be automatically converted to GMC Coin and then, during requests to your Bank, it'll be exchanged and sold back for you to get it in NAIRA equivalent from your MINE BALANCE</span></p>
                        </div>
                        <div class="card-body">
                            <div class="activate">
                                <i class="fas fa-power-off fa-10x"></i>
                                <div class="deadline">
                                    <div class="deadline-format">
                                        <div>
                                            <h4 class="hours"></h4>
                                            <span>hours</span>
                                        </div>
                                    </div>
                                    <div class="deadline-format">
                                        <div>
                                            <h4 class="minutes"></h4>
                                            <span>mins</span>
                                        </div>
                                    </div>
                                    <div class="deadline-format">
                                        <div>
                                            <h4 class="seconds"></h4>
                                            <span>secs</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="earnings">
                <div class="col-md-12">
                    <div class="card bg-dark">
                        <div class="card-header header-elements-inline bg-transparent">
                            <h3 class="mb-0 text-white">Mining History</h3>
                        </div>
                        <div class="table-responsive py-4">
                            <table class="table table-flush table-dark" id="datatable-basic">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>S/N</th>
                                        <th>Mine Hash</th>
                                        <th>Mine Plan</th>
                                        <th>Mine Balance</th>
                                        {{-- <th>Daily percent</th> --}}
                                        <th>Mine Profit</th>
                                        <th>Started</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($profit as $k => $val)
                                        <tr>
                                            <td>{{ ++$k }}.</td>
                                            <td>{{ $val->trx }}</td>
                                            <td>{{ $val->plan->name }}</td>
                                            <td>{{ substr($val->amount, 0, 9) }}GMC</td>
                                            {{-- <td>{{ $val->plan->percent }}%</td> --}}
                                            <td>{{ $val->profit }}GMC</td>
                                            <td>{{ timeAgo($val->date) }}</td>
                                            <td>
                                                @if ($val->status == 0)
                                                    <span class="badge badge-success"><img src="https://goldmintng.com/asset/global_assets/mining/Gear-0.5s-1950px.gif" alt="" width="20" height="20" /> Mining...</span>
                                                @else
                                                    <span class="badge badge-primary">Mine Completed</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <input type="hidden" id="mine_status" value="{{ $latest_mine ? $latest_mine->status : null }}"> --}}
    <input type="hidden" id="mine_end_date"
        value="{{ $latest_mine ? \Carbon\Carbon::parse($latest_mine->end_date) : null }}">
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
        const activate = document.querySelector('.activate i')
        const deadline = document.querySelector(".deadline");
        const items = document.querySelectorAll(".deadline-format h4");
        let countdown;
        var futureDate;
        var futureTime;
        // var mineStatus = document.getElementById('mine_status').value;
        var endDate = document.getElementById('mine_end_date').value;
        var futureDateUTC = new Date(Date.UTC(endDate.slice(0, 4), endDate.slice(5, 7)-1, endDate.slice(8, 10), endDate.slice(11, 13), endDate.slice(14, 16), endDate.slice(17, 19)));
        var now = new Date()
        // console.log(mineStatus);
        // console.log(futureDateUTC);
        // console.log(now);
        console.log(futureDateUTC < now);
        if (futureDateUTC > now) {
            $('.activate i').addClass('disabled')
            futureDate = futureDateUTC
            futureTime = futureDate.getTime();
            // console.log(futureDate);
            $('.deadline').css('display', 'flex');
            startCountdown();
        }


        activate.addEventListener('click', function() {
            $.ajax({
                url: '{{ route('user.startMine') }}',
                method: 'get',
                success: function(response) {
                    // console.log(response)
                    // $('.deadline').css('display', 'flex');
                    // $(this).addClass('disabled');
                    // futureDate = new Date(Date.now() + .0025 * (60 * 60 * 1000));
                    // futureDate = new Date(Date.now() + 1 * (60 * 60 * 1000));
                    // futureTime = futureDate.getTime();
                    // console.log(futureDate);
                    // console.log(futureTime);
                    // startCountdown();
                    if(response.status == 1) {
                        location.reload()
                    } else {
                        alert('MINING already in progress!')
                    }
                }
            })
        })

        function getRemainingTime() {
            const today = new Date().getTime();
            const t = futureTime - today;

            const oneDay = 24 * 60 * 60 * 1000;
            const oneHour = 60 * 60 * 1000;
            const oneMinute = 60 * 1000;

            let hours = Math.floor((t % oneDay) / oneHour);
            let minutes = Math.floor((t % oneHour) / oneMinute);
            let seconds = Math.floor((t % oneMinute) / 1000);

            const values = [hours, minutes, seconds];

            function format(value) {
                if (value < 10) {
                    return (value = `0${value}`);
                }
                return value;
            }

            items.forEach(function(item, index) {
                item.innerHTML = format(values[index]);
            });
            if (t < 0) {
                // console.log('finished');
                clearInterval(countdown);
                $('.deadline').css('display', 'none');
                $('.activate i').removeClass('disabled');
                now = new Date();
                if(futureDateUTC < now) {
                //     $.ajax({
                //         url: '{{ route('user.endMine') }}',
                //         method: 'get',
                //         success: function(response) {
                //             console.log(response)
                setTimeout(function() {
                    location.reload();
                }, 10000);
                //         }
                //     })
                }
            }
        }


        function startCountdown() {
            countdown = setInterval(function() {
                getRemainingTime()
            }, 1000);
            getRemainingTime();
        }
    </script>
@endsection
