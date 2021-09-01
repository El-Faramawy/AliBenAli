<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOfferRequest extends FormRequest
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
            'date[]' =>'required_without:num',
            'image' => 'required_without:num',
        ];
    }
    public function messages()
    {
        return [
            'date[].required_without:num' => 'يرجي ادخال يوم او اكثر',
            'required' => 'يرجي ادخال كل الحقول',
            'image.required_without' => 'يرجي رفع صورة',
        ];
    }
}
