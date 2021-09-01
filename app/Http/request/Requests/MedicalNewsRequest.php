<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicalNewsRequest extends FormRequest
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
            'image' => 'required|mimes:jpeg,jpg,png',
            'title_ar' => 'required',
            'title_en' => 'required',
            'content_ar' => 'required',
            'content_en' => 'required',
        ];
    }
    public function messages()
    {
        return [

            'title_ar.required'=>'يرجي ادخال العنوان الرئيسي عربي!!',
            'title_en.required'=>'يرجي ادخال العنوان الرئيسي انجليزي!!',
            'content_ar.required'=>'يرجي ادخال المحتوي عربي!!',
            'content_en.required'=>'يرجي ادخال المحتوي انجليزي!!',
            'image.required'=>'يرجي ادخال الصوره!!',
        ];
    }
}
