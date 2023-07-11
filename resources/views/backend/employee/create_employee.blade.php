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
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{ URL::to('/insert_employee/'.$employee->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="id">Employee ID</label>
                            <input type="text" name="id" class="form-control" id="id" readonly
                                value="{{ $employee->id }}">
                        </div>

                        <div class="form-group">
                            <label for="usersID">User ID</label>
                            <input type="text" name="usersID" class="form-control" id="usersID" readonly
                                value="{{ $employee->usersID }}">
                        </div>

                        <div class="form-group">
                            <label for="employeeName">Employee Name</label>
                            <input type="text" name="employeeName" class="form-control" id="employeeName" readonly
                                value="{{ $employee->employeeName }}">
                        </div>

                        <div class="form-group">
                            <label for="dob_employee">Date of Birth</label>
                            <input type="date" name="dob_employee" class="form-control" id="dob_employee"
                                placeholder="Date of Birth">
                        </div>

                        <div class="form-group">
                            <label for="NRIC_employee">NRIC</label>
                            <input type="number" name="NRIC_employee" class="form-control" id="NRIC_employee"
                                placeholder="Enter NRIC">
                        </div>

                        <div class="form-group">
                            <label for="gender_employee">Gender</label>
                            <select name="gender_employee" class="form-control" id="gender_employee">
                                <option value="">Select Gender</option>
                                <option value="Female" {{ old('gender_employee', $employee->gender_employee) === 'Female' ? 'selected' : '' }}>
                                    Female</option>
                                <option value="Male" {{ old('gender_employee', $employee->gender_employee) === 'Male' ? 'selected' : '' }}>
                                    Male</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="nationality_employee">Nationality</label>
                            <input type="text" name="nationality_employee" class="form-control"
                                id="nationality_employee" placeholder="Nationality">
                        </div>

                        <div class="form-group">
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

                        <div class="form-group">
                            <label for="marital_employee">Marital</label>
                            <select name="marital_employee" class="form-control" id="marital_employee">
                                <option value="">Select Marital Status</option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Divorced">Divorced</option>
                                <option value="Widowed">Widowed</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="children_employee">Children</label>
                            <input type="number" name="children_employee" class="form-control" id="children_employee"
                                placeholder="Children">
                        </div>

                        <div class="form-group">
                            <label for="position_employee">Designation</label>
                            <input type="text" name="position_employee" class="form-control" id="position_employee"
                                placeholder="Designation">
                        </div>

                        <div class="form-group">
                            <label for="date">Date of Commencement</label>
                            <input type="date" name="date" class="form-control" id="date" placeholder="Date">
                        </div>

                        <div class="form-group">
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


                        <div class="form-group">
                            <label for="acc_number">Bank Account No.</label>
                            <input type="number" name="acc_number" class="form-control" id="acc_number"
                                placeholder="Bank Account No.">
                        </div>

                        <div class="form-group">
                            <label for="crime_employee">Crime Record</label>
                            <select name="crime_employee" class="form-control" id="crime_employee">
                                <option value="">Select Crime Record</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="medical_employee">Medical Status</label>
                            <input type="text" name="medical_employee" class="form-control" id="medical_employee"
                                placeholder="Medical Status">
                        </div>

                        <div class="form-group">
                            <label for="Vaccination">Vaccination Status</label>
                            <select name="Vaccination" class="form-control" id="Vaccination">
                                <option value="">Select Vaccination Status</option>
                                <option value="Fully Vaccinated">Fully Vaccinated</option>
                                <option value="Partially Vaccinated">Partially Vaccinated</option>
                                <option value="Not Vaccinated">Not Vaccinated</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="oku">OKU Status</label>
                            <select name="oku" class="form-control" id="oku">
                                <option value="">Select OKU Status</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="contact_no">Contact No.</label>
                            <input type="number" name="contact_no" class="form-control" id="contact_no"
                                placeholder="Contact No.">
                        </div>

                        <div class="form-group">
                            <label for="hp_no">Home No.</label>
                            <input type="number" name="hp_no" class="form-control" id="hp_no" placeholder="Home No.">
                        </div>

                        <div class="form-group">
                            <label for="emergency_name">Emergency Contact Name</label>
                            <input type="text" name="emergency_name" class="form-control" id="emergency_name"
                                placeholder="Emergency Contact Name">
                        </div>

                        <div class="form-group">
                            <label for="emergency_employee">Emergency Number</label>
                            <input type="number" name="emergency_employee" class="form-control" id="emergency_employee"
                                placeholder="Emergency Contact Number">
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control" id="address" placeholder="Address">
                        </div>

                        <div class="form-group">
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



                        <div class="form-group">
                            <label for="postcode">Postcode</label>
                            <input type="number" name="postcode" class="form-control" id="postcode" placeholder="Postcode">
                        </div>

                        <div class="form-group">
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


                        <div class="form-group">
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


                        <div class="form-group">
                            <label for="remarks">Remarks</label>
                            <input type="text" name="remarks" class="form-control" id="remarks" placeholder="Remarks">
                        </div>

                        <div class="form-group">
                            <label for="insert_img">Insert Image</label>
                            <input type="file" name="insert_img" class="form-control-file" id="insert_img">
                        </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        </form>
                        </div>
                        <!-- /.card -->
                        </div>

                        <div class="col-md-2">
                        </div>

                        </div>
                        <!-- /.row -->
                        </div>

<script type="text/javascript">
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#preview-image').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>

@endsection
