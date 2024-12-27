<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class UserDropdown extends Component
{
    public $search = '';
    public $showDropdown = false; // Add a property to control dropdown visibility

    public function mount()
    {
        $this->showDropdown = false; // Initialize dropdown to be hidden on mount
    }

    public function updatedSearch()
    {
        // Update the visibility of the dropdown based on search results
        $this->showDropdown = strlen($this->search) > 0; // Show dropdown if there's text
    }

    public function render()
    {
        $results = User::when(strlen($this->search) >= 1, function($query) {
            return $query->where('name', 'like', '%' . $this->search . '%');
        })->get();

        return view('livewire.user-dropdown', ['users' => $results]);
    }
}
