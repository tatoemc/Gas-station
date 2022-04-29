<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStationRequest extends FormRequest
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
            'location_id' => 'required',
            'user_id' => 'required',
            'capacity' => 'required|numeric'
        ];
    }
    public function messages()
    {
        return [

            'name.required' =>'يرجي ادخال الاسم ',
            'location_id.required' =>'يرجى اختيار الموقع',
            'capacity.numeric' =>'يرجي ادخال  سعة ارقام صحيحة ',
            'user_id.required' =>'يرجى اختيار العامل',
            'capacity.required' =>'يرجي ادخال  سعة المحطة '
        ];
    }



    
}
