<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Employer;

class EmployerController extends Controller
{
    public function showEmployees(){
        if (Auth::check()) {
            $employees = Employer::get();
            return view('admin.employees')->with('employees', $employees);
        }
        else {
            return redirect('login');
        }
    }
}
