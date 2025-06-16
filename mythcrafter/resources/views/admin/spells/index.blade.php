<form action="{{ route('spells.destroy', $spell) }}" method="POST" onsubmit="return confirm('Are you sure?')" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="text-red-600 hover:underline ml-2">Delete</button>
</form>
