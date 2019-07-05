<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Company;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index ()
    {
        $companies = Company::all();
        echo "<pre>";

        foreach ($companies as $company) {
            print_r($company->toArray());
        }

        return view('admin.dashboard');
    }
}
