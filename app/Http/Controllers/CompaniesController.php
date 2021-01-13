<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateCompanyRequest;
use Illuminate\Support\Facades\Input;

// use Validator;

class CompaniesController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
        $this->companies = new Company;
        $this->users = new User;
        $this->colors = \App\Providers\Common::colors();
    }
    public function index(){
        $data['title'] = trans('app.companies-title');
        $data['colors'] = $this->colors;
        $data['users'] = $this->users;
        $data['companies'] = $this->companies->get();
        // dd($data);

        return view('companies.index', $data);
    }
    public function create(){
       $data['title'] = trans('app.companies-create');
        return view('companies.create', $data);
    }
    public function store(CreateCompanyRequest $request){
        $company = new Company($request->all());
        Auth::user()->companies()->save($company);
        
    
        //    $request ->validate([
    //         'name' => 'required| unique:companies,name,'.Auth::user()->id.'user_id',
    //     ]);
    //     $company = new Company;
    //     $user_id = Auth::user()->id;
    //     $company->name = $request->name;
    //     $company->user_id = $user_id;
    //     $company->save();
        return redirect()->route('company.index')->with('message','New Company Created');

    }
    public function active(){
        $user_id = Auth::user()->id;

        $company = Input::get('company');
        $companyid = base64_decode(urldecode($company));

        $cname = $this->companies->find($companyid);

        $user = $this->users->find($user_id);

        $user->company_id = $companyid;

        $user->company_name = $cname->name;
        $user->save();
        return redirect()->route('company.index')->with('message','New Compnay '.$cname->name.' is selected');
        }
}
