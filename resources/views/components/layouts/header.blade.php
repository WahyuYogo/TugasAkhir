<x-layouts.app>
    <nav class="bg-orange-500">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <span class="self-center text-2xl font-bold text-white">Meisho</span>
            </a>

            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-white rounded-lg md:hidden hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-white"
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
                    class="font-medium flex flex-col p-4 mt-4 border border-orange-600 rounded-lg bg-orange-600 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-orange-500">
                    <li>
                        <a href="{{ url('/') }}"
                            class="block py-2 px-3 text-white rounded-sm hover:bg-orange-600 transition">Home</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-white rounded-sm hover:bg-orange-600 transition">Explore</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-white rounded-sm hover:bg-orange-600 transition">About Us</a>
                    </li>
                    <li>
                        <a href="{{ url('register') }}"
                            class="block py-2 px-3 text-white rounded-sm hover:bg-orange-600 transition">
                            <svg class="w-6 h-6 inline-block" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{ $slot }}
</x-layouts.app>
