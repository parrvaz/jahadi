<?php

namespace App\Http\Resources\v1\Company;

use App\Http\Resources\v1\Field\FieldCollection;
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
            'id'=>$this->id,
            'user_id'=>$this->user_id,
            'name'=>$this->name,
            'fields_title'=> $this->fields()->pluck('title'),
            'fields'=> array_map('strval', $this->fields()->pluck('id')->toArray()),

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
            'public_show'=>strval($this->public_show),
        ];
    }
}
