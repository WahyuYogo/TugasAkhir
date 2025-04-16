{{-- <x-layouts.app> --}}
<div>
    <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="Foto Profil">

    <h1>{{ $user->name }}</h1>
    <h4>{{ $user->job }}</h4>

    @foreach ($user->sociallinks as $link)
        <h5>{{ $link->platform }}</h5>
        <a href="{{ $link->url }}">
            {{ $link->url }}
        </a>
    @endforeach
</div>
{{-- </x-layouts.app> --}}
