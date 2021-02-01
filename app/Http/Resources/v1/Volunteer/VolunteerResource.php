<?php

namespace App\Http\Resources\v1\Volunteer;

use App\Http\Resources\v1\Activity\ActivityCollection;
use App\Http\Resources\v1\Field\FieldCollection;
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
        $timing = Timing::find($this->timing_id);
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'profession'=>$this->profession,
            'timing'=> new TimingResource($timing),
            'fields_merge'=> new FieldCollection($this->fields()->get()),
            'fields'=> array_map('strval', $this->fields()->pluck('id')->toArray()),
            'mobile'=>$this->mobile,
            'phone'=>$this->phone,
            'social_media'=>$this->social_media,
            'fax'=>$this->fax,
            'state'=>$this->state,
            'city'=>$this->city,
            'description'=>$this->description,
            'activity'=>new ActivityCollection($this->activities),
            'public_show'=>$this->public_show,

            'type'=>strval($timing->type),
            'period'=>strval($timing->period),
            'number'=>strval($timing->number),

        ];
    }
}
