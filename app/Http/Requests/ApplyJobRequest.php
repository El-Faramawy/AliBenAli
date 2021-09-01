<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplyJobRequest extends FormRequest
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
            'job_name' => 'required',
            'image' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'exp' => 'required',
            'present_job' => 'required',
            'massage' => 'required',

        ];
    }
    public function messages()
    {
        return [

            'name.required'=>'يرجي ادخال الاسم!!',
            'phone.required' => 'يرجي ادخال رقم الهاتف !!',
            'email.required' => 'يرجي ادخال الايميل !!',
            'present_job.required' => 'يرجي ادخال رسالتك',
            'exp.required' => 'يرجي ادخال رسالتك',
            'job_name.required' => 'يرجي ادخال رسالتك',
            'image.required' => 'يرجي ادخال رسالتك',
            'massage.required' => 'يرجي ادخال رسالتك',
        ];
    }

}
