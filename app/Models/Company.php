<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Company extends Model
{
    use HasFactory;
    protected $table = 'companies';
    protected $fillable = [
        'user_id',
        'name'
    ];
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function whereUser(){
        $user = Auth::user()->id;
        if(Auth::user()->parent_id != 0){
            $user = Auth::user()->parent_id;
        }
        return DB::select(DB::raw("
            SELECT *
            FROM companies as c
            WHERE user_id = $user            
        "));
    }
}
