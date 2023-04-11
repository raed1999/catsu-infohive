<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\DeansDataTable;
use App\Http\Controllers\Controller;
use App\Models\College;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Constants\Role;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(DeansDataTable $dataTable)
    {
        return $dataTable->render('admin.manage-dean.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $colleges = College::select('id', 'name', 'acroname')
            ->whereNotIn('acroname', ['ITS'])
            ->get();
        return view('admin.manage-dean.create', compact('colleges'));
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
            'email' => 'required|email:rfs,dns|unique:faculties,email',
        ]);

        $faculty = new Faculty();

        $faculty->first_name = Str::of($validated['firstName'])->title();
        $faculty->middle_name = Str::of($validated['middleName'])->title();
        $faculty->last_name = Str::of($validated['lastName'])->title();
        $faculty->college_id = $validated['college'];
        $faculty->email = $validated['email'];

        $faculty->usertype_id = Role::DEAN;
        $faculty->added_by_id = session('user')->id;

        if (!$faculty->save()) {
            return redirect()->route('admin.manage-dean.create');
        }

        return redirect()->route('admin.manage-dean.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $faculty = Faculty::withTrashed()->find($id);
        $userType = Str::of($faculty->userType->name)->title();
        $college = $faculty->college->acroname;

        return view('admin.manage-dean.show', compact('faculty', 'userType', 'college'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $faculty = Faculty::withTrashed()->find($id);
        $colleges = College::select('id', 'name', 'acroname')
            ->whereNotIn('acroname', ['ITS'])
            ->get();
        return view('admin.manage-dean.edit', compact('faculty', 'colleges'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'firstName' => 'required|regex:/^[\pL\s\-.]+$/u',
            'middleName' => 'nullable|regex:/^[\pL\s\-.]+$/u',
            'lastName' => 'required|regex:/^[\pL\s\-.]+$/u',
            'college' => 'required|int',
            /*   'email' => 'required|email:rfs,dns|unique:faculties,email', */
        ]);


        $faculty = Faculty::withTrashed()->find($id);

        $faculty->first_name = Str::of($validated['firstName'])->title();
        $faculty->middle_name = Str::of($validated['middleName'])->title();
        $faculty->last_name = Str::of($validated['lastName'])->title();
        $faculty->college_id = $validated['college'];

        if (!$faculty->save()) {
            return redirect()->route('admin.manage-dean.edit');
        }

        return redirect()->route('admin.manage-dean.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $faculty = Faculty::withTrashed()->find($id);
        $faculty->delete();

        return redirect()->route('admin.manage-dean.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function restore(string $id)
    {
        $faculty = Faculty::withTrashed()->find($id);
        $faculty->restore();

        return redirect()->route('admin.manage-dean.index');
    }
}
