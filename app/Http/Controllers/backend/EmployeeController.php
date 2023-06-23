<?php

namespace App\Http\Controllers\backend;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Employee;
use App\Models\User;
use App\Models\Attendance;
use App\Models\Leave;
use Carbon\Carbon;
use Barryvdh\Snappy\Facades\SnappyPdf;
use PDF;


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

    public function updateEmployee(Request $request, $id)
{
    $employee = Employee::find($id);

    if (!$employee) {
        // Handle the case where the employee with the given ID is not found
        return redirect()->back()->with('error', 'Employee not found!');
    }

    // Update the employee information based on the submitted form data
    $employee->employeeName = $request->input('employeeName');
    $employee->gender_employee = $request->input('gender_employee');
    $employee->dob_employee = $request->input('dob_employee');
    $employee->NRIC_employee = $request->input('NRIC_employee');
    $employee->nationality_employee = $request->input('nationality_employee');
    $employee->race_employee = $request->input('race_employee');
    $employee->marital_employee = $request->input('marital_employee');
    $employee->children_employee = $request->input('children_employee');
    $employee->position_employee = $request->input('position_employee');
    $employee->date = $request->input('date');
    $employee->bank_name = $request->input('bank_name');
    $employee->acc_number = $request->input('acc_number');
    $employee->crime_employee = $request->input('crime_employee');
    $employee->medical_employee = $request->input('medical_employee');
    $employee->Vaccination = $request->input('Vaccination');
    $employee->oku = $request->input('oku');
    $employee->emergency_employee = $request->input('emergency_employee');
    $employee->emergency_name = $request->input('emergency_name');
    $employee->address = $request->input('address');
    $employee->city = $request->input('city');
    $employee->postcode = $request->input('postcode');
    $employee->state = $request->input('state');
    $employee->country = $request->input('country');
    $employee->remarks = $request->input('remarks');
    // Update other fields similarly

    // Save the updated employee data to the database
    $employee->save();

    return redirect()->route('backend.employee.list_employee')->with('success', 'Employee information updated successfully!');
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

public function attendance()
{
    $attendances = Attendance::whereNotNull('employeeName')->get();// Fetch all employees from the Employee table

    return view('backend.employee.attendance', compact('attendances'));
}
public function generateLink()
{
    $link = Attendance::generateLink();

    // Create a new attendance record with the generated link
    $attendance = new Attendance();
    $attendance->link = $link;
    $attendance->status = 'active';
    $attendance->save();

    // Flash a success message to the session
    session()->flash('success', 'The link has been generated.');

    // Redirect to the attendance page with the generated link
    return redirect()->route('backend.employee.attendance', ['link' => $link]);
}

public function deactivateLink()
{
    Attendance::where('status', 'active')->update(['status' => 'deactivate']);

    // Flash a success message to the session
    session()->flash('success', 'The active links have been deactivated.');

    // Redirect back to the previous page or any desired page
    return redirect()->back();
}
 
public function viewLink($link)
{
    return view('backend.employee.view_link', compact('link'));
}

public function pageLink()
{
    $link = Attendance::where('status', 'active')->value('link');
    return view('backend.employee.page_link', compact('link'));
}

public function checkIn(Request $request, $link)
{
    $userId = auth()->user()->id;
    $name = auth()->user()->name;

    // Create a new attendance record for the employee
    $newAttendance = Attendance::create([
        'link' => $link,
        'userID' => $userId,
        'employeeName' => $name,
        'check_in' => Carbon::now(), // Set the check_in column to the current timestamp
        'check_out' => null,
    ]);

    session()->flash('success', 'Congratulations! You have successfully checked in.');
    return view('backend.employee.view_link', compact('link'));
}

public function checkOut(Request $request, $link)
{
    // Find the attendance record based on the link and user ID
    $attendance = Attendance::where('link', $link)
                            ->where('userID', auth()->user()->id)
                            ->latest()
                            ->first();

    if (!$attendance) {
        // Handle the case when the attendance record is not found
        // You can redirect back with an error message or handle it according to your application logic
    }

    // Set the check_out column to the current timestamp
    $attendance->check_out = now();
    $attendance->save();

    // Create a new attendance record for the employee
    $userId = auth()->user()->id;
    $name = auth()->user()->name;

    session()->flash('success', 'Congratulations! You have successfully checked out.');

    return view('backend.employee.view_link', compact('link'));
}

public function filterMonth(Request $request)
{
    $selectMonth = $request->input('month');
    // Assuming you have a model named "Attendance" to retrieve the filtered data
    $attendances = Attendance::whereNotNull('employeeName')
                             ->whereMonth('date', $selectMonth)
                             ->get();

    return view('backend.employee.attendance')
        ->with('attendances', $attendances)
        ->with('selectMonth', $selectMonth);
}

public function filterYear(Request $request)
{
    $selectYear = $request->input('year');
    // Assuming you have a model named "Attendance" to retrieve the filtered data
    $attendances = Attendance::whereNotNull('employeeName')->whereYear('date', $selectYear)
                                ->get();

    return view('backend.employee.attendance')
    ->with('attendances', $attendances)
    ->with('selectYear', $selectYear);
}

public function generatePDF(Request $request)
{
    $url = $request->input('url');
    $query = parse_url($url, PHP_URL_QUERY);
    parse_str($query, $params);
    $month = $params['month'] ?? null;
    $year = $params['year'] ?? null;

    $attendances = Attendance::whereNotNull('employeeName');

    if ($month) {
        $attendances->whereMonth('date', $month);
    }

    if ($year) {
        $attendances->whereYear('date', $year);
    }

    $attendances = $attendances->get();

    $pdf = PDF::loadView('backend.employee.print_attendance', compact('attendances'));

    return $pdf->inline('attendance_record.pdf');
}

public function addEmployeeAttendance()
{
    $link = Attendance::where('status', 'active')->first();

    if (!$link) {
        // No active link found, redirect back to the attendance dashboard or any desired page
        return redirect()->route('backend.employee.attendance')->with('error', 'No active link available.');
    }

    return view('backend.employee.addEmployeeAttendance', compact('link'));
}

public function storeEmployeeAttendance(Request $request)
{
    $request->validate([
        'userID' => 'required',
        'employeeName' => 'required',
        'date' => 'required',
    ]);

    $attendance = new Attendance();
    $attendance->link = $request->link; // Retrieve the link from the form
    $attendance->userID = $request->userID;
    $attendance->employeeName = $request->employeeName;
    $attendance->check_in = $request->check_in;
    $attendance->check_out = $request->check_out;
    $attendance->date = $request->date;
    $attendance->save();

    // Add any additional logic or redirection as needed

    return redirect()->route('backend.employee.attendance')->with('success', 'Employee attendance stored successfully.');
}

public function leaveAdmin()
{
    $table = Leave::all();
    return view('backend.employee.leave_admin', ['leavetable' => $table]);
}
public function leaveUser()
{
    // Retrieve the leave data from the database
    $leaveData = Leave::first();

    // Extract the leave values
    $annualLeaveData = $leaveData->annualLeaveData;
    $emergencyLeaveData = $leaveData->emergencyLeaveData;
    $hospitalityLeaveData = $leaveData->hospitalityLeaveData;
    $paidLeaveData = $leaveData->paidLeaveData;

    // Extract the leave quota values
    $annualLeaveQuota = $leaveData->annual_qouta;
    $emergencyLeaveQuota = $leaveData->emergency_qouta;
    $hospitalityLeaveQuota = $leaveData->hospitality_qouta;
    $paidLeaveQuota = $leaveData->paidLeave_qouta;

    return view('backend.employee.leave_user', compact('annualLeaveData', 'emergencyLeaveData', 'hospitalityLeaveData', 'paidLeaveData', 'annualLeaveQuota', 'emergencyLeaveQuota', 'hospitalityLeaveQuota', 'paidLeaveQuota'));
}

public function EmployeeDelete_Leave ($id)
    {
    
        $delete = DB::table('leavetable')->where('id', $id)->delete();
        if ($delete)
                            {    
                            return redirect()->route('backend.employee.leave_admin')->with('success', 'The selected employee has been successfully deleted.');                                     
                            }
             else
                  {
                return redirect()->back('backend.employee.leave_admin')->with('error', 'There was an error while deleting the selected employee.');
                  }

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
        return redirect()->route('backend.employee.show_details', [$usersID => 'usersID'])
        ->with('error', 'There was an error while updating the details for this employee!');
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
