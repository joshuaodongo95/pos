<div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label">Title <span class="text-danger">*</span></label>
            <input type="text"  wire:model="name" wire:keyup="generate_slug" class="form-control" name="name" placeholder="Product name" value="{{ old('name') }}" />
            @error('name')<small class="text-danger">{{$message}}</small>@enderror
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label">Slug <span class="text-danger">*</span></label>
            <input type="text"  wire:model="slug" class="form-control" name="slug" placeholder="Product slug" value="{{ old('slug') }}" disabled />
            @error('slug')<small class="text-danger">{{$message}}</small>@enderror
        </div>
    </div>
</div>
