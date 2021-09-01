<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FooterContactRequest extends FormRequest
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
            'footer_name' => 'required',
            'footer_email' => 'email',
            'footer_massage' => 'required',
        ];
    }
    public function messages()
    {
        return [

            'footer_name.required'=>'يرجي ادخال الاسم!!',
            'footer_email.required' => 'يرجي ادخال الايميل !!',
            'footer_massage.required' => 'يرجي ادخال رسالتك',
        ];

    }
}
