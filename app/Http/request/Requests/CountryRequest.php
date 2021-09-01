<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CountryRequest extends FormRequest
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
            'name_ar' => 'required',
            'name_en' => 'required',

        ];
    }
    public function messages()
    {
        return [

            'name_ar.required'=>'يرجي ادخال الجنسية عربي!!',
            'name_en.required'=>'يرجي ادخال الجنسية انجليزي!!',
            'image.required'=>'يرجي ادخال صوره الجنسية!!',
            'image.mimes'=>'صيغه الصوره غير مدعومة!!',
        ];
    }

}
