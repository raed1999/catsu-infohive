<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Constants\Role;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(/* DeansDataTable $dataTable */)
    {
        return view('student.manage-account.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'firstName' => 'required|regex:/^[\pL\s\-.]+$/u',
            'middleName' => 'nullable|regex:/^[\pL\s\-.]+$/u',
            'lastName' => 'required|regex:/^[\pL\s\-.]+$/u',
            'college' => 'required|int',
            'program' => 'required|int',
            'email' => 'required|email:rfs,dns|unique:students,email',
            'studentIdNo' => 'required|unique:students,student_id|regex:/^\d{4}-\d{5}$/',
            'password' => ['required', 'confirmed', Password::min(8)],
            'password_confirmation' => ['required'],
            'terms' => 'required|accepted',
        ]);

        $student = new Student();

        $student->first_name = Str::of($validated['firstName'])->title();
        $student->middle_name = Str::of($validated['middleName'])->title();
        $student->last_name = Str::of($validated['lastName'])->title();
        $student->program_id = $validated['program'];
        $student->email = $validated['email'];
        $student->student_id = Str::of($validated['studentIdNo'])->trim();
        $student->password = Hash::make(Str::of($validated['password'])->trim());

        $student->usertype_id = Role::STUDENT;

        if (!$student->save()) {
            return redirect()
                ->route('auth.register')
                ->withErrors(['message' => 'An error occurred. Please check your inputs.'])
                ->withInput();
        }

        return redirect()
            ->route('auth.login')
            ->with('success', 'Account created successfully! Please login.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::withTrashed()->find($id);
        $userType = Str::of($student->userType->name)->title();
        $college = $student->college->acroname;
        return view('student.manage-account.show', compact('student','userType','college'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        /*  $faculty = Faculty::withTrashed()->find($id);
        return view('admin.manage-dean.edit', compact('faculty')); */
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        /*  $validated = $request->validate([
            'firstName' => 'required|regex:/^[\pL\s\-.]+$/u',
            'middleName' => 'regex:/^[\pL\s\-.]+$/u',
            'lastName' => 'required|regex:/^[\pL\s\-.]+$/u',
            'college' => 'required|int',
              'email' => 'required|email:rfs,dns|unique:faculties,email',
        ]);


        $faculty = Faculty::withTrashed()->find($id);

        $faculty->first_name = Str::of($validated['firstName'])->trim()->title();
        $faculty->middle_name = Str::of($validated['middleName'])->trim()->title();
        $faculty->last_name = Str::of($validated['lastName'])->trim()->title();
        $faculty->college_id = $validated['college'];

        if (!$faculty->save()) {
            return redirect()->route('admin.manage-dean.edit');
        }

        return redirect()->route('admin.manage-dean.index'); */
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        /*  $faculty = Faculty::withTrashed()->find($id);
        $faculty->delete();

        return redirect()->route('admin.manage-dean.index'); */
    }

    /**
     * Remove the specified resource from storage.
     */
    public function restore(string $id)
    {
        /*   $faculty = Faculty::withTrashed()->find($id);
        $faculty->restore();

        return redirect()->route('admin.manage-dean.index'); */
    }
}
