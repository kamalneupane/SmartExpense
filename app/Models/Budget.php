<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;
    protected $table = 'budgets';
    protected $fillable = [
        'user_id',
        'company_id',
        'category_id',
        'period_id',
        'item',
        'unit',
        'quantity',
        'budget',
    ];
}
