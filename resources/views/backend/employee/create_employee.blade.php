@extends('backend.layouts.app')
@section('content')

<div class="card-body">
    <div class="row">
ss
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
              <form role="form" action="{{ URL::to('/insert_employee/'.$employee->id) }}" method="post" enctype="multipart/form-data">
              	@csrf 
                <div class="card-body">
                  
                  

<div class="form-group">
  <label for="id">Employee ID</label>
  <input type="text" name="id"  class="form-control @error('slug') is-invalid @enderror"
   id="id"   readonly value="{{ $employee->id }}">
  
  @error('slug')
  <span class="invalid-feedback" role="alert">
  <strong>{{ $message }}</strong>
  </span>
  @enderror
  </div>

  <div class="form-group">
  <label for="id">Employee ID</label>
  <input type="text" name="usersID"  class="form-control @error('slug') is-invalid @enderror"
   id="usersID"   readonly value="{{ $employee->usersID }}">
  
  @error('slug')
  <span class="invalid-feedback" role="alert">
  <strong>{{ $message }}</strong>
  </span>
  @enderror
  </div>

<div class="form-group">
    <label for="employeeName">Employee Name</label>
    <input type="text" name="employeeName" class="form-control" id="employeeName" readonly value="{{ $employee->employeeName }}">
   
    @error('slug')
    <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
    </span>
    @enderror
    </div>

  <div class="form-group">
    <label for="dob_employee">Date of Birth</label>
    <input type="date" name="dob_employee"  class="form-control @error('slug') is-invalid @enderror"
     id="dob_employee" placeholder="Date of Birth ">
    
    @error('slug')
    <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
    </span>
    @enderror
    </div>

  <div class="form-group">
    <label for="NRIC_employee">NRIC</label>
    <input type="text" name="NRIC_employee"  class="form-control @error('slug') is-invalid @enderror"
     id="NRIC_employee" placeholder="Enter NRIC ">
    
    @error('slug')
    <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
    </span>
    @enderror
    </div>

    <div class="form-group">
      <label for="gender_employee">Gender</label>
      <input type="text" name="gender_employee"  class="form-control @error('slug') is-invalid @enderror"
       id="gender_employee" placeholder="Enter Gender">
      
      @error('slug')
      <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
      </span>
      @enderror
      </div>

      <div class="form-group">
        <label for="nationality_employee">Nationality</label>
        <input type="text" name="nationality_employee"  class="form-control @error('slug') is-invalid @enderror"
         id="nationality_employee" placeholder="Nationallity">
        
        @error('slug')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>

        <div class="form-group">
          <label for="race_employee">Race</label>
          <input type="text" name="race_employee"  class="form-control @error('slug') is-invalid @enderror"
           id="race_employee" placeholder="Race">
          
          @error('slug')
          <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
          </span>
          @enderror
          </div>

        
      <div class="form-group">
        <label for="marital_employee">Marital</label>
        <input type="text" name="marital_employee"  class="form-control @error('slug') is-invalid @enderror"
         id="marital_employee" placeholder="Marital Status">
        
        @error('slug')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>

        <div class="form-group">
          <label for="children_employee">Children</label>
          <input type="text" name="children_employee"  class="form-control @error('slug') is-invalid @enderror"
           id="children_employee" placeholder="Children">
          
          @error('slug')
          <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
          </span>
          @enderror
          </div>

          <div class="form-group">
            <label for="position_employee">Designation</label>
            <input type="text" name="position_employee"  class="form-control @error('slug') is-invalid @enderror"
             id="position_employee" placeholder="Designation">
            
            @error('slug')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
            </div>
          
          <div class="form-group">
            <label for="date">Date of Work</label>
            <input type="date" name="date"  class="form-control @error('slug') is-invalid @enderror"
             id="date" placeholder="Date">
            
            @error('slug')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
            </div>
          
          <div class="form-group">
            <label for="bank_name">BankAccount</label>
            <input type="text" name="bank_name"  class="form-control @error('slug') is-invalid @enderror"
             id="bank_name" placeholder="Bank Account Name">
            
            @error('slug')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
            </div>  

          <div class="form-group">
            <label for="acc_number">AccountNo</label>
            <input type="text" name="acc_number"  class="form-control @error('slug') is-invalid @enderror"
             id="acc_number" placeholder="Bank Account Number">
            
            @error('slug')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
            </div>

          <div class="form-group">
            <label for="crime_employee">Crime</label>
            <input type="text" name="crime_employee"  class="form-control @error('slug') is-invalid @enderror"
             id="crime_employee" placeholder="Past Crime">
            
            @error('slug')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
            </div>

          <div class="form-group">
            <label for="medical_employee">Medical</label>
            <input type="text" name="medical_employee"  class="form-control @error('slug') is-invalid @enderror"
             id="medical_employee" placeholder="Medical Status">
            
            @error('slug')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
            </div>

          <div class="form-group">
            <label for="Vaccination">Vaccination</label>
            <input type="text" name="Vaccination"  class="form-control @error('slug') is-invalid @enderror"
             id="Vaccination" placeholder="Vaccination">
            
            @error('slug')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
            </div> 

          <div class="form-group">
            <label for="oku">OKU Status</label>
            <input type="text" name="oku"  class="form-control @error('slug') is-invalid @enderror"
             id="oku" placeholder="OKU Status">
            
            @error('slug')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
            </div>

          <div class="form-group">
            <label for="emergency_employee">Emergency Number</label>
            <input type="text" name="emergency_employee"  class="form-control @error('slug') is-invalid @enderror"
             id="emergency_employee" placeholder="Employee Emergency Contact Number">
            
            @error('slug')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
            </div>

          <div class="form-group">
            <label for="emergency_name">Emergency Name</label>
            <input type="text" name="emergency_name"  class="form-control @error('slug') is-invalid @enderror"
             id="emergency_name" placeholder="Employee Emergency Contact Name">
            
            @error('slug')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
            </div>

          <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address"  class="form-control @error('slug') is-invalid @enderror"
             id="address" placeholder="Address">
            
            @error('slug')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
            </div>

          <div class="form-group">
            <label for="city">City</label>
            <input type="text" name="city"  class="form-control @error('slug') is-invalid @enderror"
             id="city" placeholder="City">
            
            @error('slug')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
            </div>
            
          <div class="form-group">
            <label for="postcode">Postcode</label>
            <input type="text" name="postcode"  class="form-control @error('slug') is-invalid @enderror"
             id="postcode" placeholder="Postcode">
            
            @error('slug')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
            </div> 

          <div class="form-group">
            <label for="state">State</label>
            <input type="text" name="state"  class="form-control @error('slug') is-invalid @enderror"
             id="state" placeholder="State">
            
            @error('slug')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
            </div> 

          <div class="form-group">
            <label for="country">Country</label>
            <input type="text" name="country"  class="form-control @error('slug') is-invalid @enderror"
             id="country" placeholder="Country">
            
            @error('slug')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
            </div> 
            

          <div class="form-group">
            <label for="remarks">Remarks</label>
            <input type="text" name="remarks"  class="form-control @error('slug') is-invalid @enderror"
             id="remarks" placeholder="Remarks">
            
            @error('slug')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
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
              $('#image')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>

@endsection