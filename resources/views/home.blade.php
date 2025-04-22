<x-layouts.header>
    <div class="relative flex flex-col items-center justify-end bg-white md:min-h-screen">
        <!-- Judul -->
        <div class="px-6">
            <h1 class="text-4xl font-bold text-center mt-20">Buat Halaman Pribadi Anda.</h1>
            <p class="text-gray-600 text-center mt-2">Bergabunglah bersama kami, dan buat halaman pribadi anda secara
                gratis.
            </p>
        </div>

        <!-- Tombol -->
        <div class="mt-8" data-aos="fade-up">
            <a href="/register" class="px-6 py-2 border border-black text-black rounded-full hover:bg-gray-200">Gabung
                Sekarang</a>
            <p class="text-sm text-center text-gray-500 mt-4"><a href="/login" class="underline">Log In</a></p>
        </div>

        <!-- Gambar -->
        <div class="relative flex flex-row items-end mt-10 gap-4 z-10 overflow-x-auto" data-aos="fade-up">
            <img class="hidden md:block min-w-[250px] max-w-[300px] h-auto object-contain border border-gray-200 rounded-xl"
                src="{{ asset('images/pc02.jpg') }}" alt="">
            <img class="min-w-[250px] max-w-[300px] h-auto object-contain border border-gray-200 rounded-xl"
                src="{{ asset('images/pc01.jpg') }}" alt="">
            <img class="hidden md:block min-w-[250px] max-w-[300px] h-auto object-contain border border-gray-200 rounded-xl"
                src="{{ asset('images/pc03.jpg') }}" alt="">

            <!-- Gradient Overlay -->
            <div class="absolute bottom-0 left-0 w-full h-80 bg-gradient-to-t from-white to-transparent"></div>
        </div>
    </div>

    <div class="flex flex-col items-center justify-center mx-auto p-4">
        {{-- <!-- Section Dukungan -->
        <div class="text-center mt-10">
            <h3 class="font-semibold text-gray-600">Didukung Oleh:</h3>
            <div class="flex justify-center gap-4 mt-3">
                <div class="w-20 h-6 bg-gray-300 rounded"></div>
                <div class="w-20 h-6 bg-gray-300 rounded"></div>
                <div class="w-20 h-6 bg-gray-300 rounded"></div>
            </div>
        </div> --}}

        <!-- Section Pilih Template -->
        <div class="text-center mt-10">
            <h3 class="font-semibold text-gray-600">Template</h3>
            <h2 class="text-2xl font-bold">Pilih Template Favoritmu</h2>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-4 mt-6 p-4">
                @foreach ($templates as $template)
                    <a href="/register" data-aos="zoom-in">
                        <img class="rounded-xl border border-gray-300 transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0"
                            src="{{ asset('images/' . $template->preview_image) }}" alt="{{ $template->name }}">
                        <h1 class="font-semibold text-start mt-3">{{ $template->name }}</h1>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <div class="bg-white px-4 py-10 flex justify-center">
        <div class="bg-gray-50 border border-gray-200 rounded-lg p-8 md:p-12 mb-8 container">
            <span
                class="bg-zinc-300 text-zinc-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md mb-2">
                🚀 Bergabung Sekarang
            </span>
            <h1 class="text-gray-900 text-3xl md:text-5xl font-extrabold mb-2">
                Bangun Page Mu Sendiri Dalam Hitungan Menit
            </h1>
            <p class="text-lg font-normal text-gray-600 mb-6">
                Tunjukkan siapa kamu dan karya terbaikmu ke dunia dengan mudah. Website ini membantumu membuat
                page yang modern, responsif, dan siap dibagikan ke siapa saja — tanpa perlu skill coding!
            </p>
            <a href="/register"
                class="inline-flex justify-center items-center py-2.5 px-5 text-base font-medium text-white rounded-lg bg-zinc-900 hover:bg-zinc-800 focus:ring-4 focus:ring-zinc-300">
                Mulai Sekarang
                <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </a>
        </div>

    </div>
    <div class="flex flex-col justify-center bg-white">
        <div class="container pb-20 mx-auto">
            <h3 class="font-semibold text-gray-600 text-center">Explore</h3>
            <h2 class="text-2xl font-bold text-center mb-8">Jelajahi Page Pengguna Lain</h2>

            <div class="flex flex-row justify-center gap-6">
                @foreach ($user->take(6) as $index => $card)
                    @if ($card->profile_photo)
                        <a data-popover-target="popover-{{ $index }}" href="{{ $card->slug }}"
                            class="relative inline-block">
                            <img class="w-10 h-10 rounded-full" src="{{ asset('storage/' . $card->profile_photo) }}"
                                alt="{{ $card->name }} avatar">

                            <div data-popover id="popover-{{ $index }}" role="tooltip"
                                class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xs opacity-0">
                                <div class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg">
                                    <h3 class="font-semibold text-gray-900">{{ $card->name }}</h3>
                                </div>
                                <div class="px-3 py-2">
                                    <p>{{ $card->about }}</p>
                                </div>
                                <div data-popper-arrow></div>
                            </div>
                        </a>
                    @endif
                @endforeach


            </div>
        </div>
        <footer class=" border-t-2 rounded-lg m-4">
            <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
                <span class="text-sm text-gray-500 sm:text-center">
                    © {{ date('Y') }} <a href="{{ url('/') }}"
                        class="hover:underline font-semibold text-orange-500">VisuaLink</a>. Semua hak dilindungi.
                </span>
                <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 sm:mt-0">
                    <li>
                        <a href="#about" class="hover:underline me-4 md:me-6">Tentang</a>
                    </li>
                    <li>
                        <a href="#project" class="hover:underline me-4 md:me-6">Proyek</a>
                    </li>
                    <li>
                        <a href="#contact" class="hover:underline me-4 md:me-6">Kontak</a>
                    </li>
                    <li>
                        <a href="{{ route('login') }}" class="hover:underline">Masuk</a>
                    </li>
                </ul>
            </div>
        </footer>
    </div>
</x-layouts.header>
