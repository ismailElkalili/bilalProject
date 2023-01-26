<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'studentName' => 'required|string',
            'nationid' => 'required|numeric|min:10',
            'phonenumber' => 'required|numeric',
            'whatsappnumber' => 'required|numeric|min:13',
            'dob' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'studentName.required' => 'الرجاء ادخال الاسم',
            'nationid.required' => 'الرجاء ادخال رقم الهوية',
            'phonenumber.required' => 'الرجاء ادخال رقم الجوال',
            'whatsappnumber.required' => 'الرجاء ادخال رقم الواتس أب',
            'dob.required' => 'الرجاء ادخال تاريخ الميلاد',

            'studentName.string' => 'الاسم يجب أن يكون نص',
            'nationid.numeric' => 'رقم الهويةيجب أن يكون رقم',
            'phonenumber.numeric' => 'رقم الجوال يجب ان يكون رقم',
            'whatsappnumber.numeric' => 'رقم الواتس أب يجب أن يكون رقم',
        ];
    }
}