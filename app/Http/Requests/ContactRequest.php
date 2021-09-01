<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'phone_number' => 'required',
            'email' => 'email',
            'massage' => 'required',
        ];
    }
    public function messages()
    {
        return [

            'name.required'=>'يرجي ادخال الاسم!!',
            'email.required' => 'يرجي ادخال الايميل !!',
            'phone_number.required' => 'يرجي ادخال رقم الهاتف !!',
            'massage.required' => 'يرجي ادخال رسالتك',
        ];
    }
}
