<x-layouts.app>
    <div class="">
        <div class="h-1/5" style="background-color: #232323">
            <div
                class="relative flex items-center h-full w-full bg-[linear-gradient(to_right,#80808012_1px,transparent_1px),linear-gradient(to_bottom,#80808012_1px,transparent_1px)] bg-[size:24px_24px]">
                <div class="p-12">
                    <p class="text-white opacity-50 text-2xl font-bold">A Im</p>
                    <h1 class="text-white text-6xl font-bold">{{ $user->name }}<span
                            class="text-orange-500 text-6xl font-bold">.</span></h1>
                    <a href="#link" class="text-white px-2 bg-orange-500 text-sm">Contact me</a>
                </div>
            </div>
        </div>

        <div class="flex flex-col justify-center items-center md:p-12 p-4 h-screen" style="background-color: #1F1F1F">
            <div class="relative max-w-2xl p-10">
                <div class="absolute inset-0 flex justify-center items-center opacity-5">
                    <span class="text-6xl font-bold text-gray-200">About</span>
                </div>
                <h1 class="relative text-4xl font-bold text-gray-200 drop-shadow-[1px_1px_4px_rgba(255,255,255,0.8)]">
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
            <div class="relative max-w-2xl p-10">
                <div class="absolute inset-0 flex justify-center items-center opacity-5">
                    <span class="text-6xl font-bold text-gray-200">Experience</span>
                </div>
                <h1 class="relative text-4xl font-bold text-gray-200 drop-shadow-[1px_1px_4px_rgba(255,255,255,0.8)]">
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
                        <div
                            class="w-full rounded-lg border border-gray-700 bg-[#1F1F1F] group overflow-hidden transition-shadow hover:shadow-lg">
                            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}"
                                class="w-full h-48 object-cover rounded-t-lg transition-transform duration-300 group-hover:scale-105">
                            <div class="p-2">
                                <h1 class="text-lg font-semibold">{{ $project->title }}</h1>
                                <p class="text-sm">{{ $project->description }}</p>
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
                    <a href="{{ $link->url }}"
                        class="flex flex-row border hover:border-orange-400 py-2 px-4 text-white text-center rounded-full hover:bg-orange-400 hover:text-white hover:drop-shadow-[1px_1px_4px_rgba(251,146,60,0.8)]"
                        style="background-color: #232323">
                        <img src="https://www.google.com/s2/favicons?domain={{ parse_url($link->url, PHP_URL_HOST) }}&sz=32"
                            class="w-6 h-6 me-2 rounded-full" alt="Icon">
                        {{ $link->platform }}</a>
                @endforeach
            </div>
        </div>
    </div>
</x-layouts.app>
