<?php

namespace App\Imports\Clerk;

use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class VerifyStudentImport implements ToModel, WithHeadingRow
{

    public function model(array $row)
    {

        $student = Student::where('student_id', $row['code'])->first();

        if ($student) {

            $student->email_verified_at = now();
            $student->confirmed_by_id = Auth::id();
            $student->save();

        }
    }
}
