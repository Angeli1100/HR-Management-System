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
                            @foreach($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->employeeName }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="annual_qouta">Annual Leave Quota:</label>
                        <input type="number" class="form-control" id="annual_qouta" name="annual_qouta" min="0">
                    </div>
                    <div class="form-group">
                        <label for="emergency_qouta">Emergency Leave Quota:</label>
                        <input type="number" class="form-control" id="emergency_qouta" name="emergency_qouta" min="0">
                    </div>
                    <div class="form-group">
                        <label for="hospitality_qouta">Hospitality Leave Quota:</label>
                        <input type="number" class="form-control" id="hospitality_qouta" name="hospitality_qouta" min="0">
                    </div>
                    <div class="form-group">
                        <label for="paidLeave_qouta">Paid Leave Quota:</label>
                        <input type="number" class="form-control" id="paidLeave_qouta" name="paidLeave_qouta" min="0">
                    </div>
                    <button type="submit" class="btn btn-primary">Set Quota</button>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#employee').on('change', function() {
            var employeeId = $(this).val();

            // Make an AJAX request to retrieve employee data
            $.ajax({
                url: '/get-employee-data', // Replace with your route URL
                type: 'GET',
                data: {
                    employee_id: employeeId
                },
                success: function(response) {
                    // Update the form fields with the retrieved data
                    $('#annual_qouta').val(response.leave ? response.leave.annual_qouta : '');
                    $('#emergency_qouta').val(response.leave ? response.leave.emergency_qouta : '');
                    $('#hospitality_qouta').val(response.leave ? response.leave.hospitality_qouta : '');
                    $('#paidLeave_qouta').val(response.leave ? response.leave.paidLeave_qouta : '');
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>
@endsection
