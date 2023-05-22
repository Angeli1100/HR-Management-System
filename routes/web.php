<?php

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

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

// Route::get('/list_task/{usersID}', [App\Http\Controllers\backend\TaskController::class,'AgentViewList'])->name('backend.task.list_task');

Route::get('user_list', [App\Http\Controllers\backend\UsermanagementController::class,'UserList'])->name('user.index');
Route::get('/edit_user/{id}', [App\Http\Controllers\backend\UsermanagementController::class,'UserEdit']);
Route::post('/update_user/{id}', [App\Http\Controllers\backend\UsermanagementController::class,'UserUpdate']);
Route::get('/delete_user/{id}', [App\Http\Controllers\backend\UsermanagementController::class,'UserDelete']);

Route::get('register_employee', 'App\Http\Controllers\backend\EmployeeController@registerEmployee')->name('register_employee');
Route::post('register_insert', 'App\Http\Controllers\backend\EmployeeController@registerInsert')->name('register_insert');
Route::get('list_employee', [App\Http\Controllers\backend\EmployeeController::class,'EmployeeList'])->name('backend.employee.list_employee');
Route::get('health_status', [App\Http\Controllers\backend\EmployeeController::class,'HealthStatus'])->name('backend.employee.health_status');
// Route::get('/addpayroll', [App\Http\Controllers\backend\PayrollController::class,'AddPayroll'])->name('backend.employee.addpayroll');
Route::get('payroll_manager', [App\Http\Controllers\backend\EmployeeController::class,'PayrollAdd'])->name('backend.employee.payroll_manager');
#Route::post('/payroll', [PayrollController::class, 'store'])->name('payroll.store');

Route::get('/add_employee/{id}',[App\Http\Controllers\backend\EmployeeController::class,'EmployeeAdd'])->name('backend.employee.create_employee');
Route::post('/insert_employee/{id}', [App\Http\Controllers\backend\EmployeeController::class,'EmployeeInsert']);
Route::get('/show_details/{id}', [App\Http\Controllers\backend\EmployeeController::class,'EmployeeShow'])->name('backend.employee.show_details');
// Route::get('/edit_agent/{usersID}', [App\Http\Controllers\backend\AgentController::class,'AgentEdit']);
Route::get('/edit_employee/{usersID}', [App\Http\Controllers\backend\EmployeeController::class,'EmployeeEdit']);
Route::POST('/update_employee/{usersID}', [App\Http\Controllers\backend\EmployeeController::class,'EmployeeUpdate']);
Route::get('delete_employee/{id}', [App\Http\Controllers\backend\EmployeeController::class,'EmployeeDelete']);
Route::get('delete_details/{usersID}', [App\Http\Controllers\backend\EmployeeController::class,'DeleteDetails']);
Route::get('delete_Health/{id}', [App\Http\Controllers\backend\EmployeeController::class,'EmployeeDeleteHealth']);

