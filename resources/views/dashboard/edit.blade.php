<x-layouts.sidebar>
    <div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow">
        <h2 class="text-2xl font-bold mb-6">Edit Project</h2>

        <form action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-1 font-semibold">Title</label>
                <input type="text" name="title" value="{{ old('title', $project->title) }}" class="w-full border border-gray-300 p-2 rounded">
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-semibold">Description</label>
                <textarea name="description" rows="4" class="w-full border border-gray-300 p-2 rounded">{{ old('description', $project->description) }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-semibold">Gambar</label>
                @if ($project->image)
                    <img src="{{ asset('storage/' . $project->image) }}" class="w-48 mb-2">
                @endif
                <input type="file" name="image" class="block w-full text-sm text-gray-500">
                <small class="text-gray-500">Kosongkan jika tidak ingin mengubah gambar</small>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update Project</button>
        </form>
    </div>
</x-layouts.sidebar>
