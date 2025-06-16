
<h1>{{ $character->name }}</h1>
<p>Race: {{ $character->race->name }}</p>
<p>Class: {{ $character->class->name ?? 'Unknown' }}</p>
<p>Level: {{ $character->level }}</p>
<p>Description: {{ $character->description }}</p>

@if($character->image)
    <img src="{{ asset("storage/app/public/myimage.jpg{$character->image}") }}" alt="{{ $character->name }} Image" class="w-32 h-auto mb-4 rounded">
@endif

<h2>Spells</h2>

@foreach($character->spells->groupBy('level') as $level => $spells)
    <h3>Level {{ $level }}</h3>
    <ul>
        @foreach($spells as $spell)
            <li>
                <strong>{{ $spell->name }}</strong> — {{ $spell->description }}<br>
                <span>Casting Time: {{ $spell->casting_time }}</span>,
                <span>Range: {{ $spell->range }}</span>
                @if($spell->components)
                    , <span>Components: {{ $spell->components }}</span>
                @endif
                @if($spell->duration)
                    , <span>Duration: {{ $spell->duration }}</span>
                @endif
            </li>
        @endforeach
    </ul>
@endforeach

<a href="{{ route('characters.index') }}" class="mt-6 inline-block text-black hover:underline">
    <- Back to Character List
</a>

