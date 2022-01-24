<?php

namespace App\Imports;

use App\Models\StudentResults;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
class StudentResultImport implements ToModel,WithHeadingRow,WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new StudentResults([
            'student_id' => $row['student_id'],
            'grade' => $row['grade'],
            'seating_number' => $row['seating_number'],
        ]);
    }

    public function rules(): array
    {
        return [
            'student_id'            => 'required|integer|exists:students,id|unique:student_results,student_id',
            'grade'                 => 'required|integer',
            'seating_number'        => 'required|unique:student_results,seating_number',
        ];
    }
}
