<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentResultRequest extends FormRequest
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
            'student_id'            => 'required|integer|exists:students,id|unique:student_results,student_id,' . $this->id,
            'grade'                 => 'required|integer',
            'seating_number'        => 'required|unique:student_results,seating_number,' . $this->id,
        ];
    }
}
