<?php

namespace App\Http\Livewire\Student\Research;

use App\Constants\Role;
use App\Models\Faculty;
use App\Models\Research;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Component;

class EditResearch extends Component
{


    public $research_id;
    public $currentAuthors; // records the current Author
    public $tags;

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

    public function mount()
    {

        $research = Research::with('adviser:id,first_name,middle_name,last_name')
            ->with('facultyInCharge:id,first_name,middle_name,last_name')
            ->find($this->research_id);
        $authors = Student::where('research_id', $this->research_id)
            ->get();

           /*  dd($authors->pluck('id')->toArray()); */

        $this->title = $research->title;
        $this->abstract = $research->abstract;
        $this->year = $research->year;
        $this->keywords = $research->keywords;
        $this->studentAuthors = $authors->pluck('id')->toArray();
        $this->currentAuthors = $authors->reject(function ($collection) {
            return $collection['id'] == session('user')->id;
        })->pluck('id');
        $this->adviser = $research->adviser->id;
        $this->facultyInCharge = $research->facultyInCharge->id;
        $this->onlyAuthor = (count($authors) == 1) ? true : false;
        $this->showAuthorDiv = (count($authors) == 1) ? "d-none" : "";

        $this->authors = Student::select('id', 'first_name', 'middle_name', 'last_name', 'research_id')
            ->where(function ($query) {
                $query->where('id', '<>', session('user')->id)
                    ->where('program_id', session('user')->program_id);
            })
            ->where(function ($query) use ($authors) {
                $query->whereIn('research_id', $authors->reject(function ($collection) {
                    return $collection['id'] == session('user')->id;
                })->pluck('research_id')->toArray())
                    ->orWhere('research_id', null);
            })
            ->orderBy('first_name')->get();

        $this->faculties = Faculty::whereHas('college.program', function ($query) {
            $query->where('id', session('user')->program_id)
                ->where('usertype_id', '<>', Role::CLERK)
                ->where('usertype_id', '<>', Role::ADMIN);
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

    public function editResearch()
    {

    /*     dd($this->studentAuthors, 'trigger'); */

        $this->validate();

        /* Save Research */

        $research = Research::find($this->research_id);

        $research->title = Str::title($this->title);
        $research->abstract = $this->abstract;
        $research->year = $this->year;
        $research->keywords = $this->keywords;
        $research->advisers_id = $this->adviser;
        $research->faculty_in_charge_id = $this->facultyInCharge;

        DB::beginTransaction();

        if ($research->save()) {

            DB::commit();

            if ($this->studentAuthors instanceof Collection) {
                $studentIds = collect($this->studentAuthors)->pluck('id')->toArray();
            } else {
                $studentIds = $this->studentAuthors;
            }

            /*
            *  This will compare the current authors before editing
            *  to the student authors after editing and will return
            *  the student authors that is not present in the
            *  updated list
            */
            $authorsToRemove = collect($this->currentAuthors)->diff($this->studentAuthors);


            if (count($authorsToRemove) > 0) {
                DB::beginTransaction();
                $result = Student::where('research_id', $research->id)
                    ->whereIn('id', $authorsToRemove) // ids of students to remove
                    ->update(['research_id' => null]);

                if ($result) {
                    DB::commit();
                } else {
                    DB::rollBack();
                    session()->flash('error', 'Error adding author');
                }
            }

            if (!$this->onlyAuthor) {
                DB::beginTransaction();
                $result = Student::whereIn('id', $studentIds)
                    ->update(['research_id' => $research->id]);

                if ($result) {
                    DB::commit();
                } else {
                    DB::rollBack();
                    session()->flash('error', 'Error adding author');
                }
            }

            if ($this->onlyAuthor) {

                $studentIds = collect($studentIds)->reject(function ($value, $key) {
                    return $value == session('user')->id;
                })->toArray();

              /*   dd($studentIds); */

                DB::beginTransaction();
                $result = Student::where('research_id', $research->id)
                    ->whereIn('id', $studentIds) // ids of students to remove
                    ->update(['research_id' => null]);

                if ($result) {
                    DB::commit();
                } else {
                    DB::rollBack();
                    session()->flash('error', 'Error adding author');
                }
            }

            return redirect(route('student.research.index'));
        } else {
            DB::rollBack();
        }
    }

    public function render()
    {
        return view('livewire.student.research.edit-research');
    }
}
