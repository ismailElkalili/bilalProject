<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
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
            'departmentName' => 'required|string|max:20'
        ];
    }
    public function messages()
    {
        return [
            'departmentName.required' => 'الرجاء ادخال الاسم',
            'departmentName.string' => 'يجب أن يكون اسم القسم نص وليس رقم',
            'departmentName.max' => 'الاسم يجب أن يكون أقصر من 20 حرف'

        ];
    }
}