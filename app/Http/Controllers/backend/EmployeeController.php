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
use App\Models\Payroll;
use App\Models\User;
use App\Models\Attendance;
use App\Models\Leave;
use Carbon\Carbon;
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
                'contact_no' => null,
                'hp_no' => null,
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
            ->select('employee.id', 'employee.employeeName', 'users.email', 'users.role')
            ->where('role', '3')
            ->get();
    
        return view('backend.employee.list_employee', compact('list'));
    }
    

    
public function HealthStatus(Request $request)
    {
        $employees = Employee::with('user')->get(['id','usersID', 'employeeName', 'position_employee']);
        return view('backend.employee.health_status', compact('employees'));
        
    }

    public function PayrollAdd(Request $request)
    {
        $employees = Employee::with('user')->get(['id', 'employeeName', 'position_employee']);
        return view('backend.employee.payroll_manager', compact('employees'));
    }

    
    public function PayrollStatus(Request $request)
    {
        $payroll = DB::table('employee')
        ->join('payrolladmin', 'employee.id', '=', 'payrolladmin.employee_id')
        ->select('payrolladmin.employee_id', 'employee.employeeName', 'payrolladmin.pay_date', 'payrolladmin.pay_period', 'payrolladmin.gross', 'payrolladmin.nett')
        ->get();

        return view('backend.employee.payroll_employee', compact('payroll'));
    }

    public function PayrollView(Request $request, $employee_id)
    {
        $employee = Employee::with('user')->where('id', $employee_id)->first();

        return view('backend.employee.payroll_employee_view', compact('employee', 'employee_id'));
    
    }

    public function EmployeeAdd(Request $request, $id)
    {
        $employee = Employee::with('user')->where('id', $id)->first();
    
        return view('backend.employee.create_employee', compact('employee', 'id'));
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
                'contact_no' => $request -> contact_no,
                'hp_no' => $request -> hp_no,
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
    $validatedData = $request->validate([
        'insert_img' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Add validation rules for the image file
    ]);

    if ($request->hasFile('insert_img')) {
        $imagePath = $request->file('insert_img')->store('employee_images', 'public');
    } else {
        $imagePath = null;
    }

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
    $employee-> contact_no = $request -> input('contact_no');
    $employee-> hp_no = $request -> input('hp_no');
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
    $employee->insert_img = $imagePath;
    // Update other fields similarly

    // Save the updated employee data to the database
    $employee->save();

    return redirect()->route('backend.employee.show_details')->with('success', 'Employee information updated successfully!');
}

    
public function EmployeeShow(Request $request, $id)
{
    $employee = Employee::with('user')->where('id', $id)->first();

    return view('backend.employee.show_details', compact('employee', 'id'));
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

public function pageLink($link)
{
    // Retrieve the attendance records for the authenticated user
    $attendances = Attendance::where('link', $link)
        ->where('userID', auth()->user()->id)
        ->get();

    return view('backend.employee.page_link', compact('link', 'attendances'));
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

    session()->flash('success', 'Good Job! You have successfully checked in. Have a nice day!');
    return redirect()->back();
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

    session()->flash('success', 'Good Job! You have successfully checked out. Rest Well!');

    return redirect()->back();
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

public function applyLeave()
{
    return view('backend.employee.apply_leave');
}

public function storeLeave(Request $request)
{
    // Validate the request data
    $request->validate([
        'leave_type' => 'required',
        'duration' => 'required|numeric|min:1',
    ]);

    // Retrieve the employee data
    $employee = Employee::where('usersID', auth()->user()->id)->first();

    // Retrieve the leave data for the employee
    $leave = Leave::where('employee_id', $employee->id)->first();

    // Update the leave quota based on the leave type and duration
    if ($request->leave_type === 'annual_leave') {
        if ($leave->annual_qouta <= 0) {
            return redirect()->back()->with('error', 'You have reached the maximum limit for annual leave.');
        } elseif ($leave->annual_qouta >= $request->duration) {
            $leave->annual_qouta -= $request->duration;
            $leave->annualLeaveData += $request->duration;
        } else {
            return redirect()->back()->with('error', 'Insufficient annual leave quota.');
        }
    } elseif ($request->leave_type === 'emergency_leave') {
        if ($leave->emergency_qouta <= 0) {
            return redirect()->back()->with('error', 'You have reached the maximum limit for emergency leave.');
        } elseif ($leave->emergency_qouta >= $request->duration) {
            $leave->emergency_qouta -= $request->duration;
            $leave->emergencyLeaveData += $request->duration;
        } else {
            return redirect()->back()->with('error', 'Insufficient emergency leave quota.');
        }
    } elseif ($request->leave_type === 'hospitality_leave') {
        if ($leave->hospitality_qouta <= 0) {
            return redirect()->back()->with('error', 'You have reached the maximum limit for hospitality leave.');
        } elseif ($leave->hospitality_qouta >= $request->duration) {
            $leave->hospitality_qouta -= $request->duration;
            $leave->hospitalityLeaveData += $request->duration;
        } else {
            return redirect()->back()->with('error', 'Insufficient hospitality leave quota.');
        }
    } elseif ($request->leave_type === 'paid_leave') {
        if ($leave->paidLeave_qouta <= 0) {
            return redirect()->back()->with('error', 'You have reached the maximum limit for paid leave.');
        } elseif ($leave->paidLeave_qouta >= $request->duration) {
            $leave->paidLeave_qouta -= $request->duration;
            $leave->paidLeave_qouta += $request->duration;
        } else {
            return redirect()->back()->with('error', 'Insufficient paid leave quota.');
        }
    }

    // Save the updated leave data
    $leave->save();

    // You can add additional logic here, such as creating a leave application record

    return redirect()->back()->with('success', 'Leave application submitted successfully.');
}

public function LeaveSetting(Request $request)
{
    // Retrieve the employee data
    $employees = Employee::all();

    return view('backend.employee.leave_setting', compact('employees'));
}

public function getEmployeeData(Request $request)
{
    $employeeId = $request->input('employee_id');

    // Retrieve the employee data based on the selected employee ID
    $employee = Employee::find($employeeId);

    // Check if the leave data for the employee already exists
    $leave = Leave::where('employee_id', $employeeId)->first();
    if (!$leave) {
        // Create new leave data for the employee
        $leave = new Leave;
        $leave->employee_id = $employeeId;
        $leave->save();
    }

    // Return the employee data and leave data as JSON
    return response()->json([
        'employee' => $employee,
        'leave' => $leave,
    ]);
}

public function updateLeaveQuotas(Request $request)
{
    // Validate the request data
    $request->validate([
        'employee_id' => 'required',
        'annual_qouta' => 'required|integer|min:0',
        'emergency_qouta' => 'required|integer|min:0',
        'hospitality_qouta' => 'required|integer|min:0',
        'paidLeave_qouta' => 'required|integer|min:0',
    ]);

    // Retrieve the leave record based on the employee ID
    $employees = Employee::with('user')->get(['usersID', 'employeeName', 'id']);

    // Check if the leave record exists
    if (!$employees->isEmpty()) {
        // Loop through each employee
        foreach ($employees as $employee) {
            // Create a new leave record
            $leave = new Leave;
            $leave->employee_id = $employee->id;
            $leave->employeeName = $employee->employeeName;

            // Retrieve the email from the associated user record
            $email = $employee->user->email;
            $leave->email = $email;

            // Assign the values to the leave record properties
            $leave->annual_qouta = $request->annual_qouta;
            $leave->emergency_qouta = $request->emergency_qouta;
            $leave->hospitality_qouta = $request->hospitality_qouta;
            $leave->paidLeave_qouta = $request->paidLeave_qouta;

            // Save the leave record
            $leave->save();
        }
    }

    return redirect()->back()->with('success', 'Leave quotas updated successfully.');
}

public function UserPersonalDetail(Request $request, $id)
{
    $employee = []; 
    $employee = Employee::where('usersID', auth()->user()->id)->first();
    return view('backend.employee.user_personalDetail', compact('employee'));
}

public function AttritionStatus(Request $request, $id)
{
    $employee = Employee::with('user')->find($id);
    
    if (!$employee) {
        // Employee not found, handle the error scenario
        // You can redirect or display an error message
        return redirect()->back()->with('error', 'Employee not found.');
    }
    
    return view('backend.employee.attrition_status', compact('employee'));
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


    public function EmployeeUpdate(Request $request, $id)
{
    $employee = Employee::with('user')->where('id', $id)->first();

    return view('backend.employee.editUser_personalDetail', compact('employee', 'id'));
}


public function EmployeeSave (Request $request, $id)
{

    $employee = DB::table('employee')->where('id', $id)->first();
    $id = $employee->id;

    $validatedData = $request->validate([
        'insert_img' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Add validation rules for the image file
    ]);

    if ($request->hasFile('insert_img')) {
        $imagePath = $request->file('insert_img')->store('employee_images', 'public');
    } else {
        $imagePath = null;
    }


    // Update the employee information based on the submitted form data
    $data = array(
    'employeeName' => $request->employeeName,
    'gender_employee' => $request->gender_employee,
    'dob_employee' => $request->dob_employee,
    'NRIC_employee' => $request->NRIC_employee,
   'nationality_employee'=> $request->nationality_employee,
    'race_employee' => $request->race_employee,
    'marital_employee' => $request->marital_employee,
    'children_employee' => $request->children_employee,
   'position_employee' => $request->position_employee,
    'date' => $request->date,
    'contact_no' => $request -> contact_no,
    'hp_no' => $request -> hp_no,
   'bank_name' => $request->bank_name,
    'acc_number' => $request->acc_number,
    'crime_employee' => $request->crime_employee,
    'medical_employee' => $request->medical_employee,
    'Vaccination' => $request->Vaccination,
    'oku' => $request->oku,
    'emergency_employee' => $request->emergency_employee,
    'emergency_name' => $request->emergency_name,
    'address' => $request->address,
    'city' => $request->city,
    'postcode' => $request->postcode,
    'state' => $request->state,
    'country' => $request->country,
    'remarks' => $request->remarks,

    );

    $update = DB::table('employee')->where('id', $id)->update($data);

    if ($update) {
        return redirect()->route('backend.employee.show_details', ['id' => $employee->id])->with('success', ' Succesfully Updated!');
    } else {
        $notification = array(
            'messege' => 'error ',
            'alert-type' => 'error'
        );
        return redirect()->route('backend.employee.show_details')->with($notification);
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
