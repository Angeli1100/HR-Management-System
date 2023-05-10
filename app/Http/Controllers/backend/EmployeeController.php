<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Employee;
use App\Models\User;

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
        
        $insert = DB::table('users')->insert($data);
        
        if ($insert) {
            return redirect()->route('backend.employee.list_employee')->with('success', 'New employee is successfully registered!');
            // return redirect()->route('backend.employee.show_details')->with('success', 'Agent details added successfully!');
        } else {
            $notification = [
                'messege' => 'Error register new employee',
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
            // return redirect()->route('backend.agent.list_agent')->with($notification);
        }
    }
        	
    public function EmployeeList(Request $request)
    {
        $list = DB::table('users')
            ->where('role', '=', 3)
            ->get();

        return view('backend.employee.list_employee', compact('list'));
        // $list = DB::table('agent')->get();
        // return view('backend.agent.list_agent',compact('list'));
    }


public function EmployeeAdd($usersID, $employeeName)
{
    // $user = User::where('id', $usersID)->where('name', $agentName)->first();
    // $agents = Agent::all();
    
    // return view('backend.agent.create_agent', compact('user','agents'));
    $list = DB::table('employee')->where('usersID', $usersID)->get();
    $user = User::where('id', $usersID)->where('name', $employeeName)->first();
    // $agents = Agent::where('usersID', $usersID)->get();
    
    // return redirect('list_agent');
    if($list->isEmpty()){
        return view('backend.employee.create_employee', compact('user','list'));
    }else{
        $notification = session('success'); // Get the success message, if any
        return view('backend.employee.create_employee', compact('user', 'list'))->with('success', 'Details for this employee have been added successfully');

    }
}



public function EmployeeInsert(Request $request, $usersID)
{
    $user = User::find($usersID);

    $employee = new Employee();
    $employee->usersID = $user->id;
    $employee->employeeName = $user->name;
    $employee->dob_employee = $request->dob_employee;
    $employee->NRIC_employee = $request->NRIC_employee;
    $employee->gender_employee = $request->gender_employee;
    $employee->nationality_employee = $request->nationality_employee;
    $employee->race_employee = $request->race_employee;
    $employee->marital_employee = $request->marital_employee;
    $employee->children_employee = $request->children_employee;
    $employee->position_employee = $request->position_employee;
    $employee->date = $request->date;
    $employee->bank_name = $request->bank_name;
    $employee->acc_number = $request->acc_number;
    $employee->crime_employee = $request->crime_employee;
    $employee->medical_employee = $request->medical_employee;
    $employee->emergency_employee = $request->emergency_employee;
    $employee->emergency_name = $request->emergency_name;
    $employee->address = $request->address;
    $employee->city = $request->city;
    $employee->postcode = $request->postcode;
    $employee->state = $request->state;
    $employee->country = $request->country;
    $employee->remarks = $request->remarks;

    if ($employee->save()) {
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
    $employee = Employee::with('user')->where('usersID', $usersID)->first();

    return view('backend.employee.show_details', compact('employee', 'usersID'));
}



     

//     public function AgentInsert(Request $request)
//     {


// $user = User::find($request->id);
// $data = [];
// $data['agentCat'] = $request->agentCat;
// $data['registrationNum'] = $request->registrationNum;
// $data['contact'] = $request->contact;
// $data['address'] = $request->address;
// $data['city'] = $request->city;
// $data['postcode'] = $request->postcode;
// $data['state'] = $request->state;
// $data['country'] = $request->country;
// $data['remarks'] = $request->remarks;
// $insert = DB::table('agent')->insert($data);
       
// if ($usersID) 
// {
   
//                 return Redirect()->route('agent.index')->with('success','Agent created successfully!');
                 
//         }
// else
//         {
//         $notification=array
//         (
//         'messege'=>'error ',
//         'alert-type'=>'error'
//         );
//         return Redirect()->route('agent.index')->with($notification);
//         }
           
// }

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
