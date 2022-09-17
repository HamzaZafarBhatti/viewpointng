@extends('admin.master')

@section('content')

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title font-weight-semibold">Create</h6>
                    </div>
                    <div class="card-body">
                        <p class="text-danger"></p>
                        <form action="{{ route('admin.mlm-plans.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Name:</label>
                                <div class="col-lg-10">
                                    <input type="text" name="name" class="form-control" reqiured>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Account Balance:</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="number" step="any" name="amount_balance" class="form-control">
                                        <span class="input-group-append">
                                            <span class="input-group-text">NGN</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Minimum Account Balance Withdrawal:</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="number" step="any" name="min_withdraw_balance" class="form-control">
                                        <span class="input-group-append">
                                            <span class="input-group-text">NGN</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Status:</label>
                                <div class="col-lg-10">
                                    <select class="form-control select" name="status">
                                        <option value="1">Active
                                        </option>
                                        <option value="0">Deactive
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Number of Referral Earning to activate cycle cashout:</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="number" name="direct_ref_count_cashout" maxlength="10" placeholder="2.5"
                                            class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Number of Indirect Referral Earning to activate cycle cashout:</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="number" name="indirect_ref_count_cashout" maxlength="10" placeholder="2.5"
                                            class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Prefix:</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="text" name="code_prefix" class="form-control" maxlength="4" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Activation Code Length:</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="number" name="code_length" class="form-control" required>
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
