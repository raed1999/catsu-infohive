<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\AdminCollegeDatatable;
use App\Http\Controllers\Controller;
use App\Models\College;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AdminCollegeController extends Controller
{

    public function index(AdminCollegeDatatable $dataTable)
    {
        return $dataTable->render('admin.manage-college.index');
    }

    public function create()
    {
        return view('admin.manage-college.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|string|unique:colleges,acroname',
            'college' => 'required|string|unique:colleges,name',
        ]);

        $college = new College();

        $college->acroname = Str::of($validated['code'])->upper();
        $college->name = Str::of($validated['college'])->title();
        $college->university_id = 1;

        if (!$college->save()) {
            return redirect()->route('admin.manage-college.create');
        }

        return redirect()->route('admin.manage-college.index');
    }

    public function edit(string $id)
    {
        $college = College::withTrashed()->find($id);
        return view('admin.manage-college.edit', compact('college'));
    }

    public function update(Request $request, string $id)
    {

        $college = College::find($id);

        $validated = $request->validate([
            'code' => [
                'required',
                'string',
                Rule::unique('colleges', 'acroname')->ignore($college->id),
            ],
            'college' => [
                'required',
                'string',
                Rule::unique('colleges', 'name')->ignore($college->id),
            ],
        ]);

        $college->acroname = Str::of($validated['code'])->upper();
        $college->name = Str::of($validated['college'])->title();
        $college->university_id = 1;

        if (!$college->save()) {
            return redirect()->route('admin.manage-college.create');
        }

        return redirect()->route('admin.manage-college.index');
    }
}
