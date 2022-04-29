<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFeedRequest extends FormRequest
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
            'station_id' => 'required',
            'user_id' => 'required'
        ];
    }

    public function messages()
    {
        return [

            'station_id.required' =>'يرجي ادخال رقم المحطة ',
            'user_id.required' =>'يرجى اختيار السائق'
        ];
    }
}
