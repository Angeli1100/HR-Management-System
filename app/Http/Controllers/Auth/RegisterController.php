<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return 
     */
    protected function create(array $data)
    {
        $insert = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    
        if ($insert) {
            $employee = Employee::where('usersID', $insert->id)->first(); // Retrieve employee data
    
            if ($employee) {
                $employeeName = $employee->employeeName; // Retrieve employee's name from the employee table
            } else {
                $employeeName = $data['name']; // Use the provided name if the employee data is not found
            }
    
            $employeeData = [
                'usersID' => $insert->id,
                'employeeName' => $employeeName,
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

                // ... the rest of the employee data ...
            ];
    
            DB::table('employee')->insert($employeeData);
    
            return redirect()->route('backend.employee.create_employee')->with('success', 'New employee is successfully registered!');
        } else {
            $notification = [
                'messege' => 'Error registering new employee',
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
        }
    }
}
    