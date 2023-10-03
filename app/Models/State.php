<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;
use App\Models\Employee;
use App\Models\City;

class State extends Model
{
    use HasFactory;

    protected $fillable = [

        'country_id',
        'name',

    ];

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function employees(){
        return $this->hasMany(Employee::class);
    }

    public function cities(){
        return $this->hasMany(City::class);
    }
}
