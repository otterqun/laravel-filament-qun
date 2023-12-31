<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Department;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [

        'first_name',
        'last_name',
        'address',
        'city_id',
        'state_id',
        'country_id',
        'department_id',
        'zip_code',
        'birth_date',
        'date_hired',
    ];


    //one to one
    //many to one
    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function state(){
        return $this->belongsTo(State::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }

}
