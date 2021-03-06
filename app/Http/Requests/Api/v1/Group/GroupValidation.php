<?php

namespace App\Http\Requests\Api\v1\Group;

use App\Traits\StatisticsTrait;
use Illuminate\Foundation\Http\FormRequest;

class GroupValidation extends FormRequest
{
    use StatisticsTrait;
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
            'name' => 'required|string|min:2|max:255',
            'access_level' => 'required|in:1,2,3',
            'description' => 'string|min:2|max:255',

            'companies'=>'required|array|min:1',
            'companies.*'=>'required|exists:companies,id|distinct',

            'volunteers'=>['required','array','min:1',
                function ($attribute, $value, $fail) {
                    if (!$this->ownerVolunteer($value))
                        return $fail('شما اجازه دسترسی به این داوطلب را ندارید');

                }],
            'volunteers.*'=>'required|exists:volunteers,id|distinct',

        ];

    }
}
