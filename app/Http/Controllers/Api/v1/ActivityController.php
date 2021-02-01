<?php

namespace App\Http\Controllers\Api\v1;

use App\Activity;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\ActivitiesValidation;
use App\Http\Resources\v1\Activity\ActivityCollection;
use App\Http\Resources\v1\Volunteer\VolunteerResource;
use App\Traits\StatisticsTrait;
use App\Volunteer;

class ActivityController extends Controller
{
    use StatisticsTrait;
    public function store(ActivitiesValidation $validation,Volunteer $volunteer){

        $volunteer->activities()->create([
            'date'=>$this->jToG($validation['date']),
            'hour'=> $validation['hour'],
            'description'=> $validation['description'],
        ]);

        return new ActivityCollection($volunteer->activities()->orderBy('date')->get(),$volunteer->name);
    }

    public function update(ActivitiesValidation $validation,Activity $activity){
        $activity->update([
            'date'=>$this->jToG($validation['date']),
            'description'=> $validation['description']
        ]);

        return new VolunteerResource($activity->volunteer);
    }

    public function show(Volunteer $volunteer){
        if ($volunteer->user->id == auth()->user()->id)
            return new ActivityCollection($volunteer->activities()->orderBy('date')->get(),$volunteer->name);
        elseif (auth()->user()->company->confirmed == 1){
            return new ActivityCollection($volunteer->activities()->orderBy('date')->get(),$volunteer->name);
        }elseif ($volunteer->public_show > 1)
                return new ActivityCollection($volunteer->activities()->orderBy('date')->get(),$volunteer->name);
        else{
            $accessLevel = auth()->user()->company->member_groups()
                ->whereIn('id',$volunteer->groups()->pluck('id'))->max('access_level');
            if ($accessLevel >1 )
                return new ActivityCollection($volunteer->activities()->orderBy('date')->get(),$volunteer->name);

        }//group


        return $this->permissionDenied();

    }


    public function showPublicActivity(Volunteer $volunteer){
        if (auth()->user()->company->confirmed == 1){
           return new ActivityCollection($volunteer->activities()->orderBy('date')->get(),$volunteer->name);
        }else{
            if ($volunteer->public_show>1)
                return new ActivityCollection($volunteer->activities()->orderBy('date')->get(),$volunteer->name);

        }

        return $this->permissionDenied();
    }

    public function destroy(Activity $activity){

        $volunteer=$activity->volunteer;
        $activity->delete();
        return new ActivityCollection($volunteer->activities()->orderBy('date')->get(),$volunteer->name);

    }
}
