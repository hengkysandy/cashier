<?php

namespace App\Http\Controllers;

use App\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
	public function view(){
		if(session()->get('userSession')->role_id == 2) return back();
		$employees = Employee::all();

		return view('employee',compact('employees'));
	}

	public function login(Request $request)
	{
		$login = Employee::where('name',$request->name)
						->where('password',$request->password)
						->first();

		if($login){
			$request->session()->put('userSession', $login);
			return redirect('home');
		}else{
			return redirect()->back()->withErrors('');
		}
		
	}

	public function logoutUser(Request $request)
    {
        $request->session()->forget('userSession');
        return redirect('/');
    }

    public function create(Request $request)
    {
		$employees = Employee::all();

		foreach($employees as $employee){
			if($employee->name == $request->name)
				return redirect()->back()->withErrors('');
		}

    	Employee::create([
    		'role_id' => $request->role,
    		'email' => $request->email,
    		'name' => $request->name,
    		'password' => $request->password,
    		'status' => 'active',
    	]);

    	return back();
    }

	public function update(Request $request){
		$employee = Employee::find($request->id);
		$employee->role_id = $request->role;
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
