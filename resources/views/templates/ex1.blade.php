<x-layouts.app>
    {{-- Loader --}}
    <div id="loader" class="fixed inset-0 bg-black flex items-center justify-center z-[9999]">
        <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-orange-500"></div>
    </div>

    {{-- Hero Section --}}
    <section class="bg-[#232323]">
        <div class="max-w-6xl py-20 px-6 md:px-12 mx-auto relative flex items-center h-full w-full bg-[linear-gradient(to_right,#80808012_1px,transparent_1px),linear-gradient(to_bottom,#80808012_1px,transparent_1px)] bg-[size:24px_24px]">
            <div class="text-white" data-aos="fade-right">
                <p class="text-2xl opacity-50 font-bold">I'm a</p>
                <h1 class="text-5xl md:text-6xl font-bold">{{ $user->job }}<span class="text-orange-500">.</span></h1>
                <a href="#link" class="inline-block bg-orange-500 text-sm px-2 py-1 text-white">Contact me</a>
            </div>
        </div>
    </section>

    {{-- About Section --}}
    <section class="bg-[#1F1F1F] py-20 px-6 md:px-12">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12 relative" data-aos="fade-left">
                <div class="absolute inset-0 flex justify-center items-center opacity-5">
                    <span class="text-6xl font-bold text-gray-200">About</span>
                </div>
                <h2 class="text-4xl font-bold text-gray-200 relative z-10">About</h2>
            </div>

            <div class="grid md:grid-cols-12 gap-10 items-center">
                <div class="md:col-span-4 flex justify-center">
                    <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="Profile"
                        class="w-48 h-48 md:w-full md:h-full object-cover border border-white rounded-full md:rounded-sm grayscale hover:grayscale-0 transition">
                </div>
                <div class="md:col-span-8 space-y-4 text-white">
                    <p class="text-lg font-semibold text-justify">
                        Hello I am, <span class="text-orange-400">{{ $user->name }}</span>
                    </p>
                    <p class="text-md text-justify">{{ $user->about }}</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Skills / Experience --}}
    <section class="bg-[#1F1F1F] pb-20 px-6 md:px-12">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12 relative" data-aos="fade-right">
                <div class="absolute inset-0 flex justify-center items-center opacity-5">
                    <span class="text-6xl font-bold text-gray-200">Experience</span>
                </div>
                <h2 class="text-4xl font-bold text-gray-200 relative z-10">Experience</h2>
            </div>

            <div class="flex flex-wrap gap-4 justify-center">
                @foreach ($user->skills as $skill)
                    <span class="border border-orange-400 px-4 py-2 rounded-full text-orange-400 hover:bg-orange-400 hover:text-white transition">
                        {{ $skill->name }}
                    </span>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Projects --}}
    <section class="bg-[#232323]">
        <div class="max-w-6xl py-20 px-6 md:px-12 mx-auto flex flex-col items-center justify-center w-full bg-[linear-gradient(to_right,#80808012_1px,transparent_1px),linear-gradient(to_bottom,#80808012_1px,transparent_1px)] bg-[size:24px_24px]">
            
            <!-- Judul Section -->
            <div class="text-center mb-12 relative">
                <div class="absolute inset-0 flex justify-center items-center opacity-5">
                    <span class="text-6xl font-bold text-gray-200">Projects</span>
                </div>
                <h2 class="text-4xl font-bold text-gray-200 relative z-10">Projects</h2>
            </div>
    
            <!-- Grid Card -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 w-full">
                @foreach ($user->projects as $project)
                    <div data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="cursor-pointer rounded-lg border border-gray-700 bg-[#1F1F1F] group overflow-hidden transition-shadow hover:shadow-lg">
                            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}"
                                class="w-full h-48 object-cover rounded-t-lg transition-transform duration-300 group-hover:scale-105">
                            <div class="p-4">
                                <h1 class="text-lg font-semibold text-white">{{ $project->title }}</h1>
                                <p class="text-sm text-gray-400 leading-relaxed mt-2 truncate">
                                    {{ $project->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    
    
    

    {{-- Contact --}}
    <section id="link" class="bg-[#1F1F1F] py-20 px-6 md:px-12">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12 relative">
                <div class="absolute inset-0 flex justify-center items-center opacity-5">
                    <span class="text-6xl font-bold text-gray-200">Contact</span>
                </div>
                <h2 class="text-4xl font-bold text-gray-200 relative z-10">Contact</h2>
            </div>

            <div class="flex flex-wrap justify-center gap-4">
                @foreach ($user->sociallinks as $link)
                    <a href="{{ $link->url }}" class="flex items-center bg-[#232323] border hover:border-orange-400 text-white px-4 py-2 rounded-full hover:bg-orange-400 hover:text-white transition"
                        data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <img src="https://www.google.com/s2/favicons?domain={{ parse_url($link->url, PHP_URL_HOST) }}&sz=32"
                            alt="Icon" class="w-6 h-6 me-2 rounded-full">
                        {{ $link->platform }}
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="bg-[#232323] py-6 text-gray-300">
        <div class="max-w-6xl mx-auto flex flex-col md:flex-row justify-between items-center px-4 gap-4">
            <p class="text-sm">&copy; {{ date('Y') }}. All rights reserved.</p>
            <div class="flex gap-4">
                @guest
                    <a href="{{ route('login') }}" class="bg-orange-400 px-4 py-1 text-sm rounded text-white hover:bg-orange-500">Login</a>
                @endguest
                @auth
                    <a href="{{ route('dashboard') }}" class="bg-orange-400 px-4 py-1 text-sm rounded text-white hover:bg-orange-500">Dashboard</a>
                @endauth
            </div>
        </div>
    </footer>
</x-layouts.app>
