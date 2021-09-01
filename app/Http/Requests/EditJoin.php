<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditJoin extends FormRequest
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
            'title_ar' => 'required',
            'title_en' => 'required',
            'text_ar' => 'sometimes|required',
            'text_en' => 'sometimes|required',
            'content_ar' => 'sometimes|required',
            'content_en' => 'sometimes|required',
            'address_ar' => 'sometimes|required',
            'address_en' => 'sometimes|required',
            'category_ar' => 'sometimes|required',
            'category_en' => 'sometimes|required',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'يرجي ادخال جميع الحقول',
        ];

    }
}
