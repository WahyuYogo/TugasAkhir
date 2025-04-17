<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    <div>
        <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="Foto Profil" style="max-width: 200px;">

        <h1>{{ $user->name }}</h1>
        <h4>{{ $user->job }}</h4>
        <h6>{{ $user->about }}</h6>
        <hr>
        <h3>Skill</h3>
        <ul>
            @foreach ($user->skills as $skill)
                <li>{{ $skill->name }}</li>
            @endforeach
        </ul>
        <hr>
        <h3>Projects</h3>
        <ul>
            @foreach ($user->projects as $project)
                <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}"
                    style="max-width: 200px;">
                <h4>{{ $project->title }}</h4>
                <h6>{{ $project->description }}</h6>
            @endforeach
        </ul>
        <hr>
        <h3>Kontak</h3>
        @foreach ($user->sociallinks as $link)
            <h5>{{ $link->username }}</h5>
            <a href="{{ $link->url }}">
                {{ $link->url }}
            </a>
        @endforeach
    </div>
</body>

</html>
