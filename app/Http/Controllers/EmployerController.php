<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Employer;

class EmployerController extends Controller
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

            $employees = Employer::orderByDesc('id')->paginate(10);
            return view('admin.employees',['employees'=>$employees]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add_employer');
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
            'firstname' => 'required',
            'lastname' => 'required',
            'company' => 'required',
            'email' => 'required',
            'phone' => 'required'
        );

        $this->validate($request,$rules);
        $employer = new Employer();

        $employer->firstname = $request->firstname;
        $employer->lastname = $request->lastname;
        $employer->company = $request->company;
        $employer->email = $request->email;
        $employer->phone = $request->phone;

        $employer->save();

        session(['success'=> 'Employer has been added']);

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
        $employer = Employer::find($id);
        return view('admin.edit_employer',['employer'=> $employer]);
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
            'firstname' => 'required',
            'lastname' => 'required',
            'company' => 'required',
            'email' => 'required',
            'phone' => 'required'
        );

        $this->validate($request,$rules);
        $employer = Employer::find($id);

        $employer->firstname = $request->firstname;
        $employer->lastname = $request->lastname;
        $employer->company = $request->company;
        $employer->email = $request->email;
        $employer->phone = $request->phone;

        $employer->save();

        session(['success'=> 'Employer has been updated']);

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
        $employer = Employer::find($id);
        $employer->delete();

        session(['success'=> 'Employer has been deleted']);

        return redirect()->back();
    }
}
