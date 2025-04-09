<x-layouts.app>
    <div class="flex min-h-screen justify-center items-center mx-auto max-w-2xl">
        <div class="flex flex-col items-center w-full gap-3">
            <img class="w-32 h-32 rounded-full border border-gray-300" src="https://placehold.co/128x128" alt="Profile Picture">
            <div class="text-center">
                <h2 class="text-2xl font-bold text-gray-900">{{ $user->name }}</h2>
                <p class="text-gray-500">{{ $user->role }}</p>
            </div>
            <div class="w-full space-y-2 p-4">
                @foreach ($user->sociallinks as $link)
                    <a href="{{ $link->url }}" class="w-full flex items-center justify-center py-2 px-4 text-lg font-medium text-gray-900 border-2 hover:shadow-md border-gray-700 hover:border-gray-400 rounded-full"><img src="https://www.google.com/s2/favicons?domain={{ parse_url($link->url, PHP_URL_HOST) }}&sz=32"
                        class="w-6 h-6 me-2" alt="Icon">{{ $link->platform }}</a>
                @endforeach
            </div>
        </div>
    </div>
    
</x-layouts.app>
