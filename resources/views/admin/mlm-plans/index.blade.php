@extends('admin.master')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title font-weight-semibold">MLM Plans</h6>
                    </div>
                    <div class="">
                        <table class="table datatable-show-all">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Duration</th>
                                    <th>Status</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($plans as $k => $val)
                                    <tr>
                                        <td>{{ ++$k }}.</td>
                                        <td><img src="{{ url('/') }}/asset/images/{{ $val->image }}" style="height: auto; max-width: 40%;"></td>
                                        <td>{{ $val->name }}</td>
                                        <td>{{ substr($val->amount, 0, 9) }}BTC</td>
                                        <td>{{ $val->active_period }}Month(s)</td>
                                        <td>
                                            @if ($val->status == 0)
                                                <span class="badge badge-danger">Disabled</span>
                                            @elseif($val->status == 1)
                                                <span class="badge badge-success">Active</span>
                                            @endif
                                        </td>
                                        <td>{{ date('Y/m/d h:i:A', strtotime($val->created_at)) }}</td>
                                        <td>{{ date('Y/m/d h:i:A', strtotime($val->updated_at)) }}</td>
                                        <td class="text-center">
                                            <div class="list-icons">
                                                <div class="dropdown">
                                                    <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                        <i class="icon-menu9"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class='dropdown-item'
                                                            href="{{ route('admin.mlm-plans.edit', $val->id) }}"><i
                                                                class="icon-pencil7 mr-2"></i>Edit</a>
                                                    </div>
                                                </div>
                                            </div>
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
@stop
