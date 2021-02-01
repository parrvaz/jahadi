<?php


namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;

use App\Http\Requests\Api\v1\Volunteer\VolunteerStoreValidation;
use App\Http\Requests\Api\v1\Volunteer\VolunteerUpdateValidation;
use App\Http\Resources\v1\Volunteer\LevelResource;
use App\Http\Resources\v1\Volunteer\VolunteerCollection;
use App\Http\Resources\v1\Volunteer\VolunteerResource;
use App\Timing;
use App\Traits\StatisticsTrait;
use App\User;
use App\Volunteer;

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
            'fax'=>$validation['state'],
            'state'=>$validation['city'],
            'city'=>$validation['fax'],
            'description'=>$validation['description'],
            'public_show'=>$validation['public_show'],

            'timing_id'=>$timing_id,
        ]);

        if (auth()->user()->company == null)
            auth()->user()->update(['type'=> true]);

        $this->increaseFieldCount($validation['fields'], $volunteer);
        return new VolunteerResource($volunteer);
    }

    public function update(VolunteerStoreValidation $validation,Volunteer $volunteer){

        //fields
        $this->decreaseFieldCount($volunteer);

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
            'state'=>$validation['state'],
            'city'=>$validation['city'],
            'description'=>$validation['description'],
            'public_show'=>$validation['public_show'],
        ]);

        //fields
        $this->increaseFieldCount($validation['fields'],$volunteer);

        return new VolunteerResource($volunteer);
    }

    public function show(){
        $volunteers= auth()->user()->volunteers()->get();

        return new VolunteerCollection($volunteers);
    }
    public function showSelf(){
        $volunteer= auth()->user()->volunteers()->first();
        $volunteer->public_show=4;

        return new VolunteerResource($volunteer);
    }


    public function showSingle(Volunteer $volunteer){
        $volunteer->public_show=4;
        return new VolunteerResource($volunteer);
    }


    public function showPublic(){
        $usersId = User::where('type',1)->pluck('id');
        if (auth()->user()->company->confirmed == 1){
            $volunteers = Volunteer::whereIn('user_id',$usersId )->get();
            return new VolunteerCollection($volunteers);
        }else{
            $volunteers = Volunteer::whereIn('user_id',$usersId )->where('public_show','!=',0)->get();
            return new VolunteerCollection($volunteers);
        }

    }

    public function showPublicSingle(Volunteer $volunteer){
        if (auth()->user()->company->confirmed == 1){
            $volunteer->public_show=3;
            return new VolunteerResource($volunteer);
        }else{
            return new LevelResource($volunteer);
        }
    }

    public function getName(Volunteer $volunteer){
        return $volunteer->name;
    }

    public function destroy(Volunteer $volunteer){
        $this->decreaseFieldCount($volunteer);

        $volunteer->delete();

        if (auth()->user()->company == null)
            auth()->user()->update(['type'=> false]);

        return $this->deleteResponse();
    }

}
