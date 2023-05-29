@extends('backend.layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- Profile Information -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Profile Information</h3>
            </div>
            <div class="card-body">

                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Employee ID</th>
                            <th>Name</th> 
                            <th>Check In</th> 
                            <th>Check Out</th> 
                            <th>Date</th> 
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($attendances as $row)
                        <tr>
                            <td>{{ $row->userID }}</td>
                            <td>{{ $row->employeeName }}</td>
                            <td>{{ $row->check_in }}</td>
                            <td>{{ $row->check_out }}</td>
                            <td>{{ $row->date }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <a href="{{ route('backend.employee.generate_link') }}" class="btn btn-sm btn-info" id="generateLink">Generate Attendance Link</a>
        <a href="{{ route('backend.employee.deactivate_link') }}" class="btn btn-sm btn-info" id="deactivateLink">Deactivate Link</a> 
        @isset($link)
            <p>Generated Link: {{ $link }}</p>
        @endisset
    </div>
</div>
@endsection
