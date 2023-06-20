<div class="row justify-content-center mt-5">
    <div class="col-lg-6">
        <div class="pagetitle">
            <h1>Change Password</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        It looks like that you are using the default password.
                        <br>
                        To avoid security problem, we are encouraging you to have a strong password.
                    </li>
                </ol>
            </nav>
        </div>

        <div class="card p-5">
            <div class="card-body ">
                <form wire:submit.prevent="save" class="row g-3">
                    <div class="col-12">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" wire:model="password" class="form-control" id="password">

                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>
                    <div class="col-12">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" wire:model="password_confirmation" class="form-control" id="password_confirmation">
                        @error('password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
