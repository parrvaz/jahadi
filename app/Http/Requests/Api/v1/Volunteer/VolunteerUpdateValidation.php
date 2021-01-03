<?php

namespace App\Http\Requests\Api\v1\Volunteer;

use Illuminate\Foundation\Http\FormRequest;

class VolunteerUpdateValidation extends FormRequest
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
            'name'=>'string|min:2|max:255',
            'profession'=>'string|min:2|max:255',
            'mobile'=>'required|digits:11',
            'phone'=>'digits:11',
            'social_media'=>'string|min:2|max:255',
            'fax'=>'string|min:2|max:255',
            'description'=>'string|min:2|max:255',
            'public_show'=>'required|in:1,2,3',

            'type'=>'boolean',
            'period'=>'in:1,2,3,4',
            'number'=>'integer|min:1|max:50',
        ];
    }
}
