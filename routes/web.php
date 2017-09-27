<?php

use Illuminate\Http\Request;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/join', function (Request $request) {
    if ($request->has('hire_date')) {
        return DB::table('employees')
            ->leftJoin('dept_emp', 'dept_emp.emp_no', '=', 'employees.emp_no')
            ->where('employees.hire_date', '<', $request->hire_date)
            ->get();
    } else {
        return [
            'Nothing to search'
        ];
    }
});

Route::get('/select', function (Request $request) {
    if ($request->has('name')) {
        return DB::table('employees')
            ->where('employees.first_name', 'LIKE', '%' . $request->name . '%')
            ->get();
    } else {
        return [
            'Nothing to search'
        ];
    }
});
