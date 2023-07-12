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
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\Authenticatable;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
        ]);
    }

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

            return $insert;
        } else {
            return null;
        }
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        if ($user) {
            $this->guard()->login($user);

            return $this->registered($request, $user)
                ?: redirect($this->redirectPath());
        } else {
            $notification = [
                'message' => 'Error registering new employee',
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
        }
    }

    protected function registered(Request $request, Authenticatable $user)
    {
        return redirect()->route('backend.employee.create_employee', ['id' => $user->id])->with('success', 'New employee is successfully registered!');
    }
}
