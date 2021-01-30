<?php

namespace app\Http\Controllers;

use Illuminate\Support\Facades\Route;


use app\Models\crm;

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
    return view('welcome');
});

Route::get('/page', function () {
    return view('page');
});

Route::get('create',[ApplicationData::class,'create'])->name('create');

//store data route
Route::post('storecompanies',[ApplicationData::class,'storecompanies'])->name('storecompnaies');
Route::post('storeemployees',[ApplicationData::class,'storeemployees'])->name('storeemployees');

//view companies  data
Route::get('companies','ApplicationData@index')->name('companies');
//view employee data
Route::get('employees',[ApplicationData::class,'index'])->name('employees');


// //view data
// Route::get('view',[ApplicationData::class,'index'])->name('view');

// //edit 
 Route::get('editcompanies/{id}',[ApplicationData::class,'editcompanies'])->name('editcompanies');
 Route::get('editemployees/{id}',[ApplicationData::class,'editemployees'])->name('editemployees');

 //update edited data
Route::post('updatecompanies/{id}',[ApplicationData::class,'update'])->name('update');
Route::post('updateemployees/{id}',[ApplicationData::class,'update'])->name('update');

// //delete project
// Route::get('deletecompanies/{id}',[ApplicationData::class,'destroy'])->name('deletecompanies');
// Route::get('deletecompanies/{id}',[ApplicationData::class,'destroy'])->name('deletecompanies');


//Auth::routes();

//Route::get('/home', [ApplicationData::class, 'index'])->name('home');
