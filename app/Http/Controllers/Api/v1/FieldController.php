<?php


namespace App\Http\Controllers\Api\v1;

use App\Field;
use App\Http\Controllers\Controller;

use App\Http\Resources\v1\Field\FieldCollection;
use App\Http\Resources\v1\Volunteer\VolunteerCollection;

class FieldController extends Controller
{

    public function show(){
        $fields = Field::all();
        return new FieldCollection($fields);
    }

    public function search(Field $field){
        $fields = $field->volunteers()->pluck('id');
        $companyFields = $field->companies()->pluck('id');

        $public = (new VolunteerController())->showPublic()->whereIn('id',$fields);
        foreach ($public as $vol){
            $vol['link'] = "/company/volunteer/show/".$vol->id;
        }
        $shared = (new GroupController())->volunteerShow()->whereIn('id',$fields);
        foreach ($shared as $vol){
            $vol['link'] = "/group/volunteer/show/".$vol->id;
        }
        $owner = (new VolunteerController())->show()->whereIn('id',$fields);
        foreach ($owner as $vol){
            $vol['link'] = "/volunteer/show/".$vol->id;
        }

        $companies = (new CompanyController())->show()->whereIn('id',$companyFields);
        foreach ($companies as $company){
            $company['link'] = "/company/show/".$company->id;
        }

        return new VolunteerCollection($owner->merge($shared)->merge($public)->merge($companies),$field->title);
    }
}
