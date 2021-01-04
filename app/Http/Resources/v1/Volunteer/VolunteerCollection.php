<?php

namespace App\Http\Resources\v1\Volunteer;

use App\Http\Resources\v1\Field\FieldCollection;
use App\Http\Resources\v1\Timing\TimingResource;
use App\Timing;
use Illuminate\Http\Resources\Json\ResourceCollection;

class VolunteerCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'data'=> $this->collection->map(function ($item){
              return [
                  'id'=>$item->id,
                  'name'=>$item->name,
                  'profession'=>$item->profession,
                  'timing'=> new TimingResource(Timing::find($item->timing_id)),
                  'fields'=> new FieldCollection($item->fields()->get()),

//                  'mobile'=>$item->mobile,
//                  'phone'=>$item->phone,
//                  'social_media'=>$item->social_media,
//                  'fax'=>$item->fax,
//                  'description'=>$item->description,
              ];
            })
        ];
    }
}
