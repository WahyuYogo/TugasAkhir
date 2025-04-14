<x-layouts.app>
    <div class="">
        <div id="loader" class="fixed inset-0 bg-black flex items-center justify-center z-[9999]">
            <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-orange-500"></div>
        </div>

        <div class="h-1/5" style="background-color: #232323">
            <div
                class="relative flex items-center h-full w-full bg-[linear-gradient(to_right,#80808012_1px,transparent_1px),linear-gradient(to_bottom,#80808012_1px,transparent_1px)] bg-[size:24px_24px]">
                <div class="p-12" data-aos="fade-right">
                    <p class="text-white opacity-50 text-2xl font-bold">A Im</p>
                    <h1 class="text-white text-6xl font-bold">{{ $user->name }}<span
                            class="text-orange-500 text-6xl font-bold">.</span></h1>
                    <a href="#link" class="text-white px-2 bg-orange-500 text-sm">Contact me</a>
                </div>
            </div>
        </div>

        <div class="md:p-12 p-4 h-screen" style="background-color: #1F1F1F">
            <div data-aos="fade-left" class="flex flex-col justify-center items-center">
                <div class="relative max-w-2xl p-10">
                    <div class="absolute inset-0 flex justify-center items-center opacity-5">
                        <span class="text-6xl font-bold text-gray-200">About</span>
                    </div>
                    <h1
                        class="relative text-4xl font-bold text-gray-200 drop-shadow-[1px_1px_4px_rgba(255,255,255,0.8)]">
                        About
                    </h1>
                </div>
                <div class="grid md:grid-cols-12 grid-cols-1 gap-6 px-6 py-4">
                    <div class="md:col-span-4 flex justify-center items-center">
                        <img src="{{ asset('images/test.png') }}" alt="Photo"
                            class="md:w-full md:h-full h-48 w-48 object-cover border border-white md:rounded-sm rounded-full max-w-lg transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">
                    </div>
                    <div class="md:col-span-8">
                        <p class="text-white text-lg font-semibold leading-relaxed text-justify">
                            Hello I am, <Span class="text-orange-400">{{ $user->name }}</Span>
                        </p>
                        <p class="text-white text-md leading-relaxed text-justify">
                            {{ $user->about }}</p>
                    </div>
                </div>
                <hr class="my-4 opacity-25 border-dashed border-orange-500 w-full">
            </div>
            <div data-aos="fade-right" class="flex flex-col justify-center items-center">
                <div class="relative max-w-2xl p-10">
                    <div class="absolute inset-0 flex justify-center items-center opacity-5">
                        <span class="text-6xl font-bold text-gray-200">Experience</span>
                    </div>
                    <h1
                        class="relative text-4xl font-bold text-gray-200 drop-shadow-[1px_1px_4px_rgba(255,255,255,0.8)]">
                        Experience</h1>
                </div>
                <div class="flex flex-wrap justify-center gap-6 px-6 py-4 w-full mb-8">
                    @foreach ($user->skills as $skill)
                        <div
                            class="border border-orange-400 py-2 px-4 text-orange-400 text-center rounded-full hover:bg-orange-400 hover:text-white hover:drop-shadow-[1px_1px_4px_rgba(251,146,60,0.8)]">
                            {{ $skill->name }}</div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="h-full" style="background-color: #232323">
            <div
                class="relative flex flex-col justify-center items-center h-full w-full p-4 bg-[linear-gradient(to_right,#80808012_1px,transparent_1px),linear-gradient(to_bottom,#80808012_1px,transparent_1px)] bg-[size:24px_24px]">
                <div class="relative max-w-2xl p-10">
                    <div class="absolute inset-0 flex justify-center items-center opacity-5">
                        <span class="text-6xl font-bold text-gray-200">Projects</span>
                    </div>
                    <h1
                        class="relative text-4xl font-bold text-gray-200 drop-shadow-[1px_1px_4px_rgba(255,255,255,0.8)]">
                        Projects</h1>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-4 justify-center items-center w-full p-4 text-white gap-4">
                    @foreach ($user->projects as $project)
                        <div x-data="{ showModal: false }" class="relative" data-aos="zoom-in"
                            data-aos-delay="{{ $loop->index * 100 }}">
                            <!-- Card -->
                            <div @click="showModal = true"
                                class="w-full cursor-pointer rounded-lg border border-gray-700 bg-[#1F1F1F] group overflow-hidden transition-shadow hover:shadow-lg">
                                <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}"
                                    class="w-full h-48 object-cover rounded-t-lg transition-transform duration-300 group-hover:scale-105">
                                <div class="p-2">
                                    <h1 class="text-lg font-semibold">{{ $project->title }}</h1>
                                    <p class="text-sm truncate">{{ $project->description }}</p>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div x-show="showModal" x-transition
                                class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-60"
                                style="display: none;">
                                <div class="bg-[#1F1F1F] rounded-lg shadow-xl max-w-lg w-full p-4 relative">
                                    <!-- Close button -->
                                    <button @click.outside="showModal = false"
                                        class="absolute top-2 right-2 text-gray-400 hover:text-white">
                                        ✕
                                    </button>
                                    <!-- Modal content -->
                                    <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}"
                                        class="w-full h-48 object-cover rounded-lg mb-4">
                                    <h2 class="text-xl font-bold mb-2">{{ $project->title }}</h2>
                                    <p class="text-sm text-gray-300">{{ $project->description }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="flex flex-col justify-center items-center md:p-12 p-4" style="background-color: #1F1F1F">
            <div class="relative max-w-2xl p-10">
                <div class="absolute inset-0 flex justify-center items-center opacity-5">
                    <span class="text-6xl font-bold text-gray-200">Contact</span>
                </div>
                <h1 class="relative text-4xl font-bold text-gray-200 drop-shadow-[1px_1px_4px_rgba(255,255,255,0.8)]">
                    Contact</h1>
            </div>
            <div class="flex flex-wrap justify-center gap-6 px-6 py-4 w-full mb-8">
                @foreach ($user->sociallinks as $link)
                    <a href="{{ $link->url }}" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}"
                        class="flex flex-row border hover:border-orange-400 py-2 px-4 text-white text-center rounded-full hover:bg-orange-400 hover:text-white hover:drop-shadow-[1px_1px_4px_rgba(251,146,60,0.8)]"
                        style="background-color: #232323">
                        <img src="https://www.google.com/s2/favicons?domain={{ parse_url($link->url, PHP_URL_HOST) }}&sz=32"
                            class="w-6 h-6 me-2 rounded-full" alt="Icon">
                        {{ $link->platform }}</a>
                @endforeach
            </div>
        </div>

        <footer class="text-gray-300 py-6" style="background-color: #232323">
            <div class="max-w-6xl mx-auto px-4 flex flex-col md:flex-row items-center justify-between gap-4">
                <p class="text-sm">&copy; {{ date('Y') }}. All rights reserved.</p>
                <div class="flex space-x-4">
                    @guest
                        <a href="{{ route('login') }}"
                            class="px-4 py-1 bg-orange-400 text-white text-sm rounded hover:bg-orange-500 transition">
                            Login
                        </a>
                    @endguest

                    @auth
                        <a href="{{ route('dashboard') }}"
                            class="px-4 py-1 bg-orange-400 text-white text-sm rounded hover:bg-orange-500 transition">
                            Dashboard
                        </a>
                    @endauth
                </div>
            </div>
        </footer>

    </div>
</x-layouts.app>
