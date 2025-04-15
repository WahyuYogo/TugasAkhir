<x-layouts.app>
    <div class="bg-gray-100 py-12">
        <div class="max-w-4xl mx-auto bg-white p-6 shadow-md rounded-lg">
            <div class="flex items-center">
                <img src="{{ asset('images/profile.jpg') }}" class="rounded-full w-24 h-24">
                <div class="ml-6">
                    <h1 class="text-3xl font-bold">{{ $user->name }}</h1>
                    <p class="text-gray-600">{{ $user->role }}</p>
                </div>
            </div>

            <div class="mt-6">
                <h2 class="text-2xl font-semibold">About Me</h2>
                <p class="text-gray-700 mt-2">{{ $user->about_me }}</p>
            </div>

            <div class="mt-6 grid grid-cols-2 gap-4">
                <div>
                    <h2 class="text-xl font-semibold">Skills</h2>
                    <ul class="list-disc list-inside mt-2 text-gray-700">
                        @foreach ($user->skills as $skill)
                            <li>{{ $skill }}</li>
                        @endforeach
                    </ul>
                </div>

                <div>
                    <h2 class="text-xl font-semibold">Projects</h2>
                    <ul class="list-disc list-inside mt-2 text-gray-700">
                        @foreach ($user->projects as $project)
                            <li>
                                <a href="{{ $project->url }}" class="text-blue-600">{{ $project->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="mt-6">
                <h2 class="text-xl font-semibold">Follow Me</h2>
                <div class="flex gap-4 mt-2">
                    @foreach ($user->social_links as $link)
                        <a href="{{ $link->url }}" class="text-blue-500 hover:underline">{{ $link->platform }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>