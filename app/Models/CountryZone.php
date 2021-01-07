<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

class CountryZone extends Model
{
    use HasFactory;
    protected $table='country_zones';
    protected $fillable=[
        'code','name',
    ];
    public function zones(){
        $country_id = Input::get('id');
        return CountryZone::where('country_id',$country_id)->get();
    }
}
