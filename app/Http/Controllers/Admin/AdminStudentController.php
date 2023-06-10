<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\AdminStudentDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class AdminStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AdminStudentDataTable $dataTable)
    {
        return $dataTable->render('admin.manage-student.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.manage-student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /* $validated = $request->validate([
            'firstName' => 'required|regex:/^[\pL\s\-.]+$/u',
            'middleName' => 'regex:/^[\pL\s\-.]+$/u',
            'lastName' => 'required|regex:/^[\pL\s\-.]+$/u',
            'email' => 'required|email:rfs,dns|unique:faculties,email',
        ]);

        $faculty = new Faculty();

        $faculty->first_name = Str::of($validated['firstName'])->trim()->title();
        $faculty->middle_name = Str::of($validated['middleName'])->trim()->title();
        $faculty->last_name = Str::of($validated['lastName'])->trim()->title();
        $faculty->email = $validated['email'];


        $faculty->college_id = Auth::user()->college_id;
        $faculty->usertype_id = Role::CLERK;
        $faculty->added_by_id = Auth::id();

        if (!$faculty->save()) {
            return redirect()->route('admin.manage-clerk.create');
        }

        return redirect()->route('admin.manage-clerk.index'); */
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::withTrashed()
            ->find($id);
        $userType = Str::of($student->userType->name)->title();
        $college = $student->college->acroname;
        $program = $student->program->acroname;
        return view('admin.manage-student.show', compact('student', 'userType', 'college', 'program'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::withTrashed()->find($id);
        return view('admin.manage-student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        /*    $validated = $request->validate([
            'firstName' => 'required|regex:/^[\pL\s\-.]+$/u',
            'middleName' => 'regex:/^[\pL\s\-.]+$/u',
            'lastName' => 'required|regex:/^[\pL\s\-.]+$/u',
        ]);


        $faculty = Faculty::withTrashed()->find($id);

        $faculty->first_name = Str::of($validated['firstName'])->trim()->title();
        $faculty->middle_name = Str::of($validated['middleName'])->trim()->title();
        $faculty->last_name = Str::of($validated['lastName'])->trim()->title();


        if (!$faculty->save()) {
            return redirect()->route('clerk.manage-student.edit');
        }

        return redirect()->route('clerk.manage-student.index'); */
    }

    /**
     * Remove the specified resource from storage.
     */
    public function verify(string $id)
    {
        $student = Student::withTrashed()->find($id);
        $student->email_verified_at = now();
        $student->confirmed_by_id = Auth::id();

        $student->save();

        return redirect()->route('admin.manage-student.index');
    }

    public function unverify(string $id)
    {
        $student = Student::withTrashed()->find($id);
        $student->email_verified_at = null;
        $student->confirmed_by_id = Auth::id();

        $student->save();

        return redirect()->route('admin.manage-student.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::withTrashed()->find($id);
        $student->delete();

        return redirect()->route('admin.manage-student.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function restore(string $id)
    {
        $student = Student::withTrashed()->find($id);
        $student->restore();

        return redirect()->route('admin.manage-student.index');
    }
}
