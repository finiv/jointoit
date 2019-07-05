<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::middleware(['middleware' => 'auth'])->prefix('admin')->group(function () {
    Route::get('/', 'Auth\LoginController@index')->name('index');
    Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard');
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('employees', 'EmployeeController');
    Route::resource('companies', 'CompanyController');

});

Route::get('email-test', function(){

    $details['email'] = 'your_email@gmail.com';

    dispatch(new App\Jobs\SendEmailJob($details));

});
Route::post('/companylist', 'Admin\DashboardController@getListOfCompanies')->name('getCompanyList');
