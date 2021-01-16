<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Models\Period;

class PeriodsController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
        $this->periods = new Period();
    }
    public function index(){

    }
    public function create(){

    }
    public function store(Request $request){
        $vaidated = $request->validate([
            'from'=>'required',
            'to'=>'required',
        ]);
        $periods = new Period($request->all());
        $periods->save();
        return redirect()->back()->with('message','period successfully created');
    }
    public function edit($id){
        $data['period'] = $this->periods->where('id',$id)->first();
        return view('periods.edit',$data);
    }
    public function update(Request $request,$id){
        $validated = $request->validate([
            'from' => 'required',
            'to'   => 'required',
        ]);
        $period = $this->periods->where('id',$id)->first();
        $period->from = $request->from;
        $period->to = $request->to;
        $period->save();
        return redirect()->route('categories-periods.index')->with('message','periods successfully updated');
    }
    public function delete($id){
        $periods = Period::find($id);
        $periods->delete();
        return redirect()->back()->with('error','Periods deleted successfully');
    }
}
