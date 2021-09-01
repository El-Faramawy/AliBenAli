<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicalImageRequest extends FormRequest
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

        ];
    }
    public function messages()
    {
        return [

            'image.required'=>'يرجي ادخال الصوره!!',
            'image.mimes'=>'صيغه الصوره غير مدعومة!!',

        ];
    }
}
