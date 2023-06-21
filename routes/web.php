<?php

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Backend\EmployeeController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/list_task/{usersID}', [App\Http\Controllers\backend\TaskController::class,'TaskList'])->name('backend.task.list_task');
Route::get('/add_task/{usersID}',[App\Http\Controllers\backend\TaskController::class,'TaskAdd'])->name('backend.task.create_task');
Route::post('/insert_task/{usersID}', [App\Http\Controllers\backend\TaskController::class,'TaskInsert']);
Route::get('/edit_task/{id}', [App\Http\Controllers\backend\TaskController::class,'TaskEdit']);
Route::post('/update_task/{id}', [App\Http\Controllers\backend\TaskController::class,'TaskUpdate']);
Route::get('/delete_task/{id}', [App\Http\Controllers\backend\TaskController::class,'TaskDelete']);

Route::get('user_list', [App\Http\Controllers\backend\UsermanagementController::class,'UserList'])->name('user.index');
Route::get('/edit_user/{id}', [App\Http\Controllers\backend\UsermanagementController::class,'UserEdit']);
Route::post('/update_user/{id}', [App\Http\Controllers\Backend\UsermanagementController::class, 'UserUpdate'])->name('update_user');
Route::get('/delete_user/{id}', [App\Http\Controllers\backend\UsermanagementController::class,'UserDelete']);

Route::get('register_employee', 'App\Http\Controllers\backend\EmployeeController@registerEmployee')->name('register_employee');
Route::post('register_insert', 'App\Http\Controllers\backend\EmployeeController@registerInsert')->name('register_insert');
Route::get('list_employee', [App\Http\Controllers\backend\EmployeeController::class,'EmployeeList'])->name('backend.employee.list_employee');
Route::get('health_status', [App\Http\Controllers\backend\EmployeeController::class,'HealthStatus'])->name('backend.employee.health_status');
Route::get('payroll_employee', [App\Http\Controllers\backend\EmployeeController::class,'PayrollStatus'])->name('backend.employee.payroll_employee');
Route::get('payroll_manager', [App\Http\Controllers\backend\EmployeeController::class,'PayrollAdd'])->name('backend.employee.payroll_manager');

Route::get('/add_employee/{id}',[App\Http\Controllers\backend\EmployeeController::class,'EmployeeAdd'])->name('backend.employee.create_employee');
Route::post('/insert_employee/{id}', [App\Http\Controllers\backend\EmployeeController::class,'EmployeeInsert']);
Route::get('/show_details/{id}', [App\Http\Controllers\backend\EmployeeController::class,'EmployeeShow'])->name('backend.employee.show_details');
Route::get('/edit_employee/{usersID}', [App\Http\Controllers\backend\EmployeeController::class,'EmployeeEdit']);
Route::post('/update_employee/{usersID}', [App\Http\Controllers\backend\EmployeeController::class,'EmployeeUpdate']);
Route::get('delete_employee/{id}', [App\Http\Controllers\backend\EmployeeController::class,'EmployeeDelete']);
Route::get('delete_details/{usersID}', [App\Http\Controllers\backend\EmployeeController::class,'DeleteDetails']);
Route::get('delete_Health/{id}', [App\Http\Controllers\backend\EmployeeController::class,'EmployeeDeleteHealth']);

// Payroll For Manager
Route::get('/view_payroll/{id}', [App\Http\Controllers\backend\EmployeeController::class,'ManagerShow'])->name('backend.employee.view_payroll');

// Attendance Link
Route::get('attendance', [EmployeeController::class, 'Attendance'])->name('backend.employee.attendance');
Route::get('view_link/{link}', [EmployeeController::class, 'viewLink'])->name('backend.employee.view_link');
Route::get('generate_link', [EmployeeController::class, 'generateLink'])->name('backend.employee.generate_link');
Route::post('/check-in/{link}', [EmployeeController::class, 'checkIn'])->name('backend.employee.check_in');
Route::post('/check-out/{link}', [EmployeeController::class, 'checkOut'])->name('backend.employee.check_out');

Route::get('deactivate_link', [EmployeeController::class, 'deactivateLink'])->name('backend.employee.deactivate_link');
Route::get('get_link', [EmployeeController::class, 'getActiveLink'])->name('active.link');
Route::get('page_link', [EmployeeController::class, 'pageLink'])->name('backend.employee.page_link');

// PDF Attendance Report
Route::get('/generate_report', [EmployeeController::class, 'generatePDF'])->name('generate_pdf');
Route::get('/filterMonth', [EmployeeController::class, 'filterMonth'])->name('attendance.filter');
Route::get('/filterYear', [EmployeeController::class, 'filterYear'])->name('attendance.year');
Route::get('/addEmployeeAttendance', [EmployeeController::class, 'addEmployeeAttendance'])->name('backend.employee.addEmployeeAttendance');
Route::post('/storeEmployeeAttendance', [EmployeeController::class, 'storeEmployeeAttendance'])->name('backend.employee.storeEmployeeAttendance');

//Leave Application
Route::get('leave_admin', [EmployeeController::class, 'leaveAdmin'])->name('backend.employee.leave_admin');
Route::get('delete_employee/{id}', [EmployeeController::class,'EmployeeDelete_Leave']);
Route::get('leave_user', [EmployeeController::class, 'leaveUser'])->name('backend.employee.leave_user');

