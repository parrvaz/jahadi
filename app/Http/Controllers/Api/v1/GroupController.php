<?php


namespace App\Http\Controllers\Api\v1;

use App\Company;
use App\Group;
use App\Http\Controllers\Controller;

use App\Http\Requests\Api\v1\Group\GroupValidation;
use App\Http\Resources\v1\Group\GroupCollection;
use App\Http\Resources\v1\Group\GroupResource;
use App\Http\Resources\v1\Volunteer\LevelResource;
use App\Http\Resources\v1\Volunteer\VolunteerCollection;
use App\Traits\StatisticsTrait;
use App\Volunteer;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    use  StatisticsTrait;
    public function store(GroupValidation $validation){
        $group= auth()->user()->company->groups()->create([
            'name'=> $validation['name'],
            'access_level'=> $validation['access_level'],
            'description'=> $validation['description'],
        ]);

        foreach ($validation['companies'] as $company){
            $group->companies()->attach($company['id']);
        }

        foreach ($validation['volunteers'] as $volunteer){
            $group->volunteers()->attach($volunteer['id']);
        }

        return new GroupResource($group);
    }

    public function update(GroupValidation $validation,Group $group){
        $group->update([
            'name'=> $validation['name'],
            'access_level'=> $validation['access_level'],
            'description'=> $validation['description'],
        ]);

        $group->companies()->detach();
        $group->volunteers()->detach();

        foreach ($validation['companies'] as $company){
            $group->companies()->attach($company['id']);
        }

        foreach ($validation['volunteers'] as $volunteer){
            $group->volunteers()->attach($volunteer['id']);
        }

        return new GroupResource($group);
    }

    public function showSingle(Group $group){
        return new GroupResource($group);
    }

    public function show(){
        $groups = auth()->user()->company->groups()->get();
        return new GroupCollection($groups);
    }

    public function volunteerShow(){
        //groups join in

        $volunteers = collect();
        $groups = auth()->user()->company->member_groups()->get();
        foreach ($groups as $group){
             $volunteers = $volunteers->merge($group->volunteers()->get());
        }

        return new VolunteerCollection($volunteers);
    }

    public function volunteerShowSingle(Volunteer $volunteer){
        $accessLevel = auth()->user()->company->member_groups()
            ->whereIn('id',$volunteer->groups()->pluck('id'))->max('access_level');

        if ($accessLevel==null)
            return $this->permissionDenied();

        $volunteer->public_show = $accessLevel;
        return new LevelResource($volunteer);
    }


    public function destroy(Group $group){
        $group->delete();
        return $this->deleteResponse();
    }

}
