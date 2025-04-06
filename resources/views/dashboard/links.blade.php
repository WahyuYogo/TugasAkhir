<x-layouts.sidebar>
    <h2 class="text-xl font-semibold mb-4">Manage Social Links</h2>

    <!-- Form Tambah Social Link -->
    <form method="POST" action="{{ route('links.store') }}" class="mb-4">
        @csrf
        <div>
            <input type="text" name="platform" required placeholder="Platform Name (e.g. LinkedIn, GitHub)"
                class="border p-2 w-full mb-2">
        </div>
        <div>
            <input type="url" name="url" required placeholder="Profile URL" class="border p-2 w-full mb-2">
        </div>
        <button type="submit" class="bg-blue-500 text-white p-2">Add Social Link</button>
    </form>

    <!-- List Social Links -->
    <ul>
        @foreach ($socialLinks as $socialLink)
            <li class="border p-2 mb-2 flex justify-between items-center">
                <div>
                    <strong>{{ $socialLink->platform }}</strong> -
                    <a href="{{ $socialLink->url }}" target="_blank" class="text-blue-500">Visit</a>
                </div>
                <form method="POST" action="{{ route('links.destroy', $socialLink) }}">
                    @csrf @method('DELETE')
                    <button type="submit" class="text-red-500">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</x-layouts.sidebar>
