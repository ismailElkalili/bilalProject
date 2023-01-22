<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class TeacherRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */

    public function rules()
    {
        return [
            'teacherName' => 'required|string',
            'nationId' => 'required|numeric',
            'phoneNumber' => 'required|numeric',
            'whatsappNumber' => 'required|numeric|min:13',
            'dob' => 'required',
            'qualification' => 'required',
            'specialization' => 'required|string'
        ];
    }
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    function FunctionName(Type $var = null)
    {
        # code...
    }
    public function authorize()
    {
        return true;
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'teacherName.required' => 'الرجاء ادخال الاسم',
            'nationId.required' => 'الرجاء ادخال رقم الهوية',
            'phoneNumber.required' => 'الرجاء ادخال رقم الجوال',
            'whatsappNumber.required' => 'الرجاء ادخال رقم الواتس أب',
            'dob.required' => 'الرجاء ادخال تاريخ الميلاد',
            'qualification.required' => 'الرجاء ادخال المؤهل العلمي',
            'specialization.required' => 'الرجاء ادخال التخصص',

            'teacherName.string' => 'الاسم يجب أن يكون نص',
            'nationId.numeric' => 'رقم الهويةيجب أن يكون رقم',
            'phoneNumber.numeric' => 'رقم الجوال يجب ان يكون رقم',
            'whatsappNumber.numeric' => 'رقم الواتس أب يجب أن يكون رقم',
            'specialization.string' => 'التخصص يجب أن يكون نص',
            'specialization.min:13' => 'رقم الواتس أب مكون من 14 رقم '
        ];
    }

}