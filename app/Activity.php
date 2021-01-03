<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $guarded=[];


    public function volunteer(){
        return $this->belongsTo(Volunteer::class);
    }

    public function user(){
        return $this->volunteer->user();
    }
}
