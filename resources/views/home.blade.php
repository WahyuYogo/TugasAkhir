<x-layouts.header>
    <div class="container mx-auto px-4 py-6">
        <!-- Header Profil -->
        <div class="flex items-center">
            {{-- <img src="{{ asset('images/profile.jpg') }}" alt="Foto Profil" class="w-24 h-24 rounded-full object-cover"> --}}
            <div class="ml-4">
                <h1 class="text-3xl font-bold">John Doe</h1>
                <p class="text-gray-600">Saya adalah seorang web developer berpengalaman dengan fokus pada Laravel,
                    Livewire, dan Tailwind CSS.</p>
            </div>
        </div>

        <!-- Roles -->
        <div class="mt-6">
            <h2 class="text-2xl font-semibold mb-2">Roles</h2>
            <div class="flex flex-wrap gap-2">
                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">Full Stack Developer</span>
                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">UI/UX Designer</span>
            </div>
        </div>

        <!-- Skills -->
        <div class="mt-6">
            <h2 class="text-2xl font-semibold mb-2">Skills</h2>
            <div class="flex flex-wrap gap-2">
                <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">Laravel</span>
                <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">Livewire</span>
                <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">Tailwind CSS</span>
            </div>
        </div>

        <!-- Social Links -->
        <div class="mt-6">
            <h2 class="text-2xl font-semibold mb-2">Social Links</h2>
            <div class="flex space-x-4">
                <a href="https://linkedin.com/in/johndoe" target="_blank"
                    class="text-blue-500 hover:underline">LinkedIn</a>
                <a href="https://twitter.com/johndoe" target="_blank" class="text-blue-500 hover:underline">Twitter</a>
            </div>
        </div>

        <!-- Projects -->
        <div class="mt-10">
            <h2 class="text-2xl font-semibold mb-4">Projects</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Project 1 -->
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <img src="{{ asset('images/project1.jpg') }}" alt="Project 1" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-xl font-bold">Project Satu</h3>
                        <p class="text-gray-600 mt-2">Deskripsi singkat tentang project pertama ini.</p>
                    </div>
                </div>
                <!-- Project 2 -->
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <img src="{{ asset('images/project2.jpg') }}" alt="Project 2" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-xl font-bold">Project Dua</h3>
                        <p class="text-gray-600 mt-2">Deskripsi singkat tentang project kedua ini.</p>
                    </div>
                </div>
                <!-- Project 3 -->
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <img src="{{ asset('images/project3.jpg') }}" alt="Project 3" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-xl font-bold">Project Tiga</h3>
                        <p class="text-gray-600 mt-2">Deskripsi singkat tentang project ketiga ini.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.header>
