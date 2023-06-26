@extends('backend.layouts.app')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-primary">
      <div class="card-header info">
        <h3 class="card-title">Apply for Leave</h3>
      </div>
      <div class="card-body">
        <form action="{{ route('leave.store') }}" method="POST">
          @csrf

          <div class="form-group">
            <label for="leave_type">Leave Type</label>
            <select name="leave_type" id="leave_type" class="form-control">
              <option value="annual_leave">Annual Leave</option>
              <option value="emergency_leave">Emergency Leave</option>
              <option value="hospitality_leave">Hospitality Leave</option>
              <option value="paid_leave">Paid Leave</option>
            </select>
          </div>

          <div class="form-group">
            <label for="duration">Duration (in days)</label>
            <input type="number" name="duration" id="duration" class="form-control">
          </div>

          <button type="submit" class="btn btn-primary">Apply</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
