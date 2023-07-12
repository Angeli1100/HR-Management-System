@extends('backend.layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6">
        <!-- Check-In Section -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Check-In</h3>
            </div>
            <div class="card-body text-center">
                <h4>Click here to check in.</h4>
                @isset($link)
                <form action="{{ URL::to('check-in/{link}') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-primary btn-lg">Check In</button>
                </form>
                @endisset
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <div class="col-md-6">
        <!-- Check-Out Section -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Check-Out</h3>
            </div>
            <div class="card-body text-center">
                <h4>Click here to check out.</h4>
                @isset($link)
                <form action="{{ URL::to('check-out/{link}') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-lg">Check Out</button>
                </form>
                @endisset
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <div class="col-md-12">
        <!-- Attendance Records -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Attendance Records</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($attendances as $record)
                        <tr>
                            <td>{{ $record->date }}</td>
                            <td>{{ $record->check_in }}</td>
                            <td>{{ $record->check_out }}</td>
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
