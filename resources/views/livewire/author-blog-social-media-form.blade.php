<div>
    <form wire:submit.prevent='updateBlogSocialMedia()' method="POST">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Facebook</label>
                    <input type="text" wire:model='facebook_url' class="form-control" placeholder="Facebook page url">
                    <span class="text-danger">
                        @error('facebook_url')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Instagram</label>
                    <input type="text" wire:model='instagram_url' class="form-control" placeholder="Instagram url">
                    <span class="text-danger">
                        @error('instagram_url')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Youtube</label>
                    <input type="text" wire:model='youtube_url' class="form-control" placeholder="Youtube channel url">
                    <span class="text-danger">
                        @error('youtube_url')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">LinkedIn</label>
                    <input type="text" wire:model='linkedin_url' class="form-control" placeholder="LinkedIn url">
                    <span class="text-danger">
                        @error('linkedin_url')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
