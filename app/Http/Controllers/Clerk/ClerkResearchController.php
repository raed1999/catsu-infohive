<?php

namespace App\Http\Controllers\Clerk;

use App\DataTables\Clerk\ClerkResearchDataTable;
use App\Http\Controllers\Controller;
use App\Models\Research;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClerkResearchController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(ClerkResearchDataTable $dataTable)
    {
        return $dataTable->render('clerk.manage-research.index');
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
        $research = Research::select('research.id', 'title', 'year', 'abstract', 'keywords', 'advisers_id', 'faculty_in_charge_id', 'research.confirmed_by_id')
            ->with('authors:id,first_name,middle_name,last_name,research_id')
            ->with('adviser:id,first_name,middle_name,last_name')
            ->with('facultyInCharge:id,first_name,middle_name,last_name')
            ->with('confirmedBy:id,first_name,middle_name,last_name')
            ->find($id);

/*             dd($research);
 */        return view('clerk.manage-research.show', compact('research'));
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

        $research = Research::find($id);

        if (!$research->confirmed_by_id) {
            $research->confirmed_by_id = Auth::user()->id;
            $research->save();
            return response()->json(['message' => 'Research confirmed successfully']);
        }

        if ($research->confirmed_by_id) {
            $research->confirmed_by_id = null;
            $research->save();
            return response()->json(['message' => 'Confirmation undo successfully']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
