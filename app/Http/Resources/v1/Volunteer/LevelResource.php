<?php

namespace App\Http\Resources\v1\Volunteer;

use App\Http\Resources\v1\Activity\ActivityCollection;
use App\Http\Resources\v1\Field\FieldCollection;
use App\Http\Resources\v1\Timing\TimingResource;
use App\Timing;
use Illuminate\Http\Resources\Json\JsonResource;

class LevelResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $part1 = [
            'id'=>$this->id,
            'name'=>$this->name,
            'profession'=>$this->profession,
            'timing'=> new TimingResource(Timing::find($this->timing_id)),
            'fields'=> new FieldCollection($this->fields()->get()),
            'public_show'=>$this->public_show
        ];

        $part2 =[
            'mobile'=>$this->mobile,
            'phone'=>$this->phone,
            'social_media'=>$this->social_media,
            'fax'=>$this->fax,
            'description'=>$this->description,
        ];

        $part3=[
            'activity'=>new ActivityCollection($this->activities),
        ];

        $result=[];
        switch ($this->public_show){
            case 3:
                $result = array_merge($result,$part3);
            case 2:
                $result = array_merge($result,$part2);
            case 1:
                $result = array_merge($result,$part1);
        }

        return $result;
    }
}
