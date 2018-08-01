<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Company;

class CompanyController extends Controller
{
    public function showCompanies(){
       if (Auth::check()){
           $companies = Company::all();
           return view('admin.companies')->with('companies',$companies);
       }
       else {
          return redirect('login');
        }
    }

    public function  addCompany() {
       return view('admin.add_company');
    }
}
