<x-layouts.app>
    {{-- Loader --}}
    <div id="loader" class="fixed inset-0 bg-white flex flex-col gap-4 items-center justify-center z-[9999]">
        <!-- Spinner -->
        <div class="animate-spin rounded-full h-14 w-14 border-4 border-orange-500 border-t-transparent"></div>

        <!-- Loading Text -->
        <p class="text-orange-500 font-medium text-lg animate-pulse">Loading...</p>
    </div>

    <div class="w-full mx-auto text-center justify-center bg-white min-h-screen">
        <div class="relative flex justify-center">
            <div
                class="relative h-48 w-full bg-[linear-gradient(to_right,#80808012_2px,transparent_1px),linear-gradient(to_bottom,#80808012_1px,transparent_1px)] bg-[size:24px_24px]">
                <div class="absolute inset-x-0 bottom-0 h-[30%] bg-gradient-to-t from-white to-transparent"></div>
            </div>

            <img src="{{ asset('storage/' . $user->profile_photo) }}"
                class="rounded-full w-36 h-36 border absolute -bottom-12 grayscale hover:grayscale-0 transition">
        </div>

        <h1 class="text-3xl font-bold mt-16">{{ $user->name }}</h1>
        <p class="text-gray-600">{{ $user->job }}</p>
        <div class="mt-6">
            <div class="w-full space-y-4 p-4 flex flex-col items-center justify-center">
                @foreach ($user->sociallinks as $link)
                    <a href="{{ Str::startsWith($link->url, ['http://', 'https://']) ? $link->url : 'https://' . $link->url }}"
                        target="_blank"
                        class="w-full max-w-2xl py-2 px-4 flex items-center justify-center text-lg font-bold text-gray-900 border-2 border-gray-700 rounded-full shadow-[1px_4px_0px_0px_rgba(0,0,0,1.00)]">{{ $link->username }}</a>
                @endforeach
            </div>
        </div>
    </div>
</x-layouts.app>
