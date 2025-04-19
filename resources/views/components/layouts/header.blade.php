<x-layouts.app>
    <nav class="bg-zinc-900 sticky w-full z-20 top-0 start-0">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto px-4 py-3">
            <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <span class="self-center text-2xl font-bold text-white">VisuaLink</span>
            </a>

            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-white rounded-lg md:hidden hover:bg-zinc-600 focus:outline-none focus:ring-2 focus:ring-white"
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>

            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul
                    class="font-medium flex flex-col p-4 mt-4 border border-zinc-600 rounded-lg bg-zinc-900 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-zinc-900">
                    <li>
                        <a href="{{ url('/') }}" class="block py-2 px-3 text-white rounded-sm transition">Home</a>
                    </li>
                    {{-- <li>
                        <a href="#"
                            class="block py-2 px-3 text-white rounded-sm transition">Explore</a>
                    </li> --}}
                    <li>
                        <a href="{{ url('/about') }}" class="block py-2 px-3 text-white rounded-sm transition">About
                            Us</a>
                    </li>
                    <li>
                        <a href="{{ url('register') }}" class="block py-2 px-3 text-white rounded-sm transition">
                            Register
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{ $slot }}
</x-layouts.app>
