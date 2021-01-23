<?php

namespace App\Http\Resources\v1\Activity;

use App\Traits\StatisticsTrait;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ActivityCollection extends ResourceCollection
{
    use StatisticsTrait;
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
                    'hour'=>$item->hour,
                    'date'=> $this->gToJ($item->date),
                    'description'=>$item->description,
                    'volunteerName'=> $item->volunteer->name,
                ];
            })
        ];
    }
}
