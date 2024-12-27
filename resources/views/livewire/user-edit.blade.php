<div>
    <form wire:submit.prevent="save" novalidate>
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name <x-required/> </label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" wire:model="name" required>
            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email <x-required/></label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" wire:model="email" required>
            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone <x-required/></label>
            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" wire:model="phone">
            @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address <x-required/></label>
            <input class="form-control @error('address') is-invalid @enderror" id="address" wire:model="address"></input>
            @error('address') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="role_id" class="form-label">Role <x-required/></label>
            <select class="form-control @error('role_id') is-invalid @enderror" id="role_id" wire:model="role_id" required>
                <option value="">Select Role</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
            @error('role_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="photo" class="form-label">Photo (optional)</label>
            <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" wire:model="photo">
            @error('photo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            @if ($photo)
                <img src="{{ $photo->temporaryUrl() }}" class="img-thumbnail mt-2" width="150">
            @elseif ($existingPhoto)
                <img src="{{ Storage::url($existingPhoto) }}" class="img-thumbnail mt-2" width="150">
                <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" id="removePhoto" wire:model="removePhoto">
                    <label class="form-check-label" for="removePhoto">
                        Remove Photo
                    </label>
                </div>
            @endif
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password (leave blank to keep current password)</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" wire:model="password">
            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update User</button>
    </form>
</div>
