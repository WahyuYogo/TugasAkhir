<x-layouts.sidebar>
    <h2 class="text-xl font-semibold mb-4">Manage Projects</h2>

    <!-- Form Tambah Project -->
    <form method="POST" action="{{ route('projects.store') }}" class="mb-4">
        @csrf
        <div>
            <input type="text" name="title" required placeholder="Project Title" class="border p-2 w-full mb-2">
        </div>
        <div>
            <input type="url" name="link" placeholder="Project Link (optional)" class="border p-2 w-full mb-2">
        </div>
        <button type="submit" class="bg-blue-500 text-white p-2">Add Project</button>
    </form>

    <!-- List Project -->
    <ul>
        @foreach ($projects as $project)
            <li class="border p-2 mb-2 flex justify-between items-center">
                <div>
                    <strong>{{ $project->title }}</strong>
                    @if ($project->link)
                        - <a href="{{ $project->link }}" target="_blank" class="text-blue-500">View</a>
                    @endif
                </div>
                <form method="POST" action="{{ route('projects.destroy', $project) }}">
                    @csrf @method('DELETE')
                    <button type="submit" class="text-red-500">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</x-layouts.sidebar>
