@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-6">Edit Character: {{ $character->name }}</h1>

<form method="POST" action="{{ route('characters.update', $character->id) }}" enctype="multipart/form-data" class="space-y-6 max-w-md">

    @csrf
    @method('PUT')

    <div>
        <label for="name" class="block font-semibold mb-1">Name</label>
        <input id="name" name="name" type="text" value="{{ old('name', $character->name) }}" required
            class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
        @error('name')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    <div>
        <label for="race_id" class="block font-semibold mb-1">Race</label>
        <select id="race_id" name="race_id" required
            class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            @foreach($races as $race)
            <option value="{{ $race->id }}" @if(old('race_id', $character->race_id) == $race->id) selected @endif>
                {{ $race->name }}
            </option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="class_id" class="block font-semibold mb-1">Class</label>
        <select id="class_id" name="class_id" required
            class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            @foreach($classes as $class)
            <option value="{{ $class->id }}" @if(old('class_id', $character->class_id) == $class->id) selected @endif>
                {{ $class->name }}
            </option>
            @endforeach
        </select>
        @error('class_id')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    <div>
        <label for="level" class="block font-semibold mb-1">Level</label>
        <input id="level" name="level" type="number" min="1" value="{{ old('level', $character->level) }}" required
            class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
        @error('level')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    <div>
        <label for="description" class="block font-semibold mb-1">Description</label>
        <textarea id="description" name="description"
            class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2" style="width: 500px">{{ old('description', $character->description) }}</textarea>
        @error('description')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="image" class="block font-semibold mb-1">Character Image</label>
        <input id="image" name="image" type="file" accept="image/jpeg,image/png"
            class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
        @error('image')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror

        @if($character->image)
        <p class="mt-2">Current image:</p>
        <img src="{{ asset('storage/' . $character->image) }}" alt="Portrait of {{ $character->name }} the {{ $character->race->name }} {{ $character->class->name }} in a fantasy setting; background details and mood may vary depending on the uploaded image" class="w-32 h-auto mt-1">
        @endif
    </div>

    <button type="submit"
        class="bg-black text-white px-4 py-2 rounded hover:bg-gray-800 transition">
        Save
    </button>

    <h2 class="text-xl font-semibold mt-10">Manage Spells</h2>
    <form id="manage-spells-form" class="space-y-4 ">
        @csrf
        <input type="hidden" name="character_id" value="{{ $character->id }}">
        <p class="text-gray-600">Manage the spells known by this character. You can add or remove spells as needed.</p>
        <h3>Known Spells</h3>
        <ul id="known-spells-list">
            @foreach($knownSpells as $spell)
            <li data-spell-id="{{ $spell->id }}">
                {{ $spell->name }}
                <button class="remove-spell-btn" data-spell-id="{{ $spell->id }}">Remove</button>
            </li>
            @endforeach
        </ul>

        <h3>Add New Spell</h3>
        <select id="add-spell-select" name="spell_id">
            <option value="">Select a spell</option>
            @foreach($spells as $spell)
            <option value="{{ $spell->id }}">{{ $spell->name }}</option>
            @endforeach
        </select>
        <button id="add-spell-btn">Add Spell</button>
        <p class="text-gray-600 mb-4">Manage the spells known by this character. You can add or remove spells as needed.</p>
    </form>

    @endsection

    @section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Adding a new spell
            $('#add-spell-btn').click(function(e) {
                e.preventDefault();

                const spellId = $('#add-spell-select').val();
                if (!spellId) {
                    alert('Please select a spell.');
                    return;
                }

                $.ajax({
                    url: '{{ route("characters.spells.add", $character->id) }}',
                    method: 'POST',
                    data: {
                        spell_id: spellId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        // Add the spell to the list
                        const spellName = $('#add-spell-select option:selected').text();
                        $('#known-spells-list').append(
                            `<li data-spell-id="${spellId}">
                        ${spellName}
                        <button class="remove-spell-btn" data-spell-id="${spellId}">Remove</button>
                    </li>`
                        );
                        // Reset selection
                        $('#add-spell-select').val('');
                        alert('Spell added successfully!');
                    },
                    error: function(xhr) {
                        alert('Failed to add spell: ' + (xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : 'An error occurred.'));
                    }
                });
            });

            // Removing a spell (event delegation, since elements are dynamic)
            $('#known-spells-list').on('click', '.remove-spell-btn', function() {
                if (!confirm('Remove this spell?')) return;

                const spellId = $(this).data('spell-id');
                const $li = $(this).closest('li');

                $.ajax({
                    url: '/characters/{{ $character->id }}/spells/' + spellId,
                    method: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $li.remove();
                        alert('Spell removed successfully!');
                    },
                    error: function(xhr) {
                        alert('Failed to remove spell: ' + (xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : 'An error occurred.'));
                    }
                });
            });
        });
    </script>