<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}