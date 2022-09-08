@extends('admin.master')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title font-weight-semibold">Edit</h6>
                    </div>
                    <div class="card-body">
                        <p class="text-danger"></p>
                        <form action="{{ route('admin.plans.update', $plan->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Name:</label>
                                <div class="col-lg-10">
                                    <input type="text" name="name" class="form-control" value="{{ $plan->name }}"
                                        reqiured>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Hourly percent:</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="number" step="any" name="percent" value="{{ $plan->percent }}"
                                            class="form-control">
                                        <span class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Amount:</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="number" step="any" name="amount" value="{{ $plan->amount }}"
                                            class="form-control">
                                        <span class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Upgrade:</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="number" step="any" name="upgrade" value="{{ $plan->upgrade }}"
                                            class="form-control">
                                        <span class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Duration:</label>
                                <div class="col-lg-10">
                                    <input type="number" name="duration" pattern="[0-9]+(\.[0-9]{0,2})?%?"
                                        value="{{ $plan->duration }}" class="form-control" placeholder="1" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Period:</label>
                                <div class="col-lg-10">
                                    <select class="form-control select" name="period" data-fouc required>
                                        <option value="day" @if ($plan->period == 'day') selected @endif>Day
                                        </option>
                                        <option value="week" @if ($plan->period == 'week') selected @endif>Week
                                        </option>
                                        <option value="month" @if ($plan->period == 'month') selected @endif>Month
                                        </option>
                                        <option value="year" @if ($plan->period == 'year') selected @endif>year
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Referral percent:</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="text" name="ref_percent" maxlength="10" placeholder="2.5"
                                            value="{{ $plan->ref_percent }}" class="form-control" required>
                                        <span class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Hashrate:</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="text" name="hashrate" placeholder="20Ph/s" class="form-control"
                                            value="{{ $plan->hashrate }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Viral share bonus:</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="text" name="viral_share_bonus" placeholder="400NGN"
                                            class="form-control" value="{{ $plan->viral_share_bonus }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">INDIRECT REFERRAL COMMISSION:</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="text" name="indirect_ref_com" placeholder="2.5" class="form-control"
                                            value="{{ $plan->indirect_ref_com }}" required>
                                        <span class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Minimum withdrawal for Viral Share earning:</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="text" name="min_viral_share_earning_wd" placeholder="200NGN"
                                            class="form-control" value="{{ $plan->min_viral_share_earning_wd }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Viral Share earning Withdraw CYCLE:</label>
                                <div class="col-lg-10">
                                    <select class="form-control select" name="min_viral_share_earning_wd_cycle" data-fouc required>
                                        <option value="1" @if ($plan->min_viral_share_earning_wd_cycle == '1') selected @endif>Daily
                                        </option>
                                        <option value="7" @if ($plan->min_viral_share_earning_wd_cycle == '7') selected @endif>Weekly
                                        </option>
                                        <option value="30" @if ($plan->min_viral_share_earning_wd_cycle == '30') selected @endif>Monthly
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Minimum Extraction Balance transfer to Rubic Wallet:</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="text" name="min_account_balance_wd" placeholder="200NGN"
                                            class="form-control" value="{{ $plan->min_account_balance_wd }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Extraction Balance transfer Cycle to Rubic Wallet:</label>
                                <div class="col-lg-10">
                                    <select class="form-control select" name="min_account_balance_wd_cycle" data-fouc required>
                                        <option value="1" @if ($plan->min_account_balance_wd_cycle == '1') selected @endif>Daily
                                        </option>
                                        <option value="7" @if ($plan->min_account_balance_wd_cycle == '7') selected @endif>Weekly
                                        </option>
                                        <option value="30" @if ($plan->min_account_balance_wd_cycle == '30') selected @endif>Monthly
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Minimum REFERRAL EARNINGS Transfer to Rubic Wallet:</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="text" name="min_ref_earn_wd" placeholder="200NGN"
                                            class="form-control" value="{{ $plan->min_ref_earn_wd }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">REFERRAL EARNINGS Transfer Cycle to Rubic Wallet:</label>
                                <div class="col-lg-10">
                                    <select class="form-control select" name="min_ref_earn_wd_cycle" data-fouc required>
                                        <option value="1" @if ($plan->min_ref_earn_wd_cycle == '1') selected @endif>Daily
                                        </option>
                                        <option value="7" @if ($plan->min_ref_earn_wd_cycle == '7') selected @endif>Weekly
                                        </option>
                                        <option value="30" @if ($plan->min_ref_earn_wd_cycle == '30') selected @endif>Monthly
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Minimum Balance for Rubic Wallet Withdrawal:</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="text" name="min_rubic_wallet_wd" placeholder="200NGN"
                                            class="form-control" value="{{ $plan->min_rubic_wallet_wd }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Rubic Wallet Withdrawal Cycle:</label>
                                <div class="col-lg-10">
                                    <select class="form-control select" name="min_rubic_wallet_wd_cycle" data-fouc required>
                                        <option value="1" @if ($plan->min_rubic_wallet_wd_cycle == '1') selected @endif>Daily
                                        </option>
                                        <option value="7" @if ($plan->min_rubic_wallet_wd_cycle == '7') selected @endif>Weekly
                                        </option>
                                        <option value="30" @if ($plan->min_rubic_wallet_wd_cycle == '30') selected @endif>Monthly
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Status:</label>
                                <div class="col-lg-10">
                                    <select class="form-control select" name="status">
                                        <option value="1" @if ($plan->status == 1) selected @endif>Active
                                        </option>
                                        <option value="0" @if ($plan->status == 0) selected @endif>Deactive
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Prefix:</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="text" name="code_prefix"
                                            class="form-control" value="{{ $plan->code_prefix }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Activation Code Length:</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="number" name="code_length"
                                            class="form-control" value="{{ $plan->code_length }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Mine Balance Convert Rate:</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="number" name="convert_rate"
                                            class="form-control" value="{{ $plan->convert_rate }}" step=".1" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Plan Active Period:</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="number" name="active_period"
                                            class="form-control" value="{{ $plan->active_period }}" step=".1" required>
                                            <span class="input-group-append">
                                                <span class="input-group-text">Months</span>
                                            </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Extraction Time:</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="number" name="extraction_plan_time"
                                            class="form-control" value="{{ $plan->extraction_plan_time }}" step="1" required>
                                            <span class="input-group-append">
                                                <span class="input-group-text">Hours</span>
                                            </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">EXTRACTION BALANCE Transfer Referral Limit:</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="number" name="extraction_transfer_downline_limit"
                                            class="form-control" step="1" value="{{ $plan->extraction_transfer_downline_limit }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">VIRAL SHARE Transfer Referral Limit:</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="number" name="viral_share_transfer_downline_limit"
                                            class="form-control" step="1" value="{{ $plan->viral_share_transfer_downline_limit }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Image:</label>
                                <div class="col-lg-10">
                                    <input type="file" name="image" class="form-input-styled" data-fouc>
                                    <span class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size
                                        1Mb</span>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn bg-dark">Submit<i
                                        class="icon-paperplane ml-2"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
