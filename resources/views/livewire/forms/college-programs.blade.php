<div class="row mt-3">
    <div class="col-md-6">
        <label for="college" class="form-label">College</label>
        <select class="form-select" wire:model="selectedCollege" id="college" name="college" required="">
            <option selected value="">Choose...</option>
            @foreach ($colleges as $college)
                <option value="{{ $college->id }}">{{ $college->name }}
                    ({{ $college->acroname }})
                </option>
            @endforeach
        </select>
        @error('college')
            <div class="text-danger">
                {{ $message }}
            </div>
        @enderror

    </div>

    <div class="col-md-6">
        <label for="program" class="form-label">Program</label>
        <select class="form-select" wire:model="selectedProgram" id="program" name="program" required="">
            <option selected value="">Choose...</option>
            @if (!is_null($selectedCollege))
                @foreach ($programs as $program)
                    <option value="{{ $program->id }}">{{ $program->name }} ({{ $program->acroname }})</option>
                @endforeach
            @endif
        </select>
        @error('program')
        <div class="text-danger">
            {{ $message }}
        </div>
    @enderror
    </div>

</div>
