<div>
    <form wire:submit.prevent='UpdateGeneralSettings()' method="post">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="" class="form-label">Blog name</label>
                    <input type="text" wire:model='blog_name' class="form-control" placeholder="Enter blog name">
                    <span class="text-danger">
                        @error('blog_name')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Blog Email</label>
                    <input wire:model='blog_email' type="text" class="form-control" placeholder="Enter blog Email">
                    <span class="text-danger">
                        @error('blog_email')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Blog description</label>
                    <textarea wire:model='blog_description' class="form-control" name="" id="" cols="3" rows="3"></textarea>
                    <span class="text-danger">
                        @error('blog_description')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <button class="btn btn-primary">Save Changes</button>
            </div>
        </div>
    </form>
</div>
