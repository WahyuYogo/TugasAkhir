<x-layouts.app>

    <div class="justify-between flex items-center">
        <button data-drawer-target="sidebar-multi-level-sidebar" data-drawer-toggle="sidebar-multi-level-sidebar"
            aria-controls="sidebar-multi-level-sidebar" type="button"
            class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-orange-500 rounded-lg sm:hidden hover:bg-orange-100 focus:outline-none focus:ring-2 focus:ring-orange-200 dark:text-orange-500 dark:hover:bg-orange-300 dark:focus:ring-orange-600">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path clip-rule="evenodd" fill-rule="evenodd"
                    d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                </path>
            </svg>
        </button>

        <a href="{{ url('/' . auth()->user()->slug) }}"
            class="inline-flex items-center p-2 mt-2 me-3 font-bold text-sm text-orange-500 rounded-lg sm:hidden hover:bg-orange-100 focus:outline-none focus:ring-2 focus:ring-orange-200 dark:text-orange-500 dark:hover:bg-orange-300 dark:focus:ring-orange-600">
            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-width="2"
                    d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
            </svg>
            Preview
        </a>
    </div>
    <aside id="sidebar-multi-level-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
        aria-label="Sidebar">
        <div class="h-full px-8 py-6 overflow-y-auto bg-white border-r-2 border-gray-200">
            <ul class="space-y-2 font-medium">

                <li>
                    <span class="ms-3">{{ auth()->user()->name }}</span>
                </li>
                <li>
                    <a href="{{ url('/dashboard') }}"
                        class="flex items-center p-2 text-black hover:text-orange-500 rounded-lg hover:bg-orange-100 group {{ request()->routeIs('dashboard') ? 'bg-orange-100 text-orange-500' : '' }}">
                        <svg class="w-5 h-5 transition duration-75 group-hover:text-orange-500" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg>
                        <span class="ms-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/profile') }}"
                        class="flex items-center p-2 text-black hover:text-orange-500 rounded-lg hover:bg-orange-100 group {{ request()->routeIs('profile.*') ? 'bg-orange-100 text-orange-500' : '' }}">
                        <svg class="w-5 h-5 transition duration-75 group-hover:text-orange-500" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="ms-3">Profile</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/template') }}"
                        class="flex items-center p-2 text-black hover:text-orange-500 rounded-lg hover:bg-orange-100 group {{ request()->routeIs('template.*') ? 'bg-orange-100 text-orange-500' : '' }}">
                        <svg class="w-5 h-5 transition duration-75 group-hover:text-orange-500" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M4.857 3A1.857 1.857 0 0 0 3 4.857v4.286C3 10.169 3.831 11 4.857 11h4.286A1.857 1.857 0 0 0 11 9.143V4.857A1.857 1.857 0 0 0 9.143 3H4.857Zm10 0A1.857 1.857 0 0 0 13 4.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 21 9.143V4.857A1.857 1.857 0 0 0 19.143 3h-4.286Zm-10 10A1.857 1.857 0 0 0 3 14.857v4.286C3 20.169 3.831 21 4.857 21h4.286A1.857 1.857 0 0 0 11 19.143v-4.286A1.857 1.857 0 0 0 9.143 13H4.857ZM18 14a1 1 0 1 0-2 0v2h-2a1 1 0 1 0 0 2h2v2a1 1 0 1 0 2 0v-2h2a1 1 0 1 0 0-2h-2v-2Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="ms-3">Template</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/projects') }}"
                        class="flex items-center p-2 text-black hover:text-orange-500 rounded-lg hover:bg-orange-100 group {{ request()->routeIs('projects.*') ? 'bg-orange-100 text-orange-500' : '' }}">
                        <svg class="w-5 h-5 transition duration-75 group-hover:text-orange-500" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m8 8-4 4 4 4m8 0 4-4-4-4m-2-3-4 14" />
                        </svg>
                        <span class="ms-3">Projects</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/links') }}"
                        class="flex items-center p-2 text-black hover:text-orange-500 rounded-lg hover:bg-orange-100 group {{ request()->routeIs('links.*') ? 'bg-orange-100 text-orange-500' : '' }}">
                        <svg class="w-5 h-5 transition duration-75 group-hover:text-orange-500" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.213 9.787a3.391 3.391 0 0 0-4.795 0l-3.425 3.426a3.39 3.39 0 0 0 4.795 4.794l.321-.304m-.321-4.49a3.39 3.39 0 0 0 4.795 0l3.424-3.426a3.39 3.39 0 0 0-4.794-4.795l-1.028.961" />
                        </svg>
                        <span class="ms-3">Links</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/skills') }}"
                        class="flex items-center p-2 text-black hover:text-orange-500 rounded-lg hover:bg-orange-100 group {{ request()->routeIs('skills.*') ? 'bg-orange-100 text-orange-500' : '' }}">
                        <svg class="w-5 h-5 transition duration-75 group-hover:text-orange-500" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path d="M11 9a1 1 0 1 1 2 0 1 1 0 0 1-2 0Z" />
                            <path fill-rule="evenodd"
                                d="M9.896 3.051a2.681 2.681 0 0 1 4.208 0c.147.186.38.282.615.255a2.681 2.681 0 0 1 2.976 2.975.681.681 0 0 0 .254.615 2.681 2.681 0 0 1 0 4.208.682.682 0 0 0-.254.615 2.681 2.681 0 0 1-2.976 2.976.681.681 0 0 0-.615.254 2.682 2.682 0 0 1-4.208 0 .681.681 0 0 0-.614-.255 2.681 2.681 0 0 1-2.976-2.975.681.681 0 0 0-.255-.615 2.681 2.681 0 0 1 0-4.208.681.681 0 0 0 .255-.615 2.681 2.681 0 0 1 2.976-2.975.681.681 0 0 0 .614-.255ZM12 6a3 3 0 1 0 0 6 3 3 0 0 0 0-6Z"
                                clip-rule="evenodd" />
                            <path
                                d="M5.395 15.055 4.07 19a1 1 0 0 0 1.264 1.267l1.95-.65 1.144 1.707A1 1 0 0 0 10.2 21.1l1.12-3.18a4.641 4.641 0 0 1-2.515-1.208 4.667 4.667 0 0 1-3.411-1.656Zm7.269 2.867 1.12 3.177a1 1 0 0 0 1.773.224l1.144-1.707 1.95.65A1 1 0 0 0 19.915 19l-1.32-3.93a4.667 4.667 0 0 1-3.4 1.642 4.643 4.643 0 0 1-2.53 1.21Z" />
                        </svg>
                        <span class="ms-3">Experience</span>
                    </a>
                </li>

                <li>
                    <form action="{{ route('logout') }}" method="POST"
                        class="flex items-center p-2 text-black hover:text-orange-500 rounded-lg hover:bg-orange-100 group">
                        @csrf
                        <svg class="w-5 h-5 text-black transition duration-75 group-hover:text-orange-500"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M20 12H8m12 0-4 4m4-4-4-4M9 4H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h2" />
                        </svg>
                        <button type="submit" class="ms-3">Logout</button>
                    </form>
                    </a>
                </li>

            </ul>
        </div>
    </aside>

    <div class="p-4 sm:ml-64">
        {{ $slot }}
    </div>
</x-layouts.app>
