<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Rules\ValidPhone;
class UserCreate extends Component
{
    use WithFileUploads;

    public $name = '';
    public $email = '';
    public $password = '';
    public $phone = '';
    public $address = '';
    public $role_id = '';
    public $photo;

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
            'phone' => ['required', 'numeric', new ValidPhone],
            'address' => 'required|string|max:255',
            'role_id' => 'required|exists:roles,id',
            'photo' => 'nullable|image|max:2048',
        ];
    }

    public function save()
    {
        $this->validate();

        // Hash password
        $this->password = Hash::make($this->password);

        // Handle photo upload
        $photoPath = null;
        if ($this->photo) {
            $photoPath = $this->photo->store('photos', 'public');
        }

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'phone' => $this->phone,
            'address' => $this->address,
            'role_id' => $this->role_id,
            'photo' => $photoPath,
        ]);

        session()->flash('status', 'User successfully created.');

        return $this->redirectRoute('users.index');
    }

    public function render()
    {
        return view('livewire.user-create', [
            'roles' => Role::all(),
        ]);
    }
}
