<?php

namespace App\Http\Resources\v1\Company;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
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
            'name'=>$this->name,
            'state'=>$this->state,
            'city'=>$this->city,
            'description'=>$this->description,
            'address'=>$this->address,
            'website'=>$this->website,
            'instagram'=>$this->instagram,
            'chanel'=>$this->chanel,
            'social_media'=>$this->social_media,
            'phone'=>$this->phone,
            'mobile'=>$this->mobile,
            'public_show'=>$this->public_show,
        ];
    }
}
