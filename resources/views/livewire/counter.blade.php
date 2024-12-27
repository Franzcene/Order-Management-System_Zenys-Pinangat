<div class="d-flex justify-content-center align-items-center my-3">
    <!-- Decrement Button -->
    <button wire:click="decrement" class="btn btn-counter">-</button>

    <!-- Quantity Input Field bound to Livewire -->
    <input
        type="number"
        class="form-control mx-2"
        wire:model="quantity"
        style="width: 80px; text-align: center;">

    <!-- Increment Button -->
    <button wire:click="increment" class="btn btn-counter">+</button>
</div>
