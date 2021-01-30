<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\crm;

class ApplicationData extends Controller
{
    //

    //view data
    public function index(){
        return view('companies',['companies' => crm::paginate(10)]);
    }
    //view create form
    public function create(){
        return view('index');
    }

    //stores companies data to db
    public function storecompanies(Request $request)
    {

        $this->validate($request,
            [
                'name'=>'required',
                'email'=>'required',
                   
            ]);

        $data = new crm();
          
        $data->name = request('name');
        $data->email = request('email');
        $data->logo = request('logo');
        $data->website = request('website');
        

        $data->save();

        return redirect()->route('companies');
    }

    //stores employees data to db
    public function store(Request $request)
    {

        $this->validate($request,
            [
                'first_name'=>'required',
                'last_name'=>'required',
                'company'=>'required'
            
                ]);

        $data = new crm();
          
        $data->first_name = request('first_name');
        $data->last_name = request('last_name');
        $data->company = request('company');
        $data->email = request('email');
        $data->phone = request('phone');
        

        $data->save();

        return redirect()->route('companies');
    }

    //edit companies
    public function editcompanies($id){
        return view('editcompanies',['companies' => crm::find($id)]);
    }

    //edit employees
    public function editemployees($id){
        return view('editemployees',['employees' => crm::find($id)]);
    }

    //update  companies
    public function updatecompanies(Request $request, $id){
        $this->validate($request,
            [
                'name'=>'required',
                'email'=>'required',
                
                
            ]);

        $edited_companies = crm::find($id);
        $edited_companies->name = request('name');
        $edited_companies->email = request('email');
        $edited_companies->logo = request('logo');
        $edited_companies->website = request('website');
    

        $edited_companies->save();

        return redirect()->route('companies');

    }

    //update  employees
    public function updateemployees(Request $request, $id){
        $this->validate($request,
            [
                'first_name'=>'required',
                'last_name'=>'required',
                'company'=>'required'
                
            ]);

        $edited_employees = crm::find($id);
        $edited_employees->first_name = request('first_name');
        $edited_employees->last_name = request('last_name');
        $edited_employees->company = request('company');
        $edited_employeest->email = request('email');
        $edited_employees->phone = request('phone');

        $edited_employees->save();

        return redirect()->route('employees');

    }

    //delete companies
    public function destroycompanies($id){
        crm::find($id)->delete();
        return redirect() -> route('companies');
    }

    //delete employees
    public function destroyemployees($id){
        crm::find($id)->delete();
        return redirect() -> route('employees');
    }
}

