<?php

namespace App\Http\Controllers\Dean;

use App\Constants\Role;
use App\Http\Controllers\Controller;
use App\Models\Faculty;
use App\Models\Program;
use App\Models\Research;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DeanDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        /* Research */
        $researchCount = Research::whereHas('authors.program.college', function ($query) {
            $query->where('id', Auth::user()->college_id);
        })->count();

        $confirmedResearchCount = Research::whereHas('authors.program.college', function ($query) {
            $query->where('id', Auth::user()->college_id);
        })->whereNotNull('confirmed_by_id')
            ->count();

        /* Student */
        $studentCount =  Student::where('usertype_id', Role::STUDENT)
            ->whereRelation('program', 'college_id', Auth::user()->college_id)
            ->count();

        $confirmedStudentCount =  Student::where('usertype_id', Role::STUDENT)
            ->whereRelation('program', 'college_id', Auth::user()->college_id)
            ->whereNotNull('email_verified_at')
            ->count();

        /* Faculty */
        $allFacultyCount =  Faculty::where('college_id', Auth::user()->college_id)
            ->count();

        $facultyCount =  Faculty::where('usertype_id', Role::FACULTY)
            ->where('college_id', Auth::user()->college_id)
            ->count();

        $clerkCount =  Faculty::where('usertype_id', Role::CLERK)
            ->where('college_id', Auth::user()->college_id)
            ->count();

        /* Program */
        $programCount =  Program::where('college_id', Auth::user()->college_id)
            ->count();

        /* Keywords */
        $topKeywords = Research::whereHas('authors.program.college', function ($query) {
            $query->where('id', Auth::user()->college_id);
        })
            ->select('keywords')
            ->get()
            ->pluck('keywords')
            ->flatMap(function ($keywords) {
                return $keywords;
            })
            ->countBy()
            ->sortByDesc(function ($count) {
                return $count;
            })
            ->take(10)
            ->map(function ($count, $keyword) {
                return (object) [
                    'keyword' => $keyword,
                    'count' => $count,
                ];
            })
            ->values();




        return view('dean.manage-dashboard.index', compact(
            'researchCount',
            'confirmedResearchCount',
            'studentCount',
            'confirmedStudentCount',
            'allFacultyCount',
            'facultyCount',
            'clerkCount',
            'topKeywords',
            'programCount'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
}
