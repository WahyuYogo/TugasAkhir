<x-layouts.sidebar>
    {{-- Notifikasi & Validasi --}}
    @if (session('success'))
        <div class="mb-4 p-4 text-green-700 bg-green-100 rounded-lg">{{ session('success') }}</div>
    @elseif (session('error'))
        <div class="mb-4 p-4 text-red-700 bg-red-100 rounded-lg">{{ session('error') }}</div>
    @endif

    {{-- Notifikasi jika belum memilih template --}}
    @if (!auth()->user()->userTemplate)
        <div class="w-full mb-4 p-4 bg-yellow-100 border border-yellow-300 text-yellow-800 rounded-lg">
            <div class="flex justify-between items-center">
                <div>
                    <strong class="font-semibold">Belum Memilih Template</strong>
                    <p class="text-sm mt-1">Silakan pilih template terlebih dahulu agar halaman publik kamu bisa
                        ditampilkan.</p>
                </div>
                <a href="{{ route('select-template') }}"
                    class="ml-4 px-4 py-2 text-sm text-white bg-yellow-500 hover:bg-yellow-600 rounded-lg">
                    Pilih Template
                </a>
            </div>
        </div>
    @endif

    {{-- Notifikasi jika profil belum lengkap --}}
    @if (!auth()->user()->job || !auth()->user()->about)
        <div class="w-full mb-4 p-4 bg-blue-100 border border-blue-300 text-blue-800 rounded-lg">
            <div class="flex justify-between items-center">
                <div>
                    <strong class="font-semibold">Profil Belum Lengkap</strong>
                    <p class="text-sm mt-1">Lengkapi informasi profil seperti role dan tentang diri kamu.</p>
                </div>
                <a href="{{ route('profile.index') }}"
                    class="ml-4 px-4 py-2 text-sm text-white bg-blue-500 hover:bg-blue-600 rounded-lg">
                    Lengkapi Profil
                </a>
            </div>
        </div>
    @endif


    <div class="w-full">
        <div class="relative">
            <label for="npm-install-copy-button" class="sr-only">Label</label>
            <input id="npm-install-copy-button" type="text"
                class="col-span-6 bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                value="visualink.my.id/{{ auth()->user()->slug }}" disabled readonly>
            <button data-copy-to-clipboard-target="npm-install-copy-button"
                data-tooltip-target="tooltip-copy-npm-install-copy-button"
                class="absolute end-2 top-1/2 -translate-y-1/2 text-gray-500 hover:bg-gray-100 rounded-lg p-2 inline-flex items-center justify-center">
                <span id="default-icon">
                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 18 20">
                        <path
                            d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2Zm-3 14H5a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2Zm0-4H5a1 1 0 0 1 0-2h8a1 1 0 1 1 0 2Zm0-5H5a1 1 0 0 1 0-2h2V2h4v2h2a1 1 0 1 1 0 2Z" />
                    </svg>
                </span>
                <span id="success-icon" class="hidden">
                    <svg class="w-3.5 h-3.5 text-blue-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 16 12">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5.917 5.724 10.5 15 1.5" />
                    </svg>
                </span>
            </button>
            <div id="tooltip-copy-npm-install-copy-button" role="tooltip"
                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip">
                <span id="default-tooltip-message">Copy to clipboard</span>
                <span id="success-tooltip-message" class="hidden">Copied!</span>
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
        </div>
    </div>

    {{-- TABEL SHORTLINK --}}
    <div class="flex items-center justify-between mt-6 mb-3">
        <h1 class="font-semibold text-gray-900 text-2xl">ShortLink</h1>
        <a href="{{ url('/links') }}"
            class="ms-auto text-white bg-orange-500 hover:bg-orange-700 font-medium rounded-lg text-sm px-4 py-2">Add
            Links</a>
    </div>

    <div class="relative overflow-x-auto rounded-lg border border-gray-200 mt-4">
        <table class="min-w-full text-sm text-left rtl:text-right text-black">
            <thead class="text-xs text-black uppercase bg-white border-b border-gray-200">
                <tr>
                    <th class="px-4 py-3 border-r border-gray-200 whitespace-nowrap">No</th>
                    <th class="px-4 py-3 border-r border-gray-200 whitespace-nowrap">Display</th>
                    <th class="px-4 py-3 border-r border-gray-200 whitespace-nowrap">Link</th>
                    <th class="px-4 py-3 border-r border-gray-200 whitespace-nowrap">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach (auth()->user()->socialLinks as $index => $link)
                    <tr class="bg-white border-b border-gray-200">
                        <td class="px-4 py-3 border-r border-gray-200 whitespace-nowrap">{{ $index + 1 }}</td>
                        <td class="px-4 py-3 border-r border-gray-200 whitespace-nowrap">
                            <div class="flex items-center space-x-3">
                                <span>{{ $link->username }}</span>
                            </div>
                        </td>
                        <td class="px-4 py-3 border-r border-gray-200 whitespace-nowrap">
                            <a href="{{ $link->url }}" target="_blank" class="text-blue-600 hover:underline">
                                {{ $link->url }}
                            </a>
                        </td>
                        <td class="px-4 py-3 border-r border-gray-200 whitespace-nowrap">
                            <div class="relative text-right">
                                <button id="dropdownActionButton-{{ $link->id }}"
                                    data-dropdown-toggle="dropdownActionMenu-{{ $link->id }}"
                                    class="text-gray-800 hover:bg-gray-100 focus:outline-none font-medium rounded-lg text-sm p-2.5 inline-flex items-center"
                                    type="button">
                                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" d="M6 12h.01M12 12h.01M18 12h.01" />
                                    </svg>
                                </button>

                                <div id="dropdownActionMenu-{{ $link->id }}"
                                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-36 absolute right-0 mt-2">
                                    <ul class="py-2 text-sm text-gray-700">
                                        <li>
                                            <form action="{{ route('links.destroy', $link->id) }}" method="POST"
                                                onsubmit="return confirm('Yakin Nih?');">
                                                @csrf @method('DELETE')
                                                <button type="submit"
                                                    class="w-full text-left px-4 py-2 hover:bg-gray-100">
                                                    Delete
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    {{-- TABEL PROJECT --}}
    <div class="flex items-center justify-between mt-6 mb-3">
        <h1 class="font-semibold text-gray-900 text-2xl">Projects</h1>
        <a href="{{ url('/projects') }}"
            class="ms-auto text-white bg-orange-500 hover:bg-orange-700 font-medium rounded-lg text-sm px-4 py-2">Add
            Project</a>
    </div>

    <div class="relative overflow-x-auto rounded-lg border border-gray-200 mt-4">
        <table class="w-full text-sm text-left text-black">
            <thead class="text-xs text-black uppercase bg-white border-b border-gray-200">
                <tr>
                    <th scope="col" class="px-6 py-3 border-r border-gray-200">No</th>
                    <th scope="col" class="px-6 py-3 border-r border-gray-200">Image</th>
                    <th scope="col" class="px-6 py-3 border-r border-gray-200">Title</th>
                    <th scope="col" class="px-6 py-3 border-r border-gray-200">Description</th>
                    <th scope="col" class="px-6 py-3 border-r border-gray-200">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse (auth()->user()->projects as $index => $project)
                    <tr class="bg-white border-b border-gray-200">
                        <td class="px-6 py-4 border-r border-gray-200">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 border-r border-gray-200">
                            <img src="{{ asset('storage/' . $project->image) }}" alt="Project Image"
                                class="w-16 h-16 object-cover rounded-md">
                        </td>
                        <td class="px-6 py-4 border-r border-gray-200">{{ $project->title }}</td>
                        <td class="px-6 py-4 border-r border-gray-200">{{ Str::limit($project->description, 50) }}
                        </td>
                        <td class="px-6 py-4 border-r border-gray-200">
                            <div class="flex items-center gap-3">
                                <div class="relative text-right">
                                    <button id="dropdownProjectButton-{{ $project->id }}"
                                        data-dropdown-toggle="dropdownProjectMenu-{{ $project->id }}"
                                        class="text-gray-800 hover:bg-gray-100 focus:outline-none font-medium rounded-lg text-sm p-2.5 inline-flex items-center"
                                        type="button">
                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" d="M6 12h.01M12 12h.01M18 12h.01" />
                                        </svg>
                                    </button>

                                    <div id="dropdownProjectMenu-{{ $project->id }}"
                                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow border border-gray-300 w-36 absolute right-0 mt-2">
                                        <ul class="py-2 text-sm text-gray-700">
                                            <li>
                                                <a href="{{ route('projects.edit', $project->id) }}"
                                                    class="block px-4 py-2 hover:bg-gray-100">Edit</a>
                                            </li>
                                            <li>
                                                <form action="{{ route('projects.destroy', $project->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Yakin ingin menghapus project ini?');">
                                                    @csrf @method('DELETE')
                                                    <button type="submit"
                                                        class="w-full text-left px-4 py-2 hover:bg-gray-100">
                                                        Delete
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>
                @empty
                    <tr class="bg-white border-b border-gray-200">
                        <td colspan="5" class="px-6 py-4 text-center text-gray-400">Belum ada project.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- TABEL SKILL --}}
    <div class="flex items-center justify-between mt-6 mb-3">
        <h1 class="font-semibold text-gray-900 text-2xl">Experience</h1>
        <a href="{{ url('/skills') }}"
            class="ms-auto text-white bg-orange-500 hover:bg-orange-700 font-medium rounded-lg text-sm px-4 py-2">Add</a>
    </div>

    <div class="relative overflow-x-auto rounded-lg border border-gray-200 mb-10">
        <table class="w-full text-sm text-left text-black">
            <thead class="text-xs uppercase bg-white border-b">
                <tr>
                    <th class="px-6 py-3 border-r border-gray-200 whitespace-nowrap">No</th>
                    <th class="px-6 py-3 border-r border-gray-200 whitespace-nowrap">Skill</th>
                    <th class="px-6 py-3 border-r border-gray-200 whitespace-nowrap">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse (auth()->user()->skills as $index => $skill)
                    <tr class="bg-white border-b">
                        <td class="px-6 py-4 border-r border-gray-200 whitespace-nowrap">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 border-r border-gray-200 whitespace-nowrap">{{ $skill->name }}</td>
                        <td class="px-6 py-4 border-r border-gray-200 whitespace-nowrap">
                            <div class="relative text-right">
                                <button id="dropdownSkillButton-{{ $skill->id }}"
                                    data-dropdown-toggle="dropdownSkillMenu-{{ $skill->id }}"
                                    class="text-gray-800 hover:bg-gray-100 focus:outline-none font-medium rounded-lg text-sm p-2.5 inline-flex items-center"
                                    type="button">
                                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" d="M6 12h.01M12 12h.01M18 12h.01" />
                                    </svg>
                                </button>

                                <div id="dropdownSkillMenu-{{ $skill->id }}"
                                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow border border-gray-300 w-36 absolute right-0 mt-2">
                                    <ul class="py-2 text-sm text-gray-700">
                                        <li>
                                            <form action="{{ route('skills.destroy', $skill->id) }}" method="POST"
                                                onsubmit="return confirm('Yakin hapus skill ini?');">
                                                @csrf @method('DELETE')
                                                <button type="submit"
                                                    class="w-full text-left px-4 py-2 hover:bg-gray-100">
                                                    Delete
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center text-gray-400 px-6 py-4">Belum ada skill.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</x-layouts.sidebar>
