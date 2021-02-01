<?php

namespace App\Http\Resources\v1\Activity;

use App\Traits\StatisticsTrait;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ActivityCollection extends ResourceCollection
{
    use StatisticsTrait;
    /**
     * ActivityCollection constructor.
     */
    public $volunteerName;
    public function __construct($resource,$volunteerName='مهمان')
    {
        $this->volunteerName=$volunteerName;
        parent::__construct($resource);
    }
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return[
            'volunteerName'=> $this->volunteerName,
            'data'=> $this->collection->map(function ($item){
                return [
                    'id'=>$item->id,
                    'hour'=>$item->hour,
                    'date'=> $this->gToJ($item->date),
                    'description'=>$item->description,
                ];
            })
        ];
    }
}
