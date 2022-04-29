<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLocationRequest extends FormRequest
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
            'name' => 'required',
            'city' => 'required',
            'square' => 'required|numeric',
            'desc' => 'required'
        ];
    }
    public function messages()
    {
        return [

            'name.required' =>'يرجي ادخال الاسم ',
            'city.required' =>'يرجى اختيار المدينة',
            'square.required' =>'يرجي ادخال المربع ',
            'square.numeric' =>'يرجي ادخال رقم المربع رقم صحيح ',
            'desc.required' =>'يرجي ادخال وصف المربع '
        ];
    }


}
