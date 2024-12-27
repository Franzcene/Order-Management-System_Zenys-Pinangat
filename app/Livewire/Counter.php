<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $quantity = 0;
    public $productId;

    public function mount($productId)
    {
        $this->productId = $productId;
    }

    public function increment()
    {
        $this->quantity++;
    }

    public function decrement()
    {
        if ($this->quantity > 0) {
            $this->quantity--;
        }
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
