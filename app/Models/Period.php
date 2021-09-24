<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Period extends Model
{
    use HasFactory;
    protected $table = 'Periods';
    protected $fillable = [
        'user_id',
        'company_id',
        'from',
        'to',
    ];
    public function whereUser(){
        $company_id = Auth::user()->company_id;
        return DB::table('periods')->where('company_id',$company_id)->orderBy('id','DESC')->get();
    }
}
