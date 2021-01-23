<?php

namespace App\Http\Resources\v1\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public $token;
    public function __construct($resource,$token)
    {
        $this->token=$token;
        parent::__construct($resource);
    }

    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'mobile'=>$this->mobile,
            'type'=>$this->logType,
            'api_token'=>$this->token,
        ];
    }
}
