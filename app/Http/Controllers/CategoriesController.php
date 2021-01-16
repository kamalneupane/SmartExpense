<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Http\Requests\CreateCategoryRequest;
use Illuminate\Support\Facades\Input;

class CategoriesController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
        $this->categories = new Category();
    }
    public function index(){
        
    }
    public function create(){
        return view('categories.create-category');
    }
    public function store(Request $request){
        $validated = $request->validate([
            'name'=>'required',
        ]);
        $category = new Category($request->all());
        $category->save();
        return redirect()->back()->with('message','Category created successfully');
    }
    public function edit($id){
        $data['category'] = $this->categories->where('id',$id)->first();
        return view('categories.edit-category',$data);
    }
    public function update(Request $request,$id){
        $validated = $request->validate([
            'name' => 'required',
        ]);
        $category = $this->categories->where('id',$id)->first();
        $category->name = $request->name;
        $category->save();
        return redirect()->route('categories-periods.index')->with('message','Category updated successfully.');
    }
    public function delete($id){
        $category = Category::find($id);
        $category->delete();
        return redirect()->back()->with('error','Cateory Deleted successfully');
    }
}
