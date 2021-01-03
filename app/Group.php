<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $guarded=[];

    public function company(){
        return $this->belongsTo(Company::class,'owner_company_id');
    }

    public function companies(){
        return $this->belongsToMany(Company::class);
    }

    public function volunteers(){
        return $this->belongsToMany(Volunteer::class);
    }

    public function user(){
        return $this->company->user();
    }
}
