<?php

namespace App\Http\Livewire\Research;

use App\Models\Research as ModelsResearch;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Research extends Component
{
    use WithPagination;

    public $search = '';
    protected $researches;
    public $selectedResearch;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {

        $this->researches = ModelsResearch::query()
            ->select('research.id', 'title', 'abstract', 'keywords', 'advisers_id', 'faculty_in_charge_id')
            ->with('authors:id,first_name,middle_name,last_name,research_id')
            ->with('adviser:id,first_name,middle_name,last_name')
            ->with('facultyInCharge:id,first_name,middle_name,last_name')
            ->where('title', 'like', '%' . $this->search . '%')
            ->orWhere('abstract', 'like', '%' . $this->search . '%')
            ->orWhere('keywords', 'like', '%' . $this->search . '%')
            ->orWhere('year', 'like', '%' . $this->search . '%')
            ->orWhereHas('authors', function ($query) {
                $query->whereRaw("CONCAT(first_name, ' ', middle_name, ' ', last_name) LIKE ?", ['%' . $this->search . '%']);
            })
            ->orWhereHas('adviser', function ($query) {
                $query->whereRaw("CONCAT(first_name, ' ', middle_name, ' ', last_name) LIKE ?", ['%' . $this->search . '%']);
            })
            ->orWhereHas('facultyInCharge', function ($query) {
                $query->whereRaw("CONCAT(first_name, ' ', middle_name, ' ', last_name) LIKE ?", ['%' . $this->search . '%']);
            })
            ->paginate(5);


        return view('livewire.research.research', [
            'researches' => $this->researches,
        ]);
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function selectResearch($id)
    {
        $this->selectedResearch =  $this->selectedResearch = ModelsResearch::select(
            'research.id',
            'title',
            'abstract',
            'keywords',
            'advisers_id',
            'faculty_in_charge_id'
        )
            ->with(
                'authors:id,first_name,middle_name,last_name,research_id',
                'adviser:id,first_name,middle_name,last_name',
                'facultyInCharge:id,first_name,middle_name,last_name'
            )->findOrFail($id);
    }


    public function removeSelectedResearch()
    {
        $this->selectedResearch =  null;
    }

    public function clearSelectedResearch()
    {
        $this->selectedResearch =  null;
    }
}
