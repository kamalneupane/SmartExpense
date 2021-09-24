<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
        'user_id',
        'company_id',
        'name',
    ];
    public static function whereUser($company_id = NULL){
        $company_id = ($company_id == NULL) ? Auth::user()->company_id : $company_id;
        return DB::select(DB::raw("
            SELECT c.id, c.company_id, c.name, c.created_at, c.updated_at
            FROM categories c
            WHERE c.company_id = $company_id
          /*  GROUP BY c.id  */
            ORDER BY c.name ASC
        "));
    }
}
