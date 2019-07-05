<?php
namespace App\Http\Controllers;
use App\Http\Requests\CompanyRequest;
use App\Http\Requests\CompanyUpdateRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Company;
use App\Mail\NewCompanyNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
//use App\Http\Requests\Company;

class CompanyController extends Controller
{
    private $realFilePath = 'app/public/company_logos';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = DB::table('companies')->paginate(10);
        return view('companies.index', ['companies' => $companies]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('companies.create');
    }
    public function store(CompanyRequest $request)
    {

        $name = $request->get('name');
        $email = $request->get('email');
        $logo = $request->file('logo');
        $extension = $logo->getClientOriginalExtension();
        $logoName = $name . '_' . time() . '.' . $extension;
        $urlPath = 'storage/company_logos' . DIRECTORY_SEPARATOR . $logoName;
        $logo->move(storage_path($this->realFilePath), $logoName);
        $company = new Company([
            'name'    => $name,
            'email'   => $email,
            'logo'    => $urlPath,
            'website' => $request->get('website'),
        ]);
        $company->save();
        Mail::to($email)->send(new NewCompanyNotification());
        return redirect('/companies')->with('success', 'Company saved!');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function read(Company $company)
    {
        //
    }
    public function edit($id)
    {
        $company = Company::find($id);
        return view('companies.edit', compact( 'company'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyUpdateRequest $request, Company $company)
    {

        $company->name =  $request->get('name');
        $company->email = $request->get('email');
        $company->website = $request->get('website');
        $company->save();
        return redirect('/companies')->with('success', 'Company updated!');
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

        if (isset($company->logo) && file_exists($company->logo)) {
            unlink($company->logo);
        }
        $company->delete();
        return redirect('/companies')->with('success', 'Company deleted!');

    }
}

