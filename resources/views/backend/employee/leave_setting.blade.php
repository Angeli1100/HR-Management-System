@extends('backend.layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6">
        <!-- Profile Information -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Leave Setting</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('leave_setting.update') }}">
                    @csrf
                    <div class="form-group">
                        <label for="employee">Employee:</label>
                        <select class="form-control" id="employee" name="employee_id">
                            <!-- Populate the dropdown list with employee names -->
                            @foreach($leave as $row)
                                <option value="{{ $row->employee_id }}">{{ $row->employeeName }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="annual_quota">Annual Leave Quota:</label>
                        <input type="number" class="form-control" id="annual_quota" name="annual_quota" min="0">
                    </div>
                    <div class="form-group">
                        <label for="emergency_quota">Emergency Leave Quota:</label>
                        <input type="number" class="form-control" id="emergency_quota" name="emergency_quota" min="0">
                    </div>
                    <div class="form-group">
                        <label for="hospitality_quota">Hospitality Leave Quota:</label>
                        <input type="number" class="form-control" id="hospitality_quota" name="hospitality_quota" min="0">
                    </div>
                    <div class="form-group">
                        <label for="paidLeave_quota">Paid Leave Quota:</label>
                        <input type="number" class="form-control" id="paid_leave_quota" name="paidLeave_quota" min="0">
                    </div>
                    <button type="submit" class="btn btn-primary">Set Quota</button>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection
