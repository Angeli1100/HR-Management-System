<?php


namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PayrollController extends Controller
{
    public function AddPayroll()
    {
         return view('backend.employee.payroll_manager');
    }
   
}
