<x-layouts.app>
    <div class="md:flex">
        <div class="hidden sm:block md:w-3/5">
            <div class="flex flex-col justify-center text-white p-12 h-screen bg-gradient-to-br from-yellow-500 to-orange-400">
                <h1 class="text-5xl font-black mb-3">Build. Share. Inspire.</h1>
                <p class="text-base">Easily create and showcase your Link in just a few steps.</p>
            </div>
        </div>
        <div class="flex items-center justify-center h-screen md:w-2/5 bg-white border-l border-gray-200">
            @livewire('auth.login')
        </div>
    </div>
</x-layouts.app>
