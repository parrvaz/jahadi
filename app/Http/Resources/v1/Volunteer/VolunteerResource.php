<?php

namespace App\Http\Resources\v1\Volunteer;

use App\Http\Resources\v1\Activity\ActivityCollection;
use App\Http\Resources\v1\Timing\TimingResource;
use App\Timing;
use Illuminate\Http\Resources\Json\JsonResource;

class VolunteerResource extends JsonResource
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
            'profession'=>$this->profession,
            'timing'=> new TimingResource(Timing::find($this->timing_id)),
            'mobile'=>$this->mobile,
            'phone'=>$this->phone,
            'social_media'=>$this->social_media,
            'fax'=>$this->fax,
            'description'=>$this->description,
            'activity'=>new ActivityCollection($this->activities),
        ];
    }
}
