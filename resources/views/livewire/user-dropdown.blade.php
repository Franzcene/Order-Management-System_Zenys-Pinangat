<div>
    <input
        type="text"
        class="form-control"
        placeholder="Search users..."
        wire:model.live.debounce.150ms="search"
        id="user-search-input"
        autocomplete="off"
        onfocus="showDropdown(true)"
    >

    <input type="hidden" id="user_id" name="user_id" />

    <div>
        <ul class="dropdown-menu" id="user-dropdown" @if($showDropdown) style="display: block;" @else style="display: none;" @endif> <!-- Control display with Livewire property -->
            @forelse($users as $user)
                <li class="dropdown-item" onclick="selectUser('{{ $user->id }}', '{{ $user->name }}')">{{ $user->name }}</li>
            @empty
                <li class="dropdown-item">No users found.</li>
            @endforelse
        </ul>
    </div>
</div>

<script>
function showDropdown(forceShow = false) {
    const dropdown = document.getElementById('user-dropdown');

    // Show dropdown if forced or if it should be shown based on Livewire
    dropdown.style.display = forceShow ? 'block' : dropdown.style.display;
}

function selectUser(id, name) {
    document.getElementById('user-search-input').value = name;
    document.getElementById('user_id').value = id;
    document.getElementById('user-dropdown').style.display = 'none'; // Hide dropdown after selection
}

document.addEventListener('click', function(event) {
    const dropdown = document.getElementById('user-dropdown');
    const input = document.getElementById('user-search-input');

    // Hide dropdown if clicking outside of the input or dropdown
    if (!input.contains(event.target) && !dropdown.contains(event.target)) {
        dropdown.style.display = 'none';
    }
});
</script>
