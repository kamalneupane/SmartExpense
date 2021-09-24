<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Company;
use App\Models\User;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
        $this->categories = new Category();
        $this->companies = new Company();
        $this->users = new User();
    }
    public function index(){
        return view('users.index');
    }
    public function create(){
        $data['roles']  =$this->users->roles();
        $data['companies']=$this->companies->whereUser();
        $data['categories']=$this->categories->whereUser();
        return view('users.create',$data);
    }
    public function store(CreateUserRequest $request){
        $parent_id= Auth::user()->id;

        $data['parent_id']  = $parent_id;
        $data['company_id'] = $request->company_id;
        $data['country'] = $request->country;
        $data['name'] = $request->name;
        $data['password'] = bcrypt($request->password);
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['city'] = $request->city;
        $data['address'] = $request->address;
        $data['post_code'] = $request->post_code;
        $data['role'] = $request->role;
        $data['status'] = $request->status;
        $data['logo'] = $request->logo;

        $user=new User($data);
        $user->save();
        if(count($request->access)>0)
        {
            $user_id = $users->id;

            foreach($request->access as $companyId -> $category)
            {
                if(count($category)>0)
                {
                    foreach($category as $cat){
                        $ud['user_id']      = $user_id;
                        $ud['company_id']   = $companyId;
                        $ud['category_id']  = $cat;

                        $user_detail = new $user_id;
                        $user_detail->save();
                    }
                }
            }
        }
        return redirect()->route('user.index')->with('message','New Record Inserted');
    }
    public function edit(){

    }
    public function update(){

    }
    public function delete(){
        
    }
}
