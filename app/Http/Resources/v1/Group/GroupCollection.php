<?php

namespace App\Http\Resources\v1\Group;

use Illuminate\Http\Resources\Json\ResourceCollection;

class GroupCollection extends ResourceCollection
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
                    'access_level'=>$item->access_level,
                    'description'=>$item->description,
                ];
            })
        ];
    }
}
