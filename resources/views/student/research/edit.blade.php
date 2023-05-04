<x-layout>

    <x-slot:title>
        CatSU InfoHive | Manage Capstone / Thesis
    </x-slot:title>

    <div class="row mb-2 justify-content-between">
        <div class="col">
            <h3> Edit Capstone / Thesis</h3>
        </div>
    </div>

    @livewire('student.research.edit-research',['research_id' => $research_id])

</x-layout>
