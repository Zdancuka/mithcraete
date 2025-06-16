<style>
    .form-label {
        display: block;
        font-weight: 600;
        margin-bottom: 0.25rem;
    }
</style>

<form action="{{ route('characters.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label for="name" class="form-label">Name:</label>
    <input type="text" name="name" id="name" required>

    <label for="race_id" class="form-label">Race:</label>
    <select name="race_id" id="race_id" required>
        <option value="" disabled selected>Select Race</option>
        @foreach($races as $race)
        <option value="{{ $race->id }}">{{ $race->name }}</option>
        @endforeach
    </select>

    <label for="class_id" class="form-label">Class:</label>
    <select name="class_id" id="class_id" required>
        <option value="" disabled selected>Select Class</option>
        @foreach($classes as $class)
        <option value="{{ $class->id }}">{{ $class->name }}</option>
        @endforeach
    </select>

    <label for="level">Level:</label>
    <input type="number" name="level" id="level" min="1" required>

    <label for="description">Description (optional):</label>
    <textarea name="description" id="description"></textarea>


    <label for="spells" class="form-label">Spells:</label>
    <div style="max-height: 200px; overflow-y: auto; border: 1px solid #ccc; padding: 8px;">
        @foreach($spells as $spell)
        <div>
            <input type="checkbox" name="spells[]" value="{{ $spell->id }}" id="spell_{{ $spell->id }}">
            <label for="spell_{{ $spell->id }}">{{ $spell->name }} (Level {{ $spell->level }})</label>
        </div>
        @endforeach
    </div>

    <div>
        <label for="image" class="form-label">Character Image (JPG/PNG)</label>
        <input id="image" name="image" type="file" accept="image/jpeg,image/png"
            class="w-full border rounded px-3 py-2">
        @error('image')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
    </div>


    <button type="submit">Create Character</button>
</form>