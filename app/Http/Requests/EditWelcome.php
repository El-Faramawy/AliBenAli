<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditWelcome extends FormRequest
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
            'image'   => 'mimes:jpeg,jpg,png',
            'title_ar' => 'required',
            'title_en' => 'required',
            'content_ar' => 'required',
            'content_en' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'content_ar.required' => 'يرجي ادخال الرسالة الترحيبية باللغة العربية',
            'content_en.required' => 'يرجي ادخال الرسالة الترحيبية باللغة الانجليزية',
            'image_mimes' => 'صيغة الصورة غير مدعومة',
            'title_ar.required'=>'يرجي ادخال العنوان باللغة العربية',
            'title_en.required'=>'يرجي ادخال العنوان باللغة الانجليزية'
        ];

    }
}
