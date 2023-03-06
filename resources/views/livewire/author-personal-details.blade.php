<div>
    <form method="post" wire:submit.prevent='UpdateDetails()'>
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" wire:model='name' class="form-control" name="example-text-input" placeholder="Name">
                    <span class="text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" wire:model='username' class="form-control" name="example-text-input" placeholder="Username">
                    <span class="text-danger">
                        @error('username')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" wire:model='email' class="form-control" name="example-text-input" placeholder="Email" disabled>
                    <span class="text-danger">
                        @error('username')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Biography</label>
            <textarea class="form-control" wire:model='biography' placeholder="Content" name="example-textarea-input" rows="6" placeholder="Content..">Biography...</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</div>