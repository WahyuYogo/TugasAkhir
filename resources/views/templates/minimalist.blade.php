<x-layouts.app>
    <h1>Minimals</h1>
    {{-- <div class="max-w-3xl mx-auto p-6">
        <div class="text-center">
            <img src="{{ asset('images/profile.jpg') }}" class="rounded-full w-32 h-32 mx-auto">
            <h1 class="text-3xl font-bold mt-4">{{ $user->name }}</h1>
            <p class="text-gray-600">{{ $user->role }}</p>
        </div>

        <div class="mt-6">
            <h2 class="text-xl font-semibold">About Me</h2>
            <p class="text-gray-700 mt-2">{{ $user->about_me }}</p>
        </div>

        <div class="mt-6">
            <h2 class="text-xl font-semibold">Skills</h2>
            <div class="flex flex-wrap gap-2 mt-2">
                @foreach ($user->skills as $skill)
                    <span class="bg-blue-500 text-white px-3 py-1 rounded-lg">{{ $skill }}</span>
                @endforeach
            </div>
        </div>

        <div class="mt-6">
            <h2 class="text-xl font-semibold">Projects</h2>
            <div class="mt-2 space-y-4">
                @foreach ($user->projects as $project)
                    <div class="p-4 border rounded-lg shadow-md">
                        <h3 class="font-semibold text-lg">{{ $project->name }}</h3>
                        <p class="text-gray-700">{{ $project->description }}</p>
                        <a href="{{ $project->url }}" class="text-blue-600">View Project</a>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mt-6 text-center">
            <h2 class="text-xl font-semibold">Follow Me</h2>
            <div class="flex justify-center gap-4 mt-2">
                @foreach ($user->social_links as $link)
                    <a href="{{ $link->url }}" class="text-blue-500 hover:underline">{{ $link->platform }}</a>
                @endforeach
            </div>
        </div>
    </div> --}}
</x-layouts.app>
