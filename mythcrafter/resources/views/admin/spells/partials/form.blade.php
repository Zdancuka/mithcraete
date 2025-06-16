@php
    $spell = $spell ?? null;
@endphp

<div class="mb-3">
    <label for="name">Name</label>
    <input type="text" name="name" value="{{ old('name', $spell->name ?? '') }}" class="form-control" required>
</div>

<div class="mb-3">
    <label for="level">Level</label>
    <input type="number" name="level" value="{{ old('level', $spell->level ?? 0) }}" class="form-control" required>
</div>

<div class="mb-3">
    <label for="school">School</label>
    <input type="text" name="school" value="{{ old('school', $spell->school ?? '') }}" class="form-control">
</div>

<div class="mb-3">
    <label for="components">Components</label>
    <input type="text" name="components" value="{{ old('components', $spell->components ?? '') }}" class="form-control">
</div>

<div class="mb-3">
    <label for="casting_time">Casting Time</label>
    <input type="text" name="casting_time" value="{{ old('casting_time', $spell->casting_time ?? '') }}" class="form-control">
</div>

<div class="mb-3">
    <label for="description">Description</label>
    <textarea name="description" class="form-control">{{ old('description', $spell->description ?? '') }}</textarea>
</div>
