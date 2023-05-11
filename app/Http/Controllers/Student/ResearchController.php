<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Research;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ResearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = Auth::user();

        if ($user->research_id == null || empty($user->research_id)) {
            return view('student.research.index');
        } else {
            $research = Research::with('adviser:id,first_name,middle_name,last_name')
                ->with('facultyInCharge:id,first_name,middle_name,last_name')
                ->with('authors:id,first_name,middle_name,last_name')
                ->find($user->research_id);
            return view('student.research.index', compact('research'));
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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('student.research.edit', ['research_id' => $id]);
    }
}
