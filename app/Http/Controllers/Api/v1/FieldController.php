<?php


namespace App\Http\Controllers\Api\v1;

use App\Field;
use App\Http\Controllers\Controller;

use App\Http\Resources\v1\Field\FieldCollection;
use Illuminate\Http\Request;

class FieldController extends Controller
{

    public function show(){
        $fields = Field::all();
        return new FieldCollection($fields);
    }
}
