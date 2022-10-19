@extends('user.userlayout')

@section('content')
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-8">
                    <div class="card" id="edit">
                        <div class="card-header header-elements-inline">
                            <h3 class="mb-0">ViewPoint Account Information</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('user.profile.update_basic') }}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Name:</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="name" class="form-control"
                                            value="{{ $user->name }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Username:</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="username" class="form-control"
                                            value="{{ $user->username }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">E-Mail:</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="email" class="form-control"
                                            value="{{ $user->email }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Mobile:</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="phone" class="form-control"
                                            value="{{ $user->phone }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Country:</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="country" class="form-control"
                                            value="{{ $user->country }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">City:</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="city" class="form-control"
                                            value="{{ $user->city }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Facebook Profile Link:</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="zip_code" class="form-control"
                                            value="{{ $user->zip_code }}">
                                    </div>
                                    <p>Update your <strong>FACEBOOK Profile Link</strong> for verification for withdrawal of your VIDEO VIRAL SHARE Payout.</p>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Address:</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="address" class="form-control"
                                            value="{{ $user->address }}">
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-neutral">Update<i
                                            class="icon-paperplane ml-2"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card" id="bank_details">
                        <div class="card-header header-elements-inline">
                            <h3 class="mb-0">Update Bank Account Information</h3>
                        </div>
                        
                        <div class="card-body">
                            <form action="{{ route('user.profile.update_bank') }}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Bank Name:</label>
                                    <div class="col-lg-10">
                                        <select name="bank_id" id="bank_id" class="form-control" required>
                                            <option value="">Select Bank Name</option>
                                            @if ($banks)
                                                @foreach ($banks as $bank)
                                                    <option value="{{ $bank->id }}"
                                                        {{ $user->bank_id == $bank->id ? 'selected' : '' }}>
                                                        {{ $bank->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Account Name:</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="account_name" class="form-control"
                                            value="{{ $user->bank_account_name }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Account Number:</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="account_no" class="form-control" id="account_no"
                                            value="{{ $user->bank_account_no }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Account Type:</label>
                                    <div class="col-lg-10">
                                        <select name="account_type" id="account_type" class="form-control" required>
                                            <option value="">Select Account Type</option>
                                            <option value="savings"
                                                {{ $user->bank_account_type == 'savings' ? 'selected' : '' }}>Savings</option>
                                            <option value="current"
                                                {{ $user->bank_account_type == 'current' ? 'selected' : '' }}>Current</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Pin</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="pin" class="form-control" placeholder="000000"
                                            required="">
                                        @if ($user->pin == '0000')
                                            <a href="{{ route('user.pin') }}">Click Here to Set Pin</a>
                                        @endif
                                    </div>
                                </div>
                                {{-- <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Pin:</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="pin" class="form-control" required>
                                    </div>
                                </div> --}}
                                {{-- @if ($user->account_name === '' || $user->account_name === null) --}}
                                <div class="text-right">
                                    <button type="submit" class="btn btn-neutral">Update Bank Account<i
                                            class="icon-paperplane ml-2"></i></button>
                                </div>
                                {{-- @endif --}}
                            </form>
                        </div>
                    </div>
                    {{-- <div class="card" id="data_details">
                        <div class="card-header header-elements-inline">
                            <h3 class="mb-0">Update Data Operator details</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('user/update_data_operator_details') }}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Phone Number:</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="phone_number" class="form-control"
                                            value="{{ $user->phone_number }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Data Operator Name:</label>
                                    <div class="col-lg-10">
                                        <select name="data_operator_id" id="data_operator_id" class="form-control"
                                            required>
                                            <option value="">Select Data Operator Name</option>
                                            @if ($data_operators)
                                                @foreach ($data_operators as $data_operator)
                                                    <option value="{{ $data_operator->id }}"
                                                        {{ $user->data_operator_id == $data_operator->id ? 'selected' : '' }}>
                                                        {{ $data_operator->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-neutral">Update Data Operator Account<i
                                            class="icon-paperplane ml-2"></i></button>
                                </div>
                            </form>
                        </div>
                    </div> --}}
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header header-elements-inline">
                            <h3 class="mb-0">Change Profile Photo</h3>
                        </div>

                        <div class="card-body">
                            <form action="{{ url('user/avatar') }}" enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFileLang"
                                            name="image" accept="image/*">
                                        <label class="custom-file-label" for="customFileLang">Select photo</label>
                                    </div>
                                    <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
                                    <span class="form-text text-muted">Accepted formats:png, jpg.</span>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-neutral">Upload<i
                                            class="icon-paperplane ml-2"></i></button>
                                </div>
                            </form>
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
                $('#account_no').on('input', function(event) {
                    setTimeout(function() {
                        $.ajax({})
                    }, 1000)
                })
            })
        </script>
    @endsection
