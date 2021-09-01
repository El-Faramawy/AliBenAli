<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddDateRequest extends FormRequest
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
            'hours' => 'required',
            'day' => 'required',

        ];
    }
    public function messages()
    {
        return [
            'day.required'=>'يرجي ادخال ايام العمل !',
            'hours.required'=>'يرجي ادخال ساعات العمل !',
        ];
    }
}
