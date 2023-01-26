<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassesRequest extends FormRequest
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

        //
        return [
            //
            'classesName' => 'required|max:50',
            'teacherID' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'classesName.required' => 'الرجاء ادخال اسم الحلقة',
            'teacherID.required' => 'الرجاء إدخال محفظ الحلقة',
            'classesName.max' => 'يجب ان يكون اسم الحلقة أقل من 50 حرف ',
        ];
    }
}