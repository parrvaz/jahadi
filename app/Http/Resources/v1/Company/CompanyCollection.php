<?php

namespace App\Http\Resources\v1\Company;

use App\Http\Resources\v1\Field\FieldCollection;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CompanyCollection extends ResourceCollection
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
                $part1 =[
                    'id'=>$item->id,
                    'user_id'=>$item->user_id,
                    'name'=>$item->name,
                    'fields'=> new FieldCollection($item->fields()->get()),
                    'state'=>$item->state,
                    'city'=>$item->city,
                    'description'=>$item->description,
                    'address'=>$item->address,
                    'website'=>$item->website,
                    'instagram'=>$item->instagram,
                    'chanel'=>$item->chanel,
                    'social_media'=>$item->social_media,
                ];
                $part2=[
                    'phone'=>$item->phone,
                    'mobile'=>$item->mobile,
                ];

                return $item->public_show==2 ?  array_merge($part1,$part2) : $part1;
            })
        ];
    }
}
