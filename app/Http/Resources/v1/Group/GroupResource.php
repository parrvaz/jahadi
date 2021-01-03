<?php

namespace App\Http\Resources\v1\Group;

use App\Http\Resources\v1\Company\CompanyCollection;
use App\Http\Resources\v1\Volunteer\VolunteerCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use mysql_xdevapi\Collection;

class GroupResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'access_level'=>$this->access_level,
            'description'=>$this->description,
            'companies'=>new CompanyCollection($this->companies),
            'volunteers'=>new VolunteerCollection($this->volunteers),
        ];
    }
}
