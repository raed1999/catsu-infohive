<div>
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Input Information</h5>

                    <form class="row g-3" wire:submit.prevent="addResearch" method="POST" action="" novalidate="">
                        @csrf
                        <div class="col-md-12">
                            <label for="firstName" class="form-label">Title</label>
                            <input type="text" wire:model="title" class="form-control" id="title" name="title"
                                value="{{-- {{ old('firstName') }} --}}" required="">
                            @error('title')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        @csrf
                        <div class="col-md-12">
                            <label for="year" class="form-label">Year</label>
                            <input type="text" wire:model="year" class="form-control" id="year" name="year"
                                value="{{-- {{ old('firstName') }} --}}" required="">
                            @error('year')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="abstract" class="form-label">Abstract</label>
                            <textarea class="form-control" wire:model="abstract" cols="1" rows="5" id="abstract" name="abstract"
                                value="{{-- {{ old('firstName') }} --}}" required="">

                            </textarea>
                            @error('abstract')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div wire:ignore wire:key="addResearchKeywords" class="col-md-12">
                            <label for="abstract" class="form-label">Keywords <small class="text-primary">*Enter to add
                                    keyword.</small></label>
                            <select class="form-select" wire:model.defer="keywords" id="tags-input" name="keywords[]"
                                data-allow-clear="true" multiple data-allow-new="true"></select>
                        </div>
                        @error('keywords')
                            <div class="text-danger mt-0">
                                {{ $message }}
                            </div>
                        @enderror
                        {{--  {{ dd($students) }} --}}
                        {{--     @if (!$onlyAuthor) --}}
                        <div class="{{ $showAuthorDiv }}">
                            <div wire:ignore wire:key="addResearchAuthors" class="col-md-12 ">
                                <label for="author" class="form-label">Co-Authors
                                    <small class="text-primary">*Limit to co-authors, You're in already.</small>
                                </label>
                                <select class="form-select" wire:model.defer="studentAuthors" id="tags-input"
                                    name="studentAuthors[]" data-allow-clear="true" multiple>
                                    <option disabled hidden value=""></option>
                                    @foreach ($authors as $author)
                                        <option value="{{ $author->id }}">
                                            {{ $author->first_name . ' ' . $author->middle_name . ' ' . $author->last_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{--    @endif --}}
                        <div class="col-md-12 @if($showAuthorDiv == "")  mt-0 @endif">
                            <small>
                                <input wire:model="onlyAuthor" type="checkbox">
                                <label for="onlyAuthor">Check if you're the only author</label>
                            </small>
                        </div>
                        @error('studentAuthors')
                            <div class="text-danger mt-0">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="col-md-12">
                            <label for="adviser" class="form-label">Adviser</label>
                            <select class="form-select" wire:model="adviser" id="adviser" name="adviser">
                                <option  selected>Choose...</option>
                                @foreach ($faculties as $faculty)
                                    <option value="{{ $faculty->id }}">
                                        {{ $faculty->first_name . ' ' . $faculty->middle_name . ' ' . $faculty->last_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('adviser')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="faculty-in-charge" class="form-label">Faculty-in-Charge</label>
                            <select class="form-select" wire:model="facultyInCharge" id="tags-input"
                                name="facultyInCharge" data-allow-clear="true">
                                <option  selected >Choose...</option>
                                @foreach ($faculties as $faculty)
                                    <option value="{{ $faculty->id }}">
                                        {{ $faculty->first_name . ' ' . $faculty->middle_name . ' ' . $faculty->last_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('facultyInCharge')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" name="" type="submit">Save</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
