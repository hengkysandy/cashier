<?php

namespace App\Http\Controllers;

use App\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
	public function view(){
		$employees = Employee::all();

		return view('employee',compact('employees'));
	}

    public function create(Request $request)
    {
    	Employee::create([
    		'role_id' => 2, //staff
    		'email' => $request->email,
    		'name' => $request->name,
    		'password' => $request->password,
    		'status' => 'active',
    	]);

    	return back();
    }

	public function update(Request $request){
		$employee = Employee::find($request->id);
		$employee->email = $request->email;
		$employee->name = $request->name;
		$employee->password = $request->password;
		$employee->save();

		return back();
	}

	public function delete($id){
		$employee = Employee::find($id);
		$employee->delete();

		return back();
	}
}
