<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    protected $guarded=[];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function timing(){
        return $this->belongsTo(Timing::class);
    }

    public function activities(){
        return $this->hasMany(Activity::class);
    }

    public function groups(){
        return $this->belongsToMany(Group::class);
    }
    public function fields(){
        return $this->belongsToMany(Field::class);
    }

    public function company(){
        return $this->user->company();
    }


}
