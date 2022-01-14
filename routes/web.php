<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Default
Route::get('/', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);
Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);

// Login
Route::get('login', [ 'as' => 'login', 'uses' => 'LoginController@getLogin']);
Route::post('login', [ 'as' => 'login', 'uses' => 'LoginController@postLogin']);

// Logout
Route::get('logout', [ 'as' => 'logout', 'uses' => 'LogoutController@getLogout']);

// User
Route::get('user', ['as' => 'userlist', 'uses' => 'UserController@index']);
Route::post('userinsert', ['as' => 'userinsert', 'uses' => 'UserController@insert']);
Route::get('user/{id}', ['as' => 'userdelete', 'uses' => 'UserController@delete']);
Route::get('user/edit/{id}', ['as' => 'useredit', 'uses' => 'UserController@edit']);
Route::put('userupdate/{id}', ['as' => 'userupdate', 'uses' => 'UserController@update']);

// Employee
Route::get('employee', ['as' => 'employeelist', 'uses' => 'EmployeesController@index']);
Route::get('employeedetail/{EmployeeID}', ['as' => 'employeedetail', 'uses' => 'EmployeesController@show']);
Route::post('employeeinsert', ['as' => 'employeeinsert', 'uses' => 'EmployeesController@insert']);
Route::get('employee/edit/{EmployeeID}', ['as' => 'employeeedit', 'uses' => 'EmployeesController@edit']);
Route::put('employeeupdate/{EmployeeID}', ['as' => 'employeeupdate', 'uses' => 'EmployeesController@update']);
Route::get('employee/{EmployeeID}', ['as' => 'employeedelete', 'uses' => 'EmployeesController@delete']);

// Division
Route::get('division', ['as' => 'divisionlist', 'uses' => 'ActivitiesController@index']);
Route::post('divisioninsert', ['as' => 'divisioninsert', 'uses' => 'ActivitiesController@insert']);
Route::get('division/edit/{ActivityID}', ['as' => 'divisionedit', 'uses' => 'ActivitiesController@edit']);
Route::put('divisionupdate/{ActivityID}', ['as' => 'divisionupdate', 'uses' => 'ActivitiesController@update']);
Route::get('division/{ActivityID}', ['as' => 'divisiondelete', 'uses' => 'ActivitiesController@delete']);

// Position
Route::get('position', ['as' => 'positionlist', 'uses' => 'PositionController@index']);
Route::post('positioninsert',['as' => 'positioninsert', 'uses' => 'PositionController@insertPosition']);
Route::get('position/{PositionID}', ['as' => 'positiondel', 'uses' => 'PositionController@delPosition']);
Route::get('position/edit/{PositionID}', ['as' => 'positionedit', 'uses' => 'PositionController@editPosition']);
Route::put('update/{PositionID}', ['as' => 'positionupdate', 'uses' => 'PositionController@updatePosition']);
Route::get('employee', ['as' => 'employeelist', 'uses' => 'EmployeesController@index']);

// Project
Route::get('project', ['as' => 'projectlist', 'uses' => 'ProjectController@index']);
Route::get('projectdetail/{ProjectID}', ['as' => 'projectdetail', 'uses' => 'ProjectController@show']);
Route::get('project/create', ['as' => 'projectcreate', 'uses' => 'ProjectController@create']);
Route::post('projectinsert',['as' => 'projectinsert', 'uses' => 'ProjectController@insert']);
Route::get('project/{ProjectID}', ['as' => 'projectdel', 'uses' => 'ProjectController@delete']);
Route::get('project/edit/{ProjectID}', ['as' => 'projectedit', 'uses' => 'ProjectController@edit']);
Route::put('projectupdate/{ProjectID}', ['as' => 'projectupdate', 'uses' => 'ProjectController@update']);

// Employee_Project
Route::post('employeeprojectinsert/{ProjectID}',['as' => 'employeeprojectinsert', 'uses' => 'Employees_ProjectController@insert']);
Route::get('employeeprojectdelete', ['as' => 'employeeprojectdelete', 'uses' => 'Employees_ProjectController@delete']);

// Material_Project
Route::put('materialprojectupdate/{ProjectID}',['as' => 'materialprojectupdate', 'uses' => 'Materials_ProjectController@update']);

// Project_Progress
Route::put('projectprogressupdate/{ProjectID}',['as' => 'projectprogressupdate', 'uses' => 'Project_ProgressController@update']);

// End Project
Route::put('projectend/{ProjectID}', ['as' => 'projectend', 'uses' => 'ProjectController@endProject']);
