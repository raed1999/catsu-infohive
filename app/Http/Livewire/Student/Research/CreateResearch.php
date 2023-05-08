<?php

namespace App\Http\Livewire\Student\Research;

use App\Constants\Role;
use App\Models\Faculty;
use App\Models\Research;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Component;

class CreateResearch extends Component
{

    public $authors;
    public $faculties;
    public $onlyAuthor;
    public $showAuthorDiv;

    public $title;
    public $abstract;
    public $adviser;
    public $keywords;
    public $studentAuthors;
    public $year;
    public $facultyInCharge;

    protected $rules = [
        'title' => 'required',
        'abstract' => 'required',
        'year' => 'required',
        'keywords' => 'required|array',
        'adviser' => 'required',
        'studentAuthors' => 'required_if:onlyAuthor,false|array',
        'facultyInCharge' => 'required',
    ];

    protected $messages = [
        'studentAuthors.required' => 'The authors field is required.',
        'studentAuthors.array' => 'The authors should be an array.',
        'studentAuthors.required_if' => 'The author field is required.',
    ];

    public function __construct()
    {
       Auth::shouldUse('student');
    }

    public function mount()
    {

        $this->title = "";
        $this->abstract = "";
        $this->year = Carbon::now()->format('Y');
        $this->keywords = [];
        $this->studentAuthors = [];
        $this->adviser = 0 ?? null;
        $this->facultyInCharge = 0 ?? null;
        $this->onlyAuthor = false;
        $this->showAuthorDiv = "";

        $this->authors = Student::select('id', 'first_name', 'middle_name', 'last_name')
            ->where('id', '<>', Auth::id())
            ->where('research_id', null)
            ->where('program_id', Auth::user()->program_id)->orderBy('first_name')
            ->get();

        $this->faculties = Faculty::whereHas('college.program', function ($query) {
            $query->where('id', Auth::user()->program_id)
                ->where('usertype_id', '<>', Role::CLERK);
        })->orderBy('first_name')->get();
    }

    public function updatedOnlyAuthor($value)
    {
        if ($value) {
            $this->showAuthorDiv = "d-none";
        }

        if (!$value) {
            $this->showAuthorDiv = "";
        }
    }

    public function addResearch()
    {
        $this->validate();

        /* Save Research */

        $research = new Research();

        $research->title = Str::title($this->title);
        $research->abstract = $this->abstract;
        $research->year = $this->year;
        $research->keywords = $this->keywords;
        $research->advisers_id = $this->adviser;
        $research->faculty_in_charge_id = $this->facultyInCharge;

        DB::beginTransaction();

        if ($research->save()) {

            DB::commit();

            $lastInsertedId = $research->id;


            /* Co-authors */
            if ($this->showAuthorDiv != "d-none") {
                for ($i = 0; $i < count($this->studentAuthors); $i++) {

                    $student = Student::find($this->studentAuthors[$i]);
                    $student->research_id = $lastInsertedId;

                    DB::beginTransaction();

                    if ($student->save()) {
                        DB::commit();
                    } else {
                        DB::rollBack();
                        session()->flash('error', 'Error adding ' . $student->first_name . ' ' . $student->middle_name . ' ' . $student->last_name  . ' as an author');
                    }
                }
            }

            /* Author that uploads */
            DB::beginTransaction();
            $student = Student::find(Auth::id());

            $student->research_id = $lastInsertedId;

            if ($student->save()) {
                DB::commit();
            } else {
                DB::rollBack();
            }

            session()->regenerate();
            session()->put('user', $student);

            return redirect(route('student.research.index'));
        } else {
            DB::rollBack();
        }
    }


    public function render()
    {
        return view('livewire.student.research.create-research');
    }
}
