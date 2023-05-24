<?php

namespace App\Http\Controllers\backend;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Employee;
use App\Models\User;
use App\Models\Attendance;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function registerEmployee()
    {
         return view('backend.employee.register_employee');
    }

    public function registerInsert(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:4|confirmed',
            'terms' => 'required|accepted'
        ]);
    
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 3,
        ];
    
        $insert = DB::table('users')->insertGetId($data); // Insert and retrieve the inserted user's ID
    
        if ($insert) {
            $employeeData = [
                'usersID' => $insert, // Store the user's ID in the employee table
                'employeeName' => $request->name, // Store the employee's name in the employee table
                'dob_employee' => null,
                'NRIC_employee' => null,
                'gender_employee' => null,
                'nationality_employee' => null,
                'race_employee' => null,
                'marital_employee' => null,
                'children_employee' => null,
                'position_employee' => null,
                'date' => null,
                'bank_name' => null,
                'acc_number' => null,
                'crime_employee' => null,
                'medical_employee' => null,
                'Vaccination' => null,
                'oku' => null,
                'emergency_employee' => null,
                'emergency_name' => null,
                'address' => null,
                'city' => null,
                'postcode' => null,
                'state' => null,
                'country' => null,
                'remarks' => null,
                'created_at' => now(),
                'updated_at' => now()
            ];
            DB::table('employee')->insert($employeeData); // Insert employee data
    
            return redirect()->route('backend.employee.list_employee')->with('success', 'New employee is successfully registered!');
        } else {
            $notification = [
                'messege' => 'Error registering new employee',
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
        }
    }
    
    
        	
    public function EmployeeList(Request $request)
    {
        $list = DB::table('users')
            ->join('employee', 'users.id', '=', 'employee.usersID')
            ->select('employee.id','employee.employeeName', 'users.name', 'users.email', 'users.role')
            ->where('role','3')
            ->get();
    
        return view('backend.employee.list_employee', compact('list'));
    }
    

public function HealthStatus(Request $request)
    {
        $employees = Employee::with('user')->get(['id','usersID', 'employeeName', 'Vaccination', 'medical_employee', 'oku']);
        // $list = Employee::where('usersID', $usersID) -> get ();
        // $user = User::where('id', $usersID) -> first ();
        return view('backend.employee.health_status', compact('employees'));
    }

    public function PayrollAdd(Request $request)
    {
        $employees = Employee::with('user')->get(['id', 'employeeName']);
        return view('backend.employee.payroll_manager', compact('employees'));
    }

    
    public function PayrollStatus(Request $request)
    {
        $employees = Employee::with('user')->get(['id','usersID', 'employeeName']);
        // $list = Employee::where('usersID', $usersID) -> get ();
        // $user = User::where('id', $usersID) -> first ();
        return view('backend.employee.payroll_employee', compact('employees'));
    }


    public function EmployeeAdd(Request $request, $usersID)
    {
        $employee = Employee::with('user')->where('id', $usersID)->first();
    
        return view('backend.employee.create_employee', compact('employee', 'usersID'));
    }

    public function EmployeeInsert(Request $request, $usersID)
    {
        $validatedData = $request->validate([
            'insert_img' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Add validation rules for the image file
        ]);
    
        if ($request->hasFile('insert_img')) {
            $imagePath = $request->file('insert_img')->store('employee_images', 'public');
        } else {
            $imagePath = null;
        }
    
        $employee = Employee::updateOrCreate(
            ['id' => $request->id],
            [
                'id' => $request->id,
                'usersID' => $request->usersID,
                'employeeName' => $request->employeeName,
                'dob_employee' => $request->dob_employee,
                'NRIC_employee' => $request->NRIC_employee,
                'gender_employee' => $request->gender_employee,
                'nationality_employee' => $request->nationality_employee,
                'race_employee' => $request->race_employee,
                'marital_employee' => $request->marital_employee,
                'children_employee' => $request->children_employee,
                'position_employee' => $request->position_employee ,
                'date' => $request->date,
                'bank_name' => $request->bank_name ,
                'acc_number' => $request->acc_number ,
                'crime_employee' => $request->crime_employee ,
                'medical_employee' => $request->medical_employee ,
                'Vaccination' => $request->Vaccination ,
                'oku' => $request->oku ,
                'emergency_employee' => $request->emergency_employee,
                'emergency_name' => $request->emergency_name,
                'address' => $request->address,
                'city' => $request->city,
                'postcode' => $request->postcode,
                'state' => $request->state,
                'country' => $request->country,
                'remarks' => $request->remarks,
                'insert_img' => $imagePath, // Assign the image file path to the 'insert_img' field
            ]
        );
    
        if ($employee) {
            return redirect()->route('backend.employee.list_employee', ['usersID' => $usersID])
                ->with('success', 'Details for this employee have been successfully added!');
        } else {
            $notification = [
                'message' => 'Error creating employee',
                'alert-type' => 'error'
            ];
            return redirect()->route('backend.employee.show_details')->with($notification);
        }
    }
    

public function EmployeeShow(Request $request, $usersID)
{
    $employee = Employee::with('user')->where('id', $usersID)->first();

    return view('backend.employee.show_details', compact('employee', 'usersID'));
}



public function ManagerShow(Request $request, $usersID)
{
    $employee = Employee::with('user')->where('usersID', $usersID)->first();

    return view('backend.employee.view_payroll', compact('employee', 'usersID'));
}
     

     public function Attendance()
     {
         $employees = Employee::all(); // Fetch all employees from the Employee table
     
         return view('backend.employee.attendance', compact('employees'));
     }

     public function generateLink()
{
    $employees = Employee::all();
    $attendance = Attendance::generateLink(); // Generate the link and save it in the database

    // Pass the generated link to the view
    return view('backend.employee.attendance', ['link' => $attendance->link]);
}


    public function EmployeeEdit ($usersID)
    {
        $edit=DB::table('employee')
            ->where('usersID',$usersID)
            ->first();
        return view('backend.employee.edit_employee', compact('edit'));     
    }

        public function EmployeeUpdate(Request $request,$usersID)
    {
        $list = Employee::where('usersID', $usersID)->get();
        DB::table('employee')->where('usersID', $usersID)->first();        
        $data = array();
        $data['usersID'] = $request->usersID;
        $data['employeeName'] = $request->employeeName;
        $data['employeeCat'] = $request->employeeCat;
        $data['registrationNum'] = $request->registrationNum;
        $data['contact'] = $request->contact;
        $data['address'] = $request->address;
        $data['city'] = $request->city;
        $data['postcode'] = $request->postcode;
        $data['state'] = $request->state;
        $data['country'] = $request->country;
        $data['remarks'] = $request->remarks;
        $update = DB::table('employee')->where('usersID', $usersID)->update($data);

        if ($update) 
    {
        
            $list = Employee::where('usersID', $usersID)->get(); 
            return view('backend.employee.show_details', compact('list'))->with('success', 'Details for this employee has been successfully updated!');                     
       
        }   
        else
    {
        $notification=array
        (
        'messege'=>'error ',
        'alert-type'=>'error'
        );
        return redirect()->route('backend.employee.show_details', [$usersID => 'usersID'])->with('error', 'There was an error while updating the details for this employee!');
    }
     
    }

public function EmployeeDelete ($id)
    {
    
        $delete = DB::table('users')->where('id', $id)->delete();
        if ($delete)
                            {    
                            return redirect()->route('backend.employee.list_employee')->with('success', 'The selected employee has been successfully deleted.');                                     
                            }
             else
                  {
                return redirect()->back('backend.employee.list_employee')->with('error', 'There was an error while deleting the selected employee.');
                  }

      }

    public function EmployeeDeleteHealth ($id)
    {
    
        $delete = DB::table('users')->where('id', $id)->delete();
        if ($delete)
                            {    
                            return redirect()->route('backend.employee.health_status')->with('success', 'The selected employee has been successfully deleted.');                                     
                            }
             else
                  {
                return redirect()->back('backend.employee.health_status')->with('error', 'There was an error while deleting the selected employee.');
                  }

      }

      public function DeleteDetails ($usersID)
      {
      
          $delete = DB::table('employee')->where('usersID', $usersID)->delete();
          if ($delete)
                              {
                                return redirect()->route('backend.employee.show_details', [$usersID => 'usersID'])->with('success', 'Details for this employee have been successfully deleted.');                    
                              }
               else
                    {
                    return redirect()->back('backend.employee.show_details', [$usersID => 'usersID'])->with('error', 'There was an error while deleting the employee details.');
  
                    }
  
        }




}
