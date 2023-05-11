<?php

namespace App\Http\Livewire\Research;

use App\Models\Research as ModelsResearch;
use Livewire\Component;
use Livewire\WithPagination;

class Research extends Component
{
    use WithPagination;

    public $search = '';
    protected $researches;

    protected $paginationTheme = 'bootstrap';

    public function updatedSearch()
    {
        $this->resetPage();
    }


    public function render()
    {

        $this->researches = ModelsResearch::query()
            ->with('authors:id,first_name,middle_name,last_name')
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
}
