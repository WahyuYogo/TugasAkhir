<x-layouts.header>
    <div class="relative flex flex-col items-center justify-end bg-white" style="height: 80vh;">
        <!-- Judul -->
        <h1 class="text-4xl font-bold text-center">Buat Halaman Pribadi Anda.</h1>
        <p class="text-gray-600 text-center mt-2">Bergabunglah bersama kami, dan buat halaman pribadi anda secara gratis.
        </p>

        <!-- Tombol -->
        <div class="mt-8">
            <a href="/register" class="px-6 py-2 border border-black text-black rounded-full hover:bg-gray-200">Gabung
                Sekarang</a>
            <p class="text-sm text-center text-gray-500 mt-2"><a href="/login" class="underline">Log In</a></p>
        </div>

        <!-- Gambar -->
        <div class="relative flex flex-row items-end mt-10 gap-4 z-10 overflow-x-auto">
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
                    <a href="/register">
                        <img class="rounded-xl border border-gray-300 transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0"
                            src="{{ asset('images/' . $template->preview_image) }}" alt="{{ $template->name }}">
                        <h1 class="font-semibold text-start mt-3">{{ $template->name }}</h1>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <div class="min-h-screen bg-white grid grid-cols-3 md:grid-cols-4 gap-6 px-4 py-10">
        @foreach ($user as $card)
            <div
                class="grid grid-cols-1 md:grid-cols-[auto,1fr] bg-gray-100 rounded-xl overflow-hidden shadow-md w-full">
                <!-- Foto -->
                <img src="{{ asset('storage/' . $card->profile_photo) }}" alt="Foto Profil" class=" w-20 h-full">

                <!-- Konten -->
                <div class="p-5 flex flex-col justify-between">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">{{ $card->name }}</h2>
                        <p class="text-base text-gray-700">{{ $card->job }}</p>
                        <hr class="my-2 border-gray-400">
                        <p class="text-sm text-gray-800 line-clamp-3">
                            {{ $card->about }}
                        </p>
                    </div>
                    <div class="mt-4 flex justify-end">
                        <a href="#"
                            class="bg-white px-5 py-2 rounded-md text-sm font-medium text-gray-800 hover:bg-gray-200 transition">
                            See
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>



</x-layouts.header>
