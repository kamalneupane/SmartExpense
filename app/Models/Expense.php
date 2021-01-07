<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $table = 'expenses';
    protected $fillable = [
        'user_id',
        'company_id',
        'category_id',
        'period_id',
        'budget_id',
        'approver_id',
        'priority',
        'price',
        'outside',
        'subject',
        'description',
        'file',
        'status',
        'comments',
    ];
}
