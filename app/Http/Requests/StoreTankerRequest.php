<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTankerRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

   
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
