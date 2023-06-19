@extends('backend.layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daily Attendance Record</h3>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <div class="btn-group mr-2">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Filter by Month
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('attendance.filter', ['month' => '01']) }}">January</a>
                            <a class="dropdown-item" href="{{ route('attendance.filter', ['month' => '02']) }}">February</a>
                            <a class="dropdown-item" href="{{ route('attendance.filter', ['month' => '03']) }}">March</a>
                            <a class="dropdown-item" href="{{ route('attendance.filter', ['month' => '04']) }}">April</a>
                            <a class="dropdown-item" href="{{ route('attendance.filter', ['month' => '05']) }}">May</a>
                            <a class="dropdown-item" href="{{ route('attendance.filter', ['month' => '06']) }}">June</a>
                            <a class="dropdown-item" href="{{ route('attendance.filter', ['month' => '07']) }}">July</a>
                            <a class="dropdown-item" href="{{ route('attendance.filter', ['month' => '08']) }}">August</a>
                            <a class="dropdown-item" href="{{ route('attendance.filter', ['month' => '09']) }}">September</a>
                            <a class="dropdown-item" href="{{ route('attendance.filter', ['month' => '10']) }}">October</a>
                            <a class="dropdown-item" href="{{ route('attendance.filter', ['month' => '11']) }}">November</a>
                            <a class="dropdown-item" href="{{ route('attendance.filter', ['month' => '12']) }}">December</a>
                            <!-- Add the remaining month links -->
                        </div>
                    </div>
                    <div class="btn-group mr-2">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Filter by Year
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('attendance.year', ['year' => '2022']) }}">2022</a>
                            <a class="dropdown-item" href="{{ route('attendance.year', ['year' => '2023']) }}">2023</a>
                            <a class="dropdown-item" href="{{ route('attendance.year', ['year' => '2024']) }}">2024</a>
                            <a class="dropdown-item" href="{{ route('attendance.year', ['year' => '2025']) }}">2025</a>
                            <a class="dropdown-item" href="{{ route('attendance.year', ['year' => '2026']) }}">2026</a>
                            <a class="dropdown-item" href="{{ route('attendance.year', ['year' => '2027']) }}">2027</a>
                            <a class="dropdown-item" href="{{ route('attendance.year', ['year' => '2028']) }}">2028</a>
                            <a class="dropdown-item" href="{{ route('attendance.year', ['year' => '2029']) }}">2029</a>
                            <a class="dropdown-item" href="{{ route('attendance.year', ['year' => '2030']) }}">2030</a>
                            <!-- Add the remaining year links -->
                        </div>
                    </div>
                    <div class="btn-group">
                    <a href="{{ route('backend.employee.addEmployeeAttendance') }}" class="btn btn-primary">                          
                          Add Employee Attendance
                        </a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Date</th>
                                <th>Employee ID</th>
                                <th>Employee Name</th>
                                <th>Check In</th>
                                <th>Check Out</th>
                                <th>Attendance Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($attendances as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->date }}</td>
                                <td>{{ $row->userID }}</td>
                                <td>{{ $row->employeeName }}</td>
                                <td>{{ $row->check_in }}</td>
                                <td>{{ $row->check_out }}</td>
                                <td>{{ $row->status }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
            <div class="btn-group mt-3">
                <a href="{{ route('backend.employee.generate_link') }}" class="btn btn-info mr-1" id="generateLink">Generate Attendance Link</a>
                <a href="{{ route('backend.employee.deactivate_link') }}" class="btn btn-info mr-1" id="deactivateLink">Deactivate Link</a>
                <a href="{{ route('generate_pdf', ['url' => Request::fullUrl()]) }}" class="btn btn-info" id="generatePDF">Generate Report</a>
            </div>
                @isset($link)
                <p>Generated Link: {{ $link }}</p>
                @endisset
            </div>
        </div>
    </div>
</div>
@endsection
