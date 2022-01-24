<?php

namespace App\Imports;

use App\Models\StudentResults;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentResultImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new StudentResults([
            'student_id' => $row[0],
            'grade' => $row[1],
            'seating_number' => $row[2],
        ]);
    }
}
