<?php

namespace App\Http\Resources\v1\Field;

use Illuminate\Http\Resources\Json\ResourceCollection;

class FieldCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Support\Collection
     */
    public function toArray($request)
    {
        return [ 'data' =>
             $this->collection->map(function ($item){
                return [
                    'id'=>$item->id,
                    'title'=>$item->title,
                    'count'=>$item->count,
                ];
            })
         ];

    }
}
