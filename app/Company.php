<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded=[];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function groups(){
        return $this->hasMany(Group::class,'owner_company_id');
    }

    public function member_groups(){
        return $this->belongsToMany(Group::class);
    }

    public function fields(){
        return $this->belongsToMany(Field::class);
    }
}
