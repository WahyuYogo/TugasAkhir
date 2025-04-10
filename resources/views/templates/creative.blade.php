<x-layouts.app>
    <div class="w-full mx-auto text-center bg-white">
        <div class="relative">
            <div
                class="relative h-48 w-full bg-[linear-gradient(to_right,#80808012_1px,transparent_1px),linear-gradient(to_bottom,#80808012_1px,transparent_1px)] bg-[size:24px_24px]">
                <div class="absolute inset-x-0 bottom-0 h-[30%] bg-gradient-to-t from-white to-transparent"></div>
            </div>

            <img src="{{ asset('storage/' . $user->profile_photo) }}"
                class="rounded-full w-24 h-24 absolute -bottom-12 left-1/2 transform -translate-x-1/2">
        </div>

        <h1 class="text-3xl font-bold mt-16">{{ $user->name }}</h1>
        <p class="text-gray-600">{{ $user->job }}</p>

        <div class="mt-6">
            <h2 class="text-xl font-semibold">About Me</h2>
            <p class="text-gray-700 mt-2">{{ $user->about }}</p>
        </div>

        <div class="mt-6">
            <h2 class="text-xl font-semibold">Experience</h2>
            <div class="flex justify-center gap-2 mt-2">
                @foreach ($user->skills as $skill)
                    <span class="bg-green-500 text-white px-3 py-1 rounded-lg">{{ $skill->name }}</span>
                @endforeach
            </div>
        </div>

        <div class="mt-6 md:px-12 p-4">
            <h2 class="text-xl font-semibold">Projects</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                @foreach ($user->projects as $project)
                    <div class="p-4 border rounded-lg shadow-md bg-white">
                        <img src="{{ asset('storage/' . $project->image) }}" alt="Project Image"
                            class="w-full h-48 object-cover rounded-md">
                        <h3 class="font-semibold text-lg">{{ $project->title }}</h3>
                        <p class="text-gray-700">{{ $project->description }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mt-6  md:px-12 p-4">
            <h2 class="text-xl font-semibold">Follow Me</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-2 mt-4">
                @foreach ($user->sociallinks as $link)
                    <a href="{{ $link->url }}"
                        class="w-full flex items-center justify-center py-2 px-4 text-md font-medium text-gray-900 border hover:shadow-md border-gray-700 hover:border-gray-400 rounded-lg"><img
                            src="https://www.google.com/s2/favicons?domain={{ parse_url($link->url, PHP_URL_HOST) }}&sz=32"
                            class="w-6 h-6 me-2" alt="Icon">{{ $link->platform }}</a>
                @endforeach
            </div>
        </div>
    </div>
</x-layouts.app>
