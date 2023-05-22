@extends('backend.layouts.app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header info">
                <h3 class="card-title">Payroll</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('payroll.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="employeeId">Employee ID</label>
                        <input type="text" name="employeeId" id="employeeId" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="employeeName">Employee Name</label>
                        <input type="text" name="employeeName" id="employeeName" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="contactNumber">Contact Number</label>
                        <input type="text" name="contactNumber" id="contactNumber" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="contactNumber">Contact Number</label>
                        <input type="text" name="contactNumber" id="contactNumber" class="form-control" required>
                    </div><div class="form-group">
                        <label for="contactNumber">Contact Number</label>
                        <input type="text" name="contactNumber" id="contactNumber" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
