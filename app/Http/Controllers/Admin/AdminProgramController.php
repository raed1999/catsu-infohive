<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\AdminProgramDataTable;
use App\DataTables\Dean\DeanProgramDataTable;
use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\Research;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AdminProgramController extends Controller
{

    public function index(AdminProgramDataTable $dataTable)
    {
        return $dataTable->render('admin.manage-program.index');
    }

    public function create()
    {
        return view('admin.manage-program.create');
    }
}
