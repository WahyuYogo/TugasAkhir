<x-layouts.header>
    <div class="relative flex flex-col items-center justify-end bg-white min-h-screen">
        <!-- Judul -->
        <h1 class="text-4xl font-bold text-center">Buat Halaman Pribadi Anda.</h1>
        <p class="text-gray-600 text-center mt-2">Bergabunglah bersama kami, dan buat halaman pribadi anda secara gratis.
        </p>

        <!-- Tombol -->
        <div class="mt-8">
            <a href="/login" class="px-6 py-2 border border-black text-black rounded-full hover:bg-gray-200">Gabung
                Sekarang</a>
            <p class="text-sm text-center text-gray-500 mt-2"><a href="" class="underline">Log In</a></p>
        </div>

        <!-- Gambar -->
        <div class="relative flex flex-row items-end mt-10 gap-4 z-10">
            <img class="max-w-[300px] h-auto object-contain border-t border-l border-r border-gray-200 rounded-xl"
                src="{{ asset('images/pc02.jpg') }}" alt="">
            <img class="max-w-[300px] h-auto object-contain border-t border-l border-r border-gray-200 rounded-xl"
                src="{{ asset('images/pc01.jpg') }}" alt="">
            <img class="max-w-[300px] h-auto object-contain border-t border-l border-r border-gray-200 rounded-xl"
                src="{{ asset('images/pc03.jpg') }}" alt="">

            <!-- Gradient Overlay -->
            <div class="absolute bottom-0 left-0 w-full h-80 bg-gradient-to-t from-white to-transparent"></div>
        </div>
    </div>

    <div class="flex flex-col items-center justify-center mx-auto p-4">
        <!-- Section Dukungan -->
        <div class="text-center mt-10">
            <h3 class="font-semibold text-gray-600">Didukung Oleh:</h3>
            <div class="flex justify-center gap-4 mt-3">
                <div class="w-20 h-6 bg-gray-300 rounded"></div>
                <div class="w-20 h-6 bg-gray-300 rounded"></div>
                <div class="w-20 h-6 bg-gray-300 rounded"></div>
            </div>
        </div>

        <!-- Section Pilih Template -->
        <div class="text-center mt-10">
            <h3 class="font-semibold text-gray-600">Template</h3>
            <h2 class="text-2xl font-bold">Pilih Template Favoritmu</h2>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-4 mt-6 p-4">
                @foreach ($templates as $template)
                    <a href="">
                        <img class="rounded-xl border border-gray-300 transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0"
                            src="{{ asset('images/' . $template->preview_image) }}" alt="{{ $template->name }}">
                        <h1 class="font-semibold text-start mt-3">{{ $template->name }}</h1>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    </div>
</x-layouts.header>
