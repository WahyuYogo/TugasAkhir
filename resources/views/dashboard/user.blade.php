<x-layouts.sidebar>
    {{-- <h1 class="mb-1">Url Anda Adalah <strong>/{{ Auth::user()->slug }}</strong>!</h1> --}}
    {{-- <h1 class="font-semibold text-gray-900 text-2xl mb-3">Statistics</h1>
    <div class="grid grid-cols-3 gap-4 mb-4">
        <div class="max-w-sm py-4 px-6 bg-orange-300 border border-orange-500 rounded-xl shadow-sm">
            <p class="font-semibold text-gray-900">Today</p>
            <a href="#">
                <h5 class="text-5xl font-normal tracking-tight text-gray-900">{{ $today }}</h5>
            </a>
            <p class="font-semibold text-gray-900">Views</p>
            </a>
        </div>
        <div class="max-w-sm py-4 px-6 bg-white border border-gray-200 rounded-xl shadow-sm">
            <p class="font-semibold text-gray-900">This Weak</p>
            <a href="#">
                <h5 class="text-5xl font-normal tracking-tight text-gray-900">{{$week}}</h5>
            </a>
            <p class="font-semibold text-gray-900">Views</p>
            </a>
        </div>
        <div class="max-w-sm py-4 px-6 bg-white border border-gray-200 rounded-xl shadow-sm">
            <p class="font-semibold text-gray-900">This Month</p>
            <a href="#">
                <h5 class="text-5xl font-normal tracking-tight text-gray-900">{{$month}}</h5>
            </a>
            <p class="font-semibold text-gray-900">Views</p>
            </a>
        </div>
    </div> --}}

    @if (session('success'))
        <div class="mb-4 p-4 text-green-700 bg-green-100 rounded-lg">
            {{ session('success') }}
        </div>
    @elseif (session('error'))
        <div class="mb-4 p-4 text-red-700 bg-red-100 rounded-lg">
            {{ session('error') }}
        </div>
    @endif

    @if (!auth()->user()->userTemplate)
        <div class="w-full mb-4 p-4 bg-yellow-100 border border-yellow-300 text-yellow-800 rounded-lg">
            <div class="flex justify-between items-center">
                <div>
                    <strong class="font-semibold">Belum Memilih Template</strong>
                    <p class="text-sm mt-1">Silakan pilih template portofolio terlebih dahulu agar halaman publik kamu
                        bisa ditampilkan.</p>
                </div>
                <a href="{{ route('select-template') }}"
                    class="ml-4 px-4 py-2 text-sm text-white bg-yellow-500 hover:bg-yellow-600 rounded-lg">
                    Pilih Template
                </a>
            </div>
        </div>
    @endif
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


    <div class="flex items-center justify-between mt-6 mb-3">
        <h1 class="font-semibold text-gray-900 text-2xl mb-3 mt-6">ShortLink</h1>
        <a href="/links"
            class="ms-auto text-white bg-orange-500 hover:bg-orange-700 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-4 py-2 focus:outline-none ">Add
            Links</a>
    </div>
    <div class="relative overflow-x-auto sm:rounded-lg border border-gray-200">
        <table class="w-full text-sm text-left rtl:text-right text-black">
            <thead class="text-xs text-black uppercase bg-white border-b border-gray-200">
                <tr>
                    <th scope="col" class="px-6 py-3 border-r border-gray-200">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3 border-r border-gray-200">
                        Platform
                    </th>
                    <th scope="col" class="px-6 py-3 border-r border-gray-200">
                        USERNAME
                    </th>
                    <th scope="col" class="px-6 py-3 border-r border-gray-200">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse (auth()->user()->socialLinks as $index => $link)
                    <tr class="bg-white border-b border-gray-200">
                        <td class="px-6 py-4 border-r border-gray-200">{{ $index + 1 }}</td>
                        </td>
                        <td scope="row"
                            class="px-6 py-4 border-r border-gray-200 font-medium text-black whitespace-nowrap">
                            <img src="https://www.google.com/s2/favicons?domain={{ parse_url($link->url, PHP_URL_HOST) }}&sz=32"
                                class="w-6 h-6" alt="Icon">
                            <span>{{ parse_url($link->url, PHP_URL_HOST) }}</span>
                        </td>
                        <td class="px-6 py-4 border-r border-gray-200">
                            {{ getUsernameFromUrl($link->url) }}
                        </td>
                        <td class="px-6 py-4 border-r border-gray-200">

                            <form action="{{ route('links.destroy', $link->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')"
                                    class="px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-600">
                                    Delete
                                </button>
                            </form>
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

    <div class="flex items-center justify-between mt-6 mb-3">
        <h1 class="font-semibold text-gray-900 text-2xl mb-3 mt-6">Projects</h1>
        <a href="/projects"
            class="ms-auto text-white bg-orange-500 hover:bg-orange-700 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-4 py-2 focus:outline-none ">Add
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
                        <td class="px-6 py-4 border-r border-gray-200">{{ Str::limit($project->description, 50) }}</td>
                        <td class="px-6 py-4 border-r border-gray-200">
                            <div class="flex items-center gap-3">
                                <a href="{{ route('projects.edit', $project->id) }}"
                                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 transition">
                                    Edit
                                </a>

                                <form action="{{ route('projects.destroy', $project->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus project ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-md hover:bg-red-700 transition">
                                        Delete
                                    </button>
                                </form>
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

</x-layouts.sidebar>
