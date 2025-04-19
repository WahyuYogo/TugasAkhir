<x-layouts.header>
    <div class="max-w-4xl mx-auto px-6 py-12">
        <h1 class="text-3xl font-bold text-gray-900 mb-6">Tentang Kami</h1>

        <p class="text-gray-700 leading-relaxed mb-4">
            Selamat datang di <strong>VisuaLink</strong> — platform pembuatan portofolio online yang dirancang khusus
            untuk membantu kamu menampilkan karya, keterampilan, dan pengalaman secara profesional.
        </p>

        <p class="text-gray-700 leading-relaxed mb-4">
            Di era digital saat ini, portofolio bukan hanya untuk desainer atau developer saja — siapa pun yang ingin
            menunjukkan kualitas dan pencapaiannya membutuhkan tempat yang tepat untuk menampilkannya.
        </p>

        <p class="text-gray-700 leading-relaxed mb-4">
            Dengan <strong>VisuaLink</strong>, kamu dapat dengan mudah:
        </p>

        <ul class="list-disc pl-6 text-gray-700 mb-4">
            <li>Membuat akun dan memilih template portofolio sesuai gayamu</li>
            <li>Mengatur URL unik yang bisa kamu bagikan ke siapa saja</li>
            <li>Menambahkan deskripsi diri, skill, proyek, dan tautan sosial media</li>
            <li>Mengelola dan memperbarui portofolio kamu kapan saja</li>
        </ul>

        <p class="text-gray-700 leading-relaxed mb-4">
            Kami percaya setiap orang punya cerita, dan kami ingin membantu kamu menyampaikannya dengan cara terbaik.
            Jadikan portofoliomu bukan hanya sekadar tampilan, tapi representasi profesional dirimu.
        </p>

        <p class="text-gray-700 leading-relaxed">
            Terima kasih telah menggunakan <strong>VisuaLink</strong>. Kami sangat senang bisa menjadi bagian dari
            perjalananmu.
        </p>
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
</x-layouts.header>
