<x-layouts.app>
    {{-- Loader --}}
    <div id="loader" class="fixed inset-0 bg-white flex flex-col gap-4 items-center justify-center z-[9999]">
        <!-- Spinner -->
        <div class="animate-spin rounded-full h-14 w-14 border-4 border-orange-500 border-t-transparent"></div>

        <!-- Loading Text -->
        <p class="text-orange-500 font-medium text-lg animate-pulse">Loading...</p>
    </div>

    <section id="home" class="pt-16 hidden md:flex justify-center items-center">
        <div class="container mx-auto flex flex-col lg:flex-row gap-10">
            <!-- Deskripsi Profil -->
            <div class="lg:w-5/12 lg:order-1 order-2 flex flex-col justify-center text-right">
                <p class="hidden md:block font-semibold mb-1">{{ $user->job }}</p>
                <h2 class="text-4xl font-bold">{{ $user->name }}</h2>
                <p class="text-gray-700 mt-4">
                    {{ $user->about }}
                </p>
                <p class="mt-6">
                    <a href="#project"
                        class="text-orange-600 font-medium inline-flex items-center gap-2 hover:underline">
                        My Project <i class="bi bi-arrow-down-right"></i>
                    </a>
                </p>
            </div>

            <!-- Gambar Profil dan Icon -->
            <div class="lg:w-6/12 lg:order-2 order-1 flex flex-col gap-4">
                <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="Profile Image"
                    class="rounded-lg shadow w-full max-h-48 object-cover">
                <div class="flex items-center gap-4">
                    <i class="bi bi-heart text-2xl font-bold"></i>
                    <i class="bi bi-send text-2xl font-bold text-gray-800"></i>
                    <i class="bi bi-bookmark ms-auto text-2xl font-bold text-gray-800"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- Mobile Version -->
    <section class="md:hidden pt-4 pb-4">
        <div class="container mx-auto">
            <p class="text-xl font-semibold text-center">{{ $user->name }}</p>
            <div class="grid grid-cols-4 gap-4 items-center my-4">
                <div class="col-span-1 flex justify-center">
                    <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="" class="rounded-full w-20">
                </div>
                <div class="text-center text-sm">5 Postingan</div>
                <div class="text-center text-sm">0 Pengikut</div>
                <div class="text-center text-sm">5 Mengikuti</div>
            </div>
            <p class="text-sm text-gray-700 text-justify">
                <span class="font-bold">Seorang front-end developer</span> dengan passion yang mendalam terhadap desain
                yang elegan dan fungsionalitas yang efisien. Dengan pengalaman dalam berbagai proyek web, saya selalu
                berusaha menciptakan antarmuka pengguna yang intuitif dan responsif.
            </p>
        </div>
    </section>

</x-layouts.app>
