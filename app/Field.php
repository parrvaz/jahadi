<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $guarded=[];


    public function volunteers(){
        return $this->belongsToMany(Volunteer::class);
    }

    public function companies(){
        return $this->belongsToMany(Company::class);
    }
}
