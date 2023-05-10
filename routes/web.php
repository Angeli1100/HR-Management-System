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
Route::get('list_employee', [App\Http\Controllers\backend\EmployeeController::class,'EmployeeList'])->name('backend.employee.list_employee');;
Route::get('/add_employee/{usersID}/{employeeName}',[App\Http\Controllers\backend\EmployeeController::class,'EmployeeAdd'])->name('backend.employee.create_employee');
Route::post('/insert_employee/{usersID}', [App\Http\Controllers\backend\EmployeeController::class,'EmployeeInsert']);
Route::get('/show_details/{usersID}', [App\Http\Controllers\backend\EmployeeController::class,'EmployeeShow'])->name('backend.employee.show_details');
// Route::get('/edit_agent/{usersID}', [App\Http\Controllers\backend\AgentController::class,'AgentEdit']);
Route::get('/edit_employee/{usersID}', [App\Http\Controllers\backend\EmployeeController::class,'EmployeeEdit']);
Route::POST('/update_employee/{usersID}', [App\Http\Controllers\backend\EmployeeController::class,'EmployeeUpdate']);
Route::get('delete_employee/{id}', [App\Http\Controllers\backend\EmployeeController::class,'EmployeeDelete']);
Route::get('delete_details/{usersID}', [App\Http\Controllers\backend\EmployeeController::class,'DeleteDetails']);


// public function AgentInsert(Request $request, $usersID)
// {
//     $user = User::find($usersID);
//     $data = [
//         'usersID' => $user->id,
//         'agentName' => $user->name,
//         'agentCat' => $request->agentCat,
//         'registrationNum' => $request->registrationNum,
//         'contact' => $request->contact,
//         'address' => $request->address,
//         'city' => $request->city,
//         'postcode' => $request->postcode,
//         'state' => $request->state,
//         'country' => $request->country,
//         'remarks' => $request->remarks,
//     ];
//     $insert = DB::table('agent')->insert($data);
    
//     if ($insert) {
//         return redirect()->route('backend.agent.show_details', ['usersID' => $usersID])->with('success', 'Agent details added successfully!');
//         // return redirect()->route('backend.agent.show_details')->with('success', 'Agent details added successfully!');
//     } else {
//         $notification = [
//             'messege' => 'Error creating agent',
//             'alert-type' => 'error'
//         ];
//         return redirect()->route('backend.agent.show_details')->with($notification);
//     }
// }
