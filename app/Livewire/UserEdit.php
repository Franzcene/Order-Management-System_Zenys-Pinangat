<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Rules\ValidPhone;
use Illuminate\Support\Facades\Storage;

class UserEdit extends Component
{
    use WithFileUploads;

    public $userId;
    public $name = '';
    public $email = '';
    public $password = '';
    public $phone = '';
    public $address = '';
    public $role_id = '';
    public $photo;
    public $existingPhoto;
    public $removePhoto = false;

    public function mount($userId)
    {
        $user = User::findOrFail($userId);
        $this->userId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->address = $user->address;
        $this->role_id = $user->role_id;
        $this->existingPhoto = $user->photo;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|string|email|max:255|unique:users,email,' . $this->userId,
            'password' => 'nullable|string|min:8',
            'phone' => ['required', 'numeric', new ValidPhone],
            'address' => 'required|string|max:255',
            'role_id' => 'required|exists:roles,id',
            'photo' => 'nullable|image|max:2048',
        ];
    }

    public function save()
    {
        $this->validate();

        $user = User::findOrFail($this->userId);

        // Hash password if provided
        if ($this->password) {
            $user->password = Hash::make($this->password);
        }

        // Handle photo upload
        if ($this->photo) {
            $photoPath = $this->photo->store('photos', 'public');
            $user->photo = $photoPath;
        } elseif ($this->removePhoto) {
            if ($user->photo) {
                Storage::disk('public')->delete($user->photo);
            }
            $user->photo = null;
        }

        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'role_id' => $this->role_id,
        ]);

        session()->flash('status', 'User successfully updated.');

        return $this->redirectRoute('users.index');
    }

    public function render()
    {
        return view('livewire.user-edit', [
            'roles' => Role::all(),
        ]);
    }
}
