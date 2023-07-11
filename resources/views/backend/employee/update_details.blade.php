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
                <form role="form" action="{{ URL::to('/insert_employee/'.$employee->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-12 text-center">
                            <img src="{{asset('storage/'.$employee->insert_img) }}" width="20%" height="auto">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="id">Employee ID</label>
                            <input type="text" name="id" class="form-control" id="id" readonly value="{{ $employee->id }}">
                        </div>
                        <div class="col-md-6">
                            <label for="usersID">User ID</label>
                            <input type="text" name="usersID" class="form-control" id="usersID" readonly value="{{ $employee->usersID }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="employeeName">Full Name</label>
                            <input type="text" name="employeeName" class="form-control" id="employeeName" readonly value="{{ $employee->employeeName }}">
                        </div>
                        <div class="col-md-6">
                            <label for="gender_employee">Gender</label>
                            <input type="text" name="gender_employee" class="form-control" id="gender_employee" readonly value="{{ $employee->gender_employee }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="dob_employee">Date of Birth</label>
                            <input type="text" name="dob_employee" class="form-control" id="dob_employee" readonly value="{{ $employee->dob_employee }}">
                        </div>
                        <div class="col-md-6">
                            <label for="NRIC_employee">NRIC</label>
                            <input type="text" name="NRIC_employee" class="form-control" id="NRIC_employee" readonly value="{{ $employee->NRIC_employee }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="nationality_employee">Nationality</label>
                            <input type="text" name="nationality_employee" class="form-control" id="nationality_employee" readonly value="{{ $employee->nationality_employee }}">
                        </div>
                        <div class="col-md-6">
                            <label for="race_employee">Race</label>
                            <input type="text" name="race_employee" class="form-control" id="race_employee" readonly value="{{ $employee->race_employee }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="marital_employee">Marital</label>
                            <input type="text" name="marital_employee" class="form-control" id="marital_employee" readonly value="{{ $employee->marital_employee }}">
                        </div>
                        <div class="col-md-6">
                            <label for="children_employee">No. of Children</label>
                            <input type="text" name="children_employee" class="form-control" id="children_employee" readonly value="{{ $employee->children_employee }}">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <!-- My Profile -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Other Information</h3>
                <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
</div>
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="address">Address</label>
                        <input type="text" name="address" class="form-control" id="address" readonly value="{{ $employee->address }}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                    <label for="postcode">Postcode</label>
                        <input type="text" name="postcode" class="form-control" id="postcode" readonly value="{{ $employee->postcode }}">
                    </div>
                    <div class="col-md-6">
                    <label for="city">City</label>
                        <input type="text" name="city" class="form-control" id="city" readonly value="{{ $employee->city }}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                    <label for="state">State</label>
                        <input type="text" name="state" class="form-control" id="state" readonly value="{{ $employee->state }}">
                    </div>
                    <div class="col-md-6">
                    <label for="country">Country</label>
                        <input type="text" name="country" class="form-control" id="country" readonly value="{{ $employee->country }}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                    <label for="contact_no">Contact No.</label>
                        <input type="text" name="contact_no" class="form-control" id="contact_no" readonly value="{{ $employee->contact_no }}">
                    </div>
                    <div class="col-md-6">
                        <label for="hp_no">Handphone No.</label>
                        <input type="text" name="hp_no" class="form-control" id="hp_no" readonly value="{{ $employee->hp_no }}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                    <label for="emergency_name">Emergency Name</label>
                        <input type="text" name="emergency_name" class="form-control" id="emergency_name" readonly value="{{ $employee->emergency_name }}">
                    </div>
                    <div class="col-md-6">
                        <label for="emergency_employee">Emergency No.</label>
                        <input type="text" name="emergency_employee" class="form-control" id="emergency_employee" readonly value="{{ $employee->emergency_employee }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <!-- Additional Layout -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Employee Profile</h3>
            </div>
            <div class="card-body">
                <!-- Add your additional content here -->
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="position_employee">Designation</label>
                        <input type="text" name="position_employee" class="form-control" id="position_employee" readonly value="{{ $employee->position_employee }}">
                    </div>
                    <div class="col-md-12">
                        <label for="date">Date of Commencement</label>
                        <input type="text" name="date" class="form-control" id="date" readonly value="{{ $employee->date }}">
                    </div>
                    <div class="col-md-12">
                        <label for="bank_name">Bank Account Name</label>
                        <input type="text" name="bank_name" class="form-control" id="bank_name" readonly value="{{ $employee->bank_name }}">
                    </div>
                    <div class="col-md-12">
                        <label for="acc_number">Bank Account No.</label>
                        <input type="text" name="acc_number" class="form-control" id="acc_number" readonly value="{{ $employee->acc_number }}">
                    </div>
                    <div class="col-md-12">
                        <label for="remarks">Remark</label>
                        <input type="text" name="remarks" class="form-control" id="remarks" readonly value="{{ $employee->remarks }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <!-- Additional Layout -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Health Record</h3>
            </div>
            <div class="card-body">
                <!-- Add your additional content here -->
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="medical_employee">Medical Status</label>
                        <input type="text" name="medical_employee" class="form-control" id="medical_employee" readonly value="{{ $employee->medical_employee }}">
                    </div>
                    <div class="col-md-12">
                        <label for="Vaccination">Vaccination Status</label>
                        <input type="text" name="Vaccination" class="form-control" id="Vaccination" readonly value="{{ $employee->Vaccination }}">
                    </div>
                    <div class="col-md-12">
                        <label for="oku">OKU Status</label>
                        <input type="text" name="oku" class="form-control" id="oku" readonly value="{{ $employee->oku }}">
                    </div>
                    <div class="col-md-12">
                        <label for="crime_employee">Past Crime Record</label>
                        <input type="text" name="crime_employee" class="form-control" id="crime_employee" readonly value="{{ $employee->crime_employee }}">
                        </div>
    </div>
</div>

@endsection
