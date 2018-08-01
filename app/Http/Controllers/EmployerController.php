<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployerController extends Controller
{
    public function showEmployees(){
        return view('admin.employees');
    }
}
