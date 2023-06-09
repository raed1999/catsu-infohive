<x-layout>

    <x-slot:title>
        CatSU InfoHive | Manage Capstone / Thesis
    </x-slot:title>

    <div class="row justify-content-between">
        <div class="col">
            <div class="pagetitle">
                <h1>Manage Capstone | Thesis</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item">Manage Capstone | Thesis</li>
                        <li class="breadcrumb-item active">Edit Capstone | Thesis</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    @livewire('student.research.edit-research',['research_id' => $research_id])

</x-layout>
