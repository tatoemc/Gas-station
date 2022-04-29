<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTankerRequest extends FormRequest
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
            'user_id' => 'required',
            'car_number' => 'required',
            'capacity' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [

            'user_id.required' =>'يرجي ادخال السائق ',
            'car_number.required' =>'يرجى ادخال رقم الناقلة',
            'capacity.integer' =>'السعة  يجب ان تكون ارقام ',
            'capacity.required' =>'يرجي ادخال السعة '
           
        ];
    }


    
}
