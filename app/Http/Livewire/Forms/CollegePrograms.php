<?php

namespace App\Http\Livewire\Forms;

use App\Models\College;
use App\Models\Program;
use Livewire\Component;

class CollegePrograms extends Component
{

    public $colleges;
    public $programs;

    public $selectedCollege;
    public $selectedProgram;

    public function mount()
    {
        $this->colleges = College::where('acroname','<>','ITS')->get();

        $this->selectedCollege = old('college');
        $this->selectedProgram = old('program');

        $this->programs = Program::where('college_id', $this->selectedCollege)->get();
    }

    public function render()
    {
        return view('livewire.forms.college-programs');
    }

    public function updatedSelectedCollege($college)
    {
        $this->programs = Program::where('college_id', $college)->get();
        $this->selectedProgram = null;
    }

}
