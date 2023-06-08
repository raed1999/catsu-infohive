<?php

namespace App\Http\Controllers\Dean;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Constants\Role;
use App\DataTables\Dean\FacultiesDatatable;

class FacultyController extends Controller
{

    public function index(FacultiesDatatable $dataTable)
    {
        return $dataTable->render('dean.manage-faculty.index');
    }

    public function show(string $id)
    {
        $faculty = Faculty::withTrashed()->find($id);
        $userType = Str::of($faculty->userType->name)->title();
        $college = $faculty->college->acroname;
        return view('dean.manage-faculty.show', compact('faculty', 'userType', 'college'));
    }
}
