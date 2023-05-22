@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header info">
                    <h3 class="card-title">Payroll</h3>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Employee ID</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->employeeName }}</td>
                                    <td>{{ $row->position_employee }}</td>
                                    <td>
                                        <a href="{{ URL::to('/show_details/'.$row->id) }}" class="btn btn-sm btn-info middle-align" id="showDetails">View Details</a>
                                        <a href="{{ URL::to('delete_Health/'.$row->id) }}" class="btn btn-sm btn-danger middle-align" id="delete">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
