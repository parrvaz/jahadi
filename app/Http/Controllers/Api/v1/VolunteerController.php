<?php


namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;

use App\Http\Requests\Api\v1\Volunteer\VolunteerStoreValidation;
use App\Http\Requests\Api\v1\Volunteer\VolunteerUpdateValidation;
use App\Http\Resources\v1\Volunteer\VolunteerCollection;
use App\Http\Resources\v1\Volunteer\VolunteerResource;
use App\Timing;
use App\Traits\StatisticsTrait;
use App\User;
use App\Volunteer;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    use StatisticsTrait;
    public function store(VolunteerStoreValidation $validation){

        $timing_id = Timing::create([
            'type'=>$validation['type'],
            'period'=>$validation['period'],
            'number'=>$validation['number'],
        ])->id;

        $volunteer = auth()->user()->volunteers()->create([
            'name'=>$validation['name'],
            'profession'=>$validation['profession'],
            'mobile'=>$validation['mobile'],
            'phone'=>$validation['phone'],
            'social_media'=>$validation['social_media'],
            'fax'=>$validation['fax'],
            'description'=>$validation['description'],
            'public_show'=>$validation['public_show'],

            'timing_id'=>$timing_id,
        ]);

        return new VolunteerResource($volunteer);
    }

    public function update(VolunteerStoreValidation $validation,Volunteer $volunteer){

        $volunteer->timing()->update([
            'type'=>$validation['type'],
            'period'=>$validation['period'],
            'number'=>$validation['number'],
        ]);

        $volunteer->update([
            'name'=>$validation['name'],
            'profession'=>$validation['profession'],
            'mobile'=>$validation['mobile'],
            'phone'=>$validation['phone'],
            'social_media'=>$validation['social_media'],
            'fax'=>$validation['fax'],
            'description'=>$validation['description'],
            'public_show'=>$validation['public_show'],
        ]);

        return new VolunteerResource($volunteer);
    }

    public function show(){
        $volunteers= auth()->user()->volunteers()->get();
        return new VolunteerCollection($volunteers);
    }

    public function showSingle(Volunteer $volunteer){
        return new VolunteerResource($volunteer);
    }

    public function destroy(Volunteer $volunteer){
        $volunteer->delete();
        return $this->deleteResponse();
    }

}
