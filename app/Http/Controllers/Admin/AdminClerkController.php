<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use Illuminate\Support\Str;
use App\DataTables\Admin\AdminClerkDataTable;


class AdminClerkController extends Controller
{
    public function index(AdminClerkDataTable $dataTable)
    {
        return $dataTable->render('admin.manage-clerk.index');
    }

    public function show(string $id)
    {
        $faculty = Faculty::withTrashed()->find($id);
        $userType = Str::of($faculty->userType->name)->title();
        $college = $faculty->college->acroname;
        return view('admin.manage-clerk.show', compact('faculty', 'userType', 'college'));
    }
}
