@extends('user.userlayout')

@section('css')
    <style>
        .card-body h3 {
            font-size: 25px;
            color: white;
        }
        .card-body h4 {
            font-size: 20px;
            color: white;
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
                        <div class="card-body text-center">
                            <h3 class="mt-5"><span>Well Done!</span></h3>
                            <h4 class="text-uppercase mt-5">Affliate Earning has been added to your Affliate Balance</h4>
                            <p class="mx-auto text-muted w-50 mt-4">You can now START Affliate Earning again!</p>
                            <div class="mt-5 text-center">
                                <a class="btn btn-primary" href="{{ route('user.mining.page') }}">Back to
                                    Affliate Earning Machine</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
