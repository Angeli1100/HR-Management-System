@extends('backend.layouts.app')

@section('content')
<form method="POST" action="{{ URL::to('/Save_Detail_Employee_Update/'.$employee->id) }}">
                        @csrf
    <div class="row">
        <div class="col-md-6">
            <!-- Profile Information -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Profile Information</h3>
                </div>
                <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-12 text-center">
                                <img src="{{ $employee ? asset('storage/'.$employee->insert_img) : asset('storage/'.$employee->insert_img) }}" width="20%" height="auto">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="id">Employee ID</label>
                                <input type="text" name="id" class="form-control" readonly value="{{ $employee->id }}">
                            </div>
                            <div class="col-md-6">
                                <label for="usersID">User ID</label>
                                <input type="text" name="usersID" class="form-control" id="usersID" readonly value="{{ $employee->usersID }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="employeeName">Full Name</label>
                                <input type="text" name="employeeName" class="form-control" id="employeeName" value="{{ $employee->employeeName }}">
                            </div>
                            <div class="col-md-6">
                            <label for="gender_employee">Gender</label>
                            <select name="gender_employee" class="form-control" id="gender_employee">
                                <option value="">Select Gender</option>
                                <option value="Female" {{ old('gender_employee', $employee->gender_employee) === 'Female' ? 'selected' : '' }}>
                                    Female</option>
                                <option value="Male" {{ old('gender_employee', $employee->gender_employee) === 'Male' ? 'selected' : '' }}>
                                    Male</option>
                            </select>
                        </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="dob_employee">Date of Birth</label>
                                <input type="date" name="dob_employee" class="form-control" id="dob_employee" value="{{ $employee->dob_employee }}">
                            </div>
                            <div class="col-md-6">
                                <label for="NRIC_employee">NRIC</label>
                                <input type="number" name="NRIC_employee" class="form-control" id="NRIC_employee" value="{{ $employee->NRIC_employee }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="nationality_employee">Nationality</label>
                                <input type="text" name="nationality_employee" class="form-control" id="nationality_employee" value="{{ $employee->nationality_employee }}">
                            </div>
                            <div class="col-md-6">
                            <label for="race_employee">Race</label>
                            <select name="race_employee" class="form-control" id="race_employee">
                                <option value="">Select Race</option>
                                <option value="Melayu">Melayu</option>
                                <option value="Cina">Cina</option>
                                <option value="India">India</option>
                                <option value="Bumiputera">Bumiputera</option>
                                <option value="Lain-lain">Lain-lain</option>
                            </select>
                        </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                            <label for="marital_employee">Marital</label>
                            <select name="marital_employee" class="form-control" id="marital_employee">
                                <option value="">Select Marital Status</option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Divorced">Divorced</option>
                                <option value="Widowed">Widowed</option>
                            </select>
                        </div>
                            <div class="col-md-6">
                                <label for="children_employee">No. of Children</label>
                                <input type="number" name="children_employee" class="form-control" id="children_employee" value="{{ $employee->children_employee }}">
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <!-- My Profile -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Other Information</h3>
                    <div class="col-md-12 text-right">
                        <div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control" id="address" value="{{ $employee->address }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="postcode">Postcode</label>
                            <input type="number" name="postcode" class="form-control" id="postcode" value="{{ $employee->postcode }}">
                        </div>
                        <div class="col-md-6">
                        <label for="city">City</label>
                            <select name="city" class="form-control" id="city">
                                <option value="">Select City</option>
                                <option value="Kuala Lumpur">Kuala Lumpur</option>
                                <option value="George Town">George Town</option>
                                <option value="Ipoh">Ipoh</option>
                                <option value="Shah Alam">Shah Alam</option>
                                <option value="Petaling Jaya">Petaling Jaya</option>
                                <option value="Johor Bahru">Johor Bahru</option>
                                <option value="Melaka City">Melaka City</option>
                                <option value="Kota Kinabalu">Kota Kinabalu</option>
                                <option value="Kuantan">Kuantan</option>
                                <option value="Kuching">Kuching</option>
                                <option value="Alor Setar">Alor Setar</option>
                                <option value="Seremban">Seremban</option>
                                <option value="Miri">Miri</option>
                                <option value="Taiping">Taiping</option>
                                <option value="Kangar">Kangar</option>
                                <option value="Labuan">Labuan</option>
                                <option value="Kota Bharu">Kota Bharu</option>
                                <option value="Sandakan">Sandakan</option>
                                <option value="Batu Pahat">Batu Pahat</option>
                                <option value="Langkawi">Langkawi</option>
                                <option value="Tawau">Tawau</option>
                                <option value="Sibu">Sibu</option>
                                <option value="Kulim">Kulim</option>
                                <option value="Kluang">Kluang</option>
                                <option value="Bintulu">Bintulu</option>
                                <option value="Muar">Muar</option>
                                <option value="Butterworth">Butterworth</option>
                                <option value="Sungai Petani">Sungai Petani</option>
                                <option value="Perai">Perai</option>
                                <option value="Melaka Tengah">Melaka Tengah</option>
                                <option value="Seberang Perai">Seberang Perai</option>
                                <option value="Subang Jaya">Subang Jaya</option>
                                <option value="Iskandar Puteri">Iskandar Puteri</option>
                                <option value="Kajang">Kajang</option>
                                <option value="Kuala Terengganu">Kuala Terengganu</option>
                                <option value="Tanjung Tokong">Tanjung Tokong</option>
                                <option value="Kuching District">Kuching District</option>
                                <option value="Ampang Jaya">Ampang Jaya</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                        <label for="state">State</label>
                            <select name="state" class="form-control" id="state">
                                <option value="">Select State</option>
                                <option value="Johor">Johor</option>
                                <option value="Kedah">Kedah</option>
                                <option value="Kelantan">Kelantan</option>
                                <option value="Melaka">Melaka</option>
                                <option value="Negeri Sembilan">Negeri Sembilan</option>
                                <option value="Pahang">Pahang</option>
                                <option value="Perak">Perak</option>
                                <option value="Perlis">Perlis</option>
                                <option value="Pulau Pinang">Pulau Pinang</option>
                                <option value="Sabah">Sabah</option>
                                <option value="Sarawak">Sarawak</option>
                                <option value="Selangor">Selangor</option>
                                <option value="Terengganu">Terengganu</option>
                                <option value="Wilayah Persekutuan Kuala Lumpur">Wilayah Persekutuan Kuala Lumpur</option>
                                <option value="Wilayah Persekutuan Labuan">Wilayah Persekutuan Labuan</option>
                                <option value="Wilayah Persekutuan Putrajaya">Wilayah Persekutuan Putrajaya</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                        <label for="country">Country</label>
                            <select name="country" class="form-control" id="country">
                                <option value="">Select Country</option>
                                <option value="Malaysia">Malaysia</option>
                                <option value="United States">United States</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="Canada">Thailand</option>
                                <option value="Australia">Australia</option>
                                <option value="India">Indonesia</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="contact_no">Contact No.</label>
                            <input type="number" name="contact_no" class="form-control" id="contact_no" value="{{ $employee->contact_no }}">
                        </div>
                        <div class="col-md-6">
                            <label for="hp_no">Home No.</label>
                            <input type="number" name="hp_no" class="form-control" id="hp_no" value="{{ $employee->hp_no }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="emergency_name">Emergency Name</label>
                            <input type="text" name="emergency_name" class="form-control" id="emergency_name" value="{{ $employee->emergency_name }}">
                        </div>
                        <div class="col-md-6">
                            <label for="emergency_employee">Emergency Contact No.</label>
                            <input type="number" name="emergency_employee" class="form-control" id="emergency_employee" value="{{ $employee->emergency_employee }}">
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
                            <input type="text" name="position_employee" class="form-control" id="position_employee" value="{{ $employee->position_employee }}">
                        </div>
                        <div class="col-md-12">
                            <label for="date">Date of Commencement</label>
                            <input type="date" name="date" class="form-control" id="date" readonly value="{{ $employee->date }}">
                        </div>
                        <div class="col-md-12">
                        <label for="bank_name">Bank Account Name</label>
                            <select name="bank_name" class="form-control" id="bank_name">
                                <option value="">Select Bank</option>
                                <option value="Affin Bank">Affin Bank</option>
                                <option value="Agrobank">Agrobank</option>
                                <option value="Alliance Bank">Alliance Bank</option>
                                <option value="AmBank">AmBank</option>
                                <option value="Bank Islam">Bank Islam</option>
                                <option value="Bank Muamalat">Bank Muamalat</option>
                                <option value="Bank Rakyat">Bank Rakyat</option>
                                <option value="BSN">BSN</option>
                                <option value="CIMB Bank">CIMB Bank</option>
                                <option value="Citibank">Citibank</option>
                                <option value="Hong Leong Bank">Hong Leong Bank</option>
                                <option value="HSBC Bank">HSBC Bank</option>
                                <option value="ICBC Bank">ICBC Bank</option>
                                <option value="Maybank">Maybank</option>
                                <option value="OCBC Bank">OCBC Bank</option>
                                <option value="Public Bank">Public Bank</option>
                                <option value="RHB Bank">RHB Bank</option>
                                <option value="Standard Chartered Bank">Standard Chartered Bank</option>
                                <option value="UOB Bank">UOB Bank</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="acc_number">Bank Account No.</label>
                            <input type="text" name="acc_number" class="form-control" id="acc_number" value="{{ $employee->acc_number }}">
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
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Health Record</h3>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="medical_employee">Medical Status</label>
                            <input type="text" name="medical_employee" class="form-control" id="medical_employee" value="{{ $employee->medical_employee }}">
                        </div>
                        <div class="col-md-12">
                        <label for="Vaccination">Vaccination Status</label>
                            <select name="Vaccination" class="form-control" id="Vaccination">
                                <option value="">Select Vaccination Status</option>
                                <option value="Fully Vaccinated">Fully Vaccinated</option>
                                <option value="Partially Vaccinated">Partially Vaccinated</option>
                                <option value="Not Vaccinated">Not Vaccinated</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                        <label for="oku">OKU Status</label>
                            <select name="oku" class="form-control" id="oku">
                                <option value="">Select OKU Status</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                        <label for="crime_employee">Crime Record</label>
                            <select name="crime_employee" class="form-control" id="crime_employee">
                                <option value="">Select Crime Record</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>

@endsection
