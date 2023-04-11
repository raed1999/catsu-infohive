<?php

namespace App\Http\Controllers\Dean;

use App\Http\Controllers\Controller;
use App\DataTables\Dean\ClerksDataTable;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Constants\Role;

class DeanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ClerksDataTable $dataTable)
    {
        return $dataTable->render('dean.manage-clerk.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dean.manage-clerk.create');
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
            /*     'college' => 'required|int', */
            'email' => 'required|email:rfs,dns|unique:faculties,email',
        ]);

        $faculty = new Faculty();

        $faculty->first_name = Str::of($validated['firstName'])->title();
        $faculty->middle_name = Str::of($validated['middleName'])->title();
        $faculty->last_name = Str::of($validated['lastName'])->title();
        $faculty->created_at = now();
        $faculty->updated_at = now();
        $faculty->email = $validated['email'];


        $faculty->college_id = session('user')->college_id;
        $faculty->usertype_id = Role::CLERK;
        $faculty->added_by_id = session('user')->id;

        if (!$faculty->save()) {
            return redirect()->route('dean.manage-clerk.create');
        }

        return redirect()->route('dean.manage-clerk.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $faculty = Faculty::withTrashed()->find($id);
        $userType = Str::of($faculty->userType->name)->title();
        $college = $faculty->college->acroname;
        return view('dean.manage-clerk.show', compact('faculty', 'userType', 'college'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $faculty = Faculty::withTrashed()->find($id);
        return view('dean.manage-clerk.edit', compact('faculty'));
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
        ]);


        $faculty = Faculty::withTrashed()->find($id);

        $faculty->first_name = Str::of($validated['firstName'])->title();
        $faculty->middle_name = Str::of($validated['middleName'])->title();
        $faculty->last_name = Str::of($validated['lastName'])->title();

        if (!$faculty->save()) {
            return redirect()->route('dean.manage-clerk.edit');
        }

        return redirect()->route('dean.manage-clerk.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $faculty = Faculty::withTrashed()->find($id);
        $faculty->delete();

        return redirect()->route('dean.manage-clerk.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function restore(string $id)
    {
        $faculty = Faculty::withTrashed()->find($id);
        $faculty->restore();

        return redirect()->route('dean.manage-clerk.index');
    }
}
