<?php

namespace App\Http\Requests\Api\v1\Company;

use Illuminate\Foundation\Http\FormRequest;

class CompanyUpdateValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'string|min:3|max:60',
            'state'=>'string|min:3|max:60',
            'city'=>'string|min:3|max:60',
            'description'=>'string|min:3|max:260',
            'address'=>'string|min:3|max:160',
            'website'=>'string|min:3|max:60',
            'instagram'=>'string|min:3|max:60',
            'chanel'=>'string|min:3|max:100',
            'social_media'=>'string|min:3|max:160',
            'phone'=>'digits:11',
            'mobile'=>'digits:11',
            'public_show'=>'in:0,1,2',

            'fields'=> 'array|min:0|distinct|exists:fields,id'

        ];
    }
}
