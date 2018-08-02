<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use App\Company;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

            $companies = Company::orderByDesc('id')->paginate(10);
            return view('admin.companies',['companies'=>$companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.add_company');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'email' => 'required',
            'logo' => 'required | mimes:jpeg,jpg,png | max:1000 | dimensions:min_width=100,min_height=100',
            'website' => 'required'
        );

        $this->validate($request,$rules);

        $company = new Company();
        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $RandomAccountNumber = uniqid();
            $name = $RandomAccountNumber.'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('..\storage\app\public');

            $imagePath = $destinationPath. "\\".  $name;
            $image->move($destinationPath, $name);
            $path = storage_path();
          $company->logo = '/storage/app/public/'.$name;

        }
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;

        $company->save();

        session(['success'=> 'Company has been added']);

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        return view('admin.edit_company',['company'=> $company]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = array(

            'name' => 'required',
            'email' => 'required',
            'logo' => 'mimes:jpeg,jpg,png | max:1000 | dimensions:min-width=100,min-height=100',
            'website' => 'required'
        );

        $this->validate($request,$rules);

        $company = Company::find($id);
        $logo = $company->logo;
        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $RandomAccountNumber = uniqid();
            $name = $RandomAccountNumber.'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('..\storage\app\public');

            $imagePath = $destinationPath. "\\".  $name;
            $image->move($destinationPath, $name);
            $path = storage_path();
            $company->logo = '/storage/app/public/'.$name;

        }
        else {
            $company->logo = $logo;
        }
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;

        $company->save();

        session(['success'=> 'Company has been updated']);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);
         $company->delete();

        session(['success'=> 'Company has been deleted']);

        return redirect()->back();

    }
}
