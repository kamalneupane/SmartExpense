<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Period;

class CategoriesPeriodsController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
        $this->categories = new Category();
        $this->periods = new Period();
    }
    public function index(){
        $data['categories'] = $this->categories->orderBy('name','ASC')->get()->where('company_id',Auth::user()->company_id);
        $data['periods'] = $this->periods->get();
        return view('categories_periods.index',$data);
    }
}
