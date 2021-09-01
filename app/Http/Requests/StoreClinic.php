<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClinic extends FormRequest
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
            'image' => 'required_without:num|mimes:jpeg,jpg,png',
            'name_ar' => 'required|unique:clinics,name_ar,'.$this->id,
            'name_en' => 'required|unique:clinics,name_en,'.$this->id,
        ];
    }

    public function messages()
    {
        return [
            'image.required_without' => 'يرجي رفع صورة',
            'name_ar.required' => 'يرجي ادخال اسم القسم باللغة العربية',
            'name_ar.unique' => 'اسم القسم بالعربي مسجل مسبقا',
            'name_en.required' => 'يرجي ادخال اسم القسم باللغة الانجليزية',
            'name_en.unique' => 'اسم القسم بالانجليزي مسجل مسبقا',
            'image.mimes' =>'صيغه الصوره غير مدعومة',
        ];

    }
}
