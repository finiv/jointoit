<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = DB::table('employees')
            ->select('employees.*', 'companies.website', 'companies.name as company_name')
            ->join('companies', 'employees.company_id', '=', 'companies.id')
            ->paginate(10);

        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();

        return view('employees.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {

        $employee = new Employee([
            'first_name' => $request->get('first_name'),
            'last_name'  => $request->get('last_name'),
            'company_id' => $request->get('company_id'),
            'email'      => $request->get('email'),
            'phone'      => $request->get('phone'),
        ]);

        $employee->save();

        return redirect('/employees')->with('success', 'Employee saved!');
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
        $employee = Employee::find($id);
        $companies = Company::all();

        return view('employees.edit', compact('employee', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeUpdateRequest $request, $id)
    {

        $employee = Employee::find($id);

        $employee->first_name =  $request->get('first_name');
        $employee->last_name = $request->get('last_name');
        $employee->email = $request->get('email');
        $employee->company_id = $request->get('company_id');
        $employee->phone = $request->get('phone');

        $employee->save();

        return redirect('/employees')->with('success', 'Employee updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();

        return redirect('/employees')->with('success', 'Employee deleted!');
    }
}
