<?php

namespace App\Http\Controllers\Dean;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Constants\Role;
use App\DataTables\Dean\FacultiesDatatable;
use Illuminate\Support\Facades\Auth;

class FacultyController extends Controller
{

    public function index(FacultiesDatatable $dataTable)
    {
        return $dataTable->render('dean.manage-faculty.index');
    }

    public function create()
    {
        return view('dean.manage-faculty.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'firstName' => 'required|regex:/^[\pL\s\-.]+$/u',
            'middleName' => 'nullable|regex:/^[\pL\s\-.]+$/u',
            'lastName' => 'required|regex:/^[\pL\s\-.]+$/u',
            'email' => 'required|email:rfs,dns|unique:faculties,email',
        ]);

        $faculty = new Faculty();

        $faculty->first_name = Str::of($validated['firstName'])->title();
        $faculty->middle_name = Str::of($validated['middleName'])->title();
        $faculty->last_name = Str::of($validated['lastName'])->title();
        $faculty->created_at = now();
        $faculty->updated_at = now();
        $faculty->email = $validated['email'];


        $faculty->college_id = Auth::user()->college_id;
        $faculty->usertype_id = Role::FACULTY;
        $faculty->added_by_id = Auth::id();

        if (!$faculty->save()) {
            return redirect()->route('dean.manage-faculty.create');
        }

        return redirect()->route('dean.manage-faculty.index');
    }

    public function show(string $id)
    {
        $faculty = Faculty::withTrashed()->find($id);
        $userType = Str::of($faculty->userType->name)->title();
        $college = $faculty->college->acroname;
        return view('dean.manage-faculty.show', compact('faculty', 'userType', 'college'));
    }

    public function edit(string $id)
    {
        $faculty = Faculty::withTrashed()->find($id);
        return view('dean.manage-faculty.edit', compact('faculty'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'firstName' => 'required|regex:/^[\pL\s\-.]+$/u',
            'middleName' => 'nullable|regex:/^[\pL\s\-.]+$/u',
            'lastName' => 'required|regex:/^[\pL\s\-.]+$/u',
        ]);


        $faculty = Faculty::withTrashed()->find($id);

        $faculty->first_name = Str::of($validated['firstName'])->title();
        $faculty->middle_name = Str::of($validated['middleName'])->title();
        $faculty->last_name = Str::of($validated['lastName'])->title();

        if (!$faculty->save()) {
            return redirect()->route('dean.manage-faculty.edit');
        }

        return redirect()->route('dean.manage-faculty.index');
    }

}
