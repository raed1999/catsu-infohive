<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Research;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = session('user');

        if ($user->research_id == null || empty($user->research_id)) {
            return view('student.research.index');
        } else {
            $research = Research::with('adviser:id,first_name,middle_name,last_name')
                ->with('facultyInCharge:id,first_name,middle_name,last_name')
                ->find($user->research_id);
            $authors = Student::where('research_id', $user->research_id)
                ->get();
            return view('student.research.index', compact('research', 'authors'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('student.research.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /* return view('student.research.store'); */
        dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('student.research.edit',['research_id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    /**
     *  Returns API Call for Author
     * */
    public function loadStudents(string $id)
    {
        // $students = Student::all('id','name');
        $students = Student::select(DB::raw("CONCAT(first_name, ' ', COALESCE(middle_name, ''), ' ', last_name) AS label"), "id AS value")
            ->get();

        return response()->json($students);
    }
}
