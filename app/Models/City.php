<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\State;
use App\Models\Employee;

class City extends Model
{

    protected $fillable = [

    'state_id',
    'name',

    ];

    //one to one
    //many to one
    public function state(){
        return $this->belongsTo(State::class);
    }

    //one to many
    public function employees(){
        return $this->hasMany(Employee::class);
    }

    use HasFactory;
}
