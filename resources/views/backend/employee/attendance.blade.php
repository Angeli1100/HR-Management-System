@extends('backend.layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6">
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employees as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->employeeName }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <a href="{{ route('backend.employee.generateLink') }}" class="btn btn-sm btn-info" id="generatelink">Generate Attendance Link</a>
        @isset($link)
            <p>Generated Link: {{ $link }}</p>
        @endisset
    </div>
</div>
@endsection
