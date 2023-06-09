<?php

namespace App\Http\Controllers\Dean;

use App\DataTables\Dean\DeanProgramDataTable;
use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\Research;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class DeanProgramController extends Controller
{

    public function index(DeanProgramDataTable $dataTable)
    {
        return $dataTable->render('dean.manage-program.index');
    }

    public function create()
    {
        return view('dean.manage-program.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|string|unique:programs,acroname',
            'program' => 'required|string|unique:programs,name',
        ]);

        $program = new Program();

        $program->acroname = Str::of($validated['code'])->upper();
        $program->name = Str::of($validated['program'])->title();
        $program->added_by_id = Auth::id();
        $program->college_id = Auth::user()->college_id;

        if (!$program->save()) {
            return redirect()->route('dean.manage-program.create');
        }

        return redirect()->route('dean.manage-program.index');
    }

    public function edit(string $id)
    {
        $program = Program::withTrashed()->find($id);
        return view('dean.manage-program.edit', compact('program'));
    }

    public function update(Request $request, string $id)
    {

        $program = Program::find($id);

        $validated = $request->validate([
            'code' => [
                'required',
                'string',
                Rule::unique('programs', 'acroname')->ignore($program->id),
            ],
            'program' => [
                'required',
                'string',
                Rule::unique('programs', 'name')->ignore($program->id),
            ],
        ]);

        $program->acroname = Str::of($validated['code'])->upper();
        $program->name = Str::of($validated['program'])->title();
        $program->added_by_id = Auth::id();
        $program->college_id = Auth::user()->college_id;

        if (!$program->save()) {
            return redirect()->route('dean.manage-program.create');
        }

        return redirect()->route('dean.manage-program.index');
    }
}
