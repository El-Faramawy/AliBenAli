<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiseaserRequest extends FormRequest
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
    {return [
        'title_ar' => 'required',
        'title_en' => 'required',

    ];
    }
    public function messages()
    {
        return [

            'title_ar.required'=>'يرجي ادخال اسم المرض بالعربي!!',
            'title_en.required'=>'يرجي ادخال اسم المرض بالانجليزي!!',

        ];
    }
}
