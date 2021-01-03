<?php

namespace App\Http\Controllers\Api\v1;

use App\Activity;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\ActivitiesValidation;
use App\Http\Resources\v1\Activity\ActivityCollection;
use App\Http\Resources\v1\Volunteer\VolunteerResource;
use App\Traits\StatisticsTrait;
use App\Volunteer;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    use StatisticsTrait;
    public function store(ActivitiesValidation $validation,Volunteer $volunteer){

        $volunteer->activities()->create([
            'date'=>$this->jToG($validation['date']),
            'description'=> $validation['description']
        ]);

        return new VolunteerResource($volunteer);
    }

    public function update(ActivitiesValidation $validation,Activity $activity){
        $activity->update([
            'date'=>$this->jToG($validation['date']),
            'description'=> $validation['description']
        ]);

        return new VolunteerResource($activity->volunteer);
    }

    public function show(Volunteer $volunteer){
        return new ActivityCollection($volunteer->activities()->get());
    }

    public function destroy(Activity $activity){
        $activity->delete();
        return $this->deleteResponse();
    }
}
