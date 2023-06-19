@extends('backend.layouts.app')

@section('content')

<div class="card-body">
  <div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-8">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Add Employee Details</h3>
        </div>
        <div class="card-body">
          <form action="{{ route('backend.employee.storeEmployeeAttendance') }}" method="POST">
            @csrf

            <div class="form-group">
              <label for="link">Link Attendance</label>
              <input type="text" class="form-control" name="link" value="{{ $link->link }}" readonly>
            </div>

            <div class="form-group">
              <label for="userID">Employee User ID</label>
              <input type="text" name="userID" class="form-control @error('userID') is-invalid @enderror" id="userID" placeholder="Enter Employee User ID">
              @error('userID')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <!-- Additional form fields -->

            <div class="form-group">
              <label for="employeeName">Employee Name</label>
              <input type="text" name="employeeName" class="form-control @error('employeeName') is-invalid @enderror" id="employeeName" placeholder="Enter Employee Name">
              @error('employeeName')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <div class="form-group">
              <label for="check_in">Check In</label>
              <input type="time" name="check_in" class="form-control @error('check_in') is-invalid @enderror" id="check_in" placeholder="Enter Check In" required>
              @error('check_in')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <div class="form-group">
              <label for="check_out">Check Out</label>
              <input type="time" name="check_out" class="form-control @error('check_out') is-invalid @enderror" id="check_out" placeholder="Enter Check Out">
              @error('check_out')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <div class="form-group">
              <label for="date">Date</label>
              <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" id="date" placeholder="Enter Date">
              @error('date')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
