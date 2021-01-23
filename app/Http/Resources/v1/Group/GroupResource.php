<?php

namespace App\Http\Resources\v1\Group;

use App\Http\Resources\v1\Company\CompanyCollection;
use App\Http\Resources\v1\Volunteer\VolunteerCollection;
use Illuminate\Http\Resources\Json\JsonResource;

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
            'access_level'=>strval($this->access_level),
            'description'=>$this->description,
            'companies'=>array_map('strval', $this->companies->pluck('id')->toArray()),
            'volunteers'=>array_map('strval',$this->volunteers->pluck('id')->toArray()),
        ];
    }
}
