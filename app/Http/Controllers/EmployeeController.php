<?php

namespace App\Http\Controllers;

use App\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
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
}
