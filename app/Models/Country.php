<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
use App\Models\State;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [

        'country_code',
        'name',

    ];

    //one to many
    public function employees(){
        return $this->hasMany(Employee::class);
    }

    //one to many
    public function states(){
        return $this->hasMany(State::class);
    }

}
