<x-layouts.app>
    {{-- Loader --}}
    <div id="loader" class="fixed inset-0 bg-white flex flex-col gap-4 items-center justify-center z-[9999]">
        <!-- Spinner -->
        <div class="animate-spin rounded-full h-14 w-14 border-4 border-orange-500 border-t-transparent"></div>

        <!-- Loading Text -->
        <p class="text-orange-500 font-medium text-lg animate-pulse">Loading...</p>
    </div>

    <div class="hidden md:flex items-center justify-center min-h-screen text-center">
        <h1 class="text-2xl font-bold text-gray-600">Halaman ini hanya untuk mobile view</h1>
    </div>

    <div class="md:hidden px-10">
        <div class="w-full mx-auto my-4 text-start space-y-4">
            <!-- Foto Profil -->
            <div class="flex justify-start">
                <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="Profile"
                    class="w-24 h-24 rounded-full object-cover">
            </div>

            <!-- Nama dan Deskripsi -->
            <h1 class="text-2xl font-bold text-gray-900">{{ $user->name }}</h1>
            <p class="text-gray-700 font-medium">{{ $user->about }}
            </p>
        </div>


        <div x-data="{ showModal: false, modalImage: '', modalTitle: '', modalDescription: '' }">
            {{-- Galeri --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 my-4">
                @foreach ($user->projects as $project)
                    <div class="relative w-full pb-[125%] group overflow-hidden rounded-lg cursor-pointer"
                        @click="showModal = true; modalImage = '{{ asset('storage/' . $project->image) }}'; modalTitle = '{{ $project->title }}'; modalDescription = '{{ $project->description }}'">

                        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}"
                            class="absolute inset-0 w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">

                        <!-- Overlay -->
                        <div
                            class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-center items-center text-center text-white p-4">
                            <h3 class="text-lg font-bold">{{ $project->title }}</h3>
                            <p class="text-sm mt-2">{{ $project->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Modal --}}
            <div x-show="showModal" class="fixed inset-0 bg-black/70 flex items-center justify-center z-50 p-4"
                x-transition @click.self="showModal = false">
                <div class="bg-white rounded-lg overflow-hidden max-w-xl w-full shadow-lg">
                    <img :src="modalImage" alt="" class="w-full object-cover max-h-[600px]">
                    <div class="p-4">
                        <h3 class="text-xl font-bold text-gray-800" x-text="modalTitle"></h3>
                        <p class="text-gray-600 mt-2" x-text="modalDescription"></p>
                        <button class="mt-4 px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-600"
                            @click="showModal = false">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

        <hr class="w-full border-t border-gray-300">

        <div class="grid grid-cols-2 gap-4 mb-10 mt-4">
            @foreach ($user->sociallinks as $link)
                <a href="{{ Str::startsWith($link->url, ['http://', 'https://']) ? $link->url : 'https://' . $link->url }}"
                    target="_blank"
                    class="w-full text-center font-semibold text-gray-600 border border-gray-300 px-4 py-2 rounded-lg"
                    data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    {{ $link->username }}
                </a>
            @endforeach
        </div>
        <footer class="py-6 text-gray-800 border-t">
            <div class="max-w-6xl mx-auto flex flex-col md:flex-row justify-between items-center px-4 gap-4">
                <p class="text-sm">&copy; {{ date('Y') }}. All rights reserved.</p>
                <div class="flex gap-4">
                    @guest
                        <a href="{{ route('login') }}"
                            class="bg-orange-400 px-4 py-1 text-sm rounded text-white hover:bg-orange-500">Login</a>
                    @endguest
                    @auth
                        <a href="{{ route('dashboard') }}"
                            class="bg-orange-400 px-4 py-1 text-sm rounded text-white hover:bg-orange-500">Dashboard</a>
                    @endauth
                </div>
            </div>
        </footer>
    </div>

</x-layouts.app>
