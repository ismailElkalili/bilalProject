<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommiteeRequest extends FormRequest
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
            //
            'committeeName' => 'required|max:30',
            'description' => 'required|max:1000',
            'bossID' => 'required',
            'departmentID' => 'required'

        ];
    }
    public function messages()
    {
        return [
            'committeeName.required' => 'أرجو ادخال اسم اللجنة',
            'description.required' => 'أرجو ادخال وصف اللجنة',
            'committeeName.max' => 'اسم اللجنة يجب أن يكون أقل من 30 حرف',
            'description.max' => 'وصف اللجنة يجب أن يكون أقل من 1000 حرف ',
            'bossID.required' => 'أرجو ادخال مسؤول اللجنة',
            'departmentID.required' => 'أرجو ادخال القسم'

        ];
    }
}