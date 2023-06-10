<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use Illuminate\Support\Str;
use App\DataTables\Admin\AdminFacultyDatatable;

class AdminFacultyController extends Controller
{

    public function index(AdminFacultyDatatable $dataTable)
    {
        return $dataTable->render('admin.manage-faculty.index');
    }

    public function show(string $id)
    {
        $faculty = Faculty::withTrashed()->find($id);
        $userType = Str::of($faculty->userType->name)->title();
        $college = $faculty->college->acroname;
        return view('admin.manage-faculty.show', compact('faculty', 'userType', 'college'));
    }

}
