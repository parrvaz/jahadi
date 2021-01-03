<?php

namespace App\Http\Resources\v1\Timing;

use Illuminate\Http\Resources\Json\JsonResource;

class TimingResource extends JsonResource
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
            'type'=>$this->type,
            'period'=>$this->period,
            'number'=>$this->number,
        ];

    }
}
