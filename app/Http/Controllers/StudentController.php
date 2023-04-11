<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function verification(Student $student)
    {
        return ($student->email_verified_at) ? true : false;
    }
}
