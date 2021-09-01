<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAboutUS extends FormRequest
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
            '*' => 'required',
            'image' => 'required_without:num|mimes:jpeg,jpg,png'
        ];
    }
    public function messages()
    {
        return [
            'required' => 'يرجي ادخال كل الحقول',
            'image.required_without' => 'يرجي رفع صورة',
            'image.mimes' =>'صيغه الصوره غير مدعومة',
        ];
    }
}
