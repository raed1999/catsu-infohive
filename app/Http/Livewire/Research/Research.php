<?php

namespace App\Http\Livewire\Research;

use App\Models\College;
use App\Models\Research as ModelsResearch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Research extends Component
{
    use WithPagination;

    public $colleges;
    public $selectedCollege = 'all';

    public $search = '';
    public $filter = 'all';
    protected $researches;
    public $selectedResearch;

    protected $topKeywords;

    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
    }

    public function render()
    {

        $this->colleges = College::where('id', '<>', 1)->get('acroname');

        $this->topKeywords = ModelsResearch::whereHas('authors.program.college', function ($query) {
            $query->where('id', '<>', 1);
        })->whereNotNull('confirmed_by_id')
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

        $this->researches =  ModelsResearch::query()
            ->select('research.id', 'title', 'year', 'abstract', 'keywords', 'advisers_id', 'faculty_in_charge_id', 'research.confirmed_by_id')
            ->with('authors:id,first_name,middle_name,last_name,research_id,program_id')
            ->with('adviser:id,first_name,middle_name,last_name')
            ->with('facultyInCharge:id,first_name,middle_name,last_name')
            ->with('program.college')
            ->whereHas('authors.program.college', function ($query) {
                $query->when($this->selectedCollege != 'all', function ($query) {
                    $query->where('acroname', $this->selectedCollege);
                })->unless($this->selectedCollege != 'all', function ($query) {
                    $query->orWhereNotNull('acroname');
                });
            })
            ->where(function ($query) {
                $query->whereNotNull('research.confirmed_by_id')
                    ->when($this->filter === 'all', function ($query) {
                        $query->where(function ($query) {
                            $search = '%' . $this->search . '%';
                            $query->where('title', 'like', $search)
                                ->orWhere('abstract', 'like', $search)
                                ->orWhere('keywords', 'like', $search)
                                ->orWhere('year', 'like', $search)
                                ->orWhereHas('authors', function ($query) use ($search) {
                                    $query->whereRaw("CONCAT(first_name, ' ', middle_name, ' ', last_name) LIKE ?", [$search]);
                                })
                                ->orWhereHas('adviser', function ($query) use ($search) {
                                    $query->whereRaw("CONCAT(first_name, ' ', middle_name, ' ', last_name) LIKE ?", [$search]);
                                })
                                ->orWhereHas('facultyInCharge', function ($query) use ($search) {
                                    $query->whereRaw("CONCAT(first_name, ' ', middle_name, ' ', last_name) LIKE ?", [$search]);
                                });
                        });
                    })
                    ->when($this->filter === 'title', function ($query) {
                        $query->where(function ($query) {
                            $search = '%' . $this->search . '%';
                            $query->where('title', 'like', $search);
                        });
                    })
                    ->when($this->filter === 'year', function ($query) {
                        $query->where(function ($query) {
                            $search = '%' . $this->search . '%';
                            $query->where('year', 'like', $search);
                        });
                    })
                    ->when($this->filter === 'keyword', function ($query) {
                        $query->where(function ($query) {
                            $search = '%' . $this->search . '%';
                            $query->where('keyword', 'like', $search);
                        });
                    })
                    ->when($this->filter === 'author', function ($query) {
                        $query->whereHas('authors', function ($query) {
                            $query->whereRaw("CONCAT(first_name, ' ', middle_name, ' ', last_name) LIKE ?", ['%' . $this->search . '%']);
                        });
                    })
                    ->when($this->filter === 'adviser', function ($query) {
                        $query->whereHas('adviser', function ($query) {
                            $query->whereRaw("CONCAT(first_name, ' ', middle_name, ' ', last_name) LIKE ?", ['%' . $this->search . '%']);
                        });
                    })
                    ->when($this->filter === 'facultyInCharge', function ($query) {
                        $query->whereHas('facultyInCharge', function ($query) {
                            $query->whereRaw("CONCAT(first_name, ' ', middle_name, ' ', last_name) LIKE ?", ['%' . $this->search . '%']);
                        });
                    });
            })->paginate(5);


        return view('livewire.research.research', [
            'researches' => $this->researches,
            'topKeywords' => $this->topKeywords,
        ]);
    }

    public function updatedSearch($value)
    {
        $this->resetPage();
    }

    public function updatedFilter($value)
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
        )->with(
            'authors:id,first_name,middle_name,last_name,research_id',
            'adviser:id,first_name,middle_name,last_name',
            'facultyInCharge:id,first_name,middle_name,last_name',
            'program.college',
        )->findOrFail($id);

      /*   dd($this->selectedResearch); */

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
