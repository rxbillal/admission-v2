<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalInfo extends Model
{
    use HasFactory;
    protected $guarded =[];
    public function city()
    {
        return $this->hasOne(City::class, 'city_code','state');
    }
}
