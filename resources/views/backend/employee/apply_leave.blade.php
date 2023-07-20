@extends('backend.layouts.app')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-primary">
      <div class="card-header info">
        <h3 class="card-title">Apply for Leave</h3>
      </div>
      <div class="card-body">
        <form action="{{ route('leave.store') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="form-group">
            <label for="select_leave">Leave Type</label>
            <select name="select_leave" id="select_leave" class="form-control">
              <option value="Annual Leave">Annual Leave</option>
              <option value="Emergency Leave">Emergency Leave</option>
              <option value="Hospitality Leave">Hospitality Leave</option>
              <option value="Paid Leav">Paid Leave</option>
            </select>
          </div>


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

          <div class="form-group">
            <label for="dateFrom">From:</label>
            <input type="date" name="dateFrom" id="dateFrom" class="form-control">
          </div>

          <div class="form-group">
            <label for="dateTo">To:</label>
            <input type="date" name="dateTo" id="dateTo" class="form-control">
          </div>

          <div class="form-group">
            <label for="file">Attach File</label>
            <input type="file" name="file" id="file" class="form-control-file">
          </div>

          <button type="submit" class="btn btn-primary">Apply</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
