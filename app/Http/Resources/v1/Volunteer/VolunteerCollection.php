<?php

namespace App\Http\Resources\v1\Volunteer;

use App\Http\Resources\v1\Field\FieldCollection;
use App\Http\Resources\v1\Timing\TimingResource;
use App\Timing;
use Illuminate\Http\Resources\Json\ResourceCollection;

class VolunteerCollection extends ResourceCollection
{
    /**
     * VolunteerCollection constructor.
     */
    public $title;
    public function __construct($resource,$title='داوطلبین')
    {
        $this->title=$title;
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
            'title'=> $this->title,
            'data'=> $this->collection->map(function ($item){
              return [
                  'id'=>$item->id,
                  'name'=>$item->name,
                  'profession'=>$item->profession,
                  'fields_title'=> $item->fields()->pluck('title'),
                  'fields'=> array_map('strval', $item->fields()->pluck('id')->toArray()),
                  'description'=>$item->description,
                  'state'=>$item->state,
                  'city'=>$item->city,
                  'link'=>$item->link,
              ];
            })
        ];
    }
}
