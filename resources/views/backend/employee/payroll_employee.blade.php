@extends('backend.layouts.app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header info">
                <h3 class="card-title">Payroll Status</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <p>{{ date('F j, Y') }}</p> <!-- Add this line to display the current date below the "Payroll Status" heading -->
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Employee ID</th>
                            <th>Name</th>
                            <th>Pay Date</th>
                            <th>Pay Period</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employee as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->employeeName }}</td>
                            <td>{{ $row->employeeName }}</td>
                            <td>{{ $row->employeeName }}</td>
                            <td>{{ $row->employeeName }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>

@endsection
