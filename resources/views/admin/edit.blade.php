<x-layouts.app>
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-xl font-semibold mb-4">Edit Template</h2>

        @if ($errors->any())
            <div class="text-red-500 text-sm">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('templates.update', $template->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-sm font-medium text-gray-700">Template Name</label>
                <input type="text" name="name" value="{{ $template->name }}"
                    class="w-full px-3 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-200">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Preview Image</label>
                <input type="file" name="preview_image" class="w-full px-3 py-2 border rounded-lg">
                @if ($template->preview_image)
                    <img src="{{ asset('storage/' . $template->preview_image) }}"
                        class="h-12 w-12 rounded-lg shadow-md mt-2">
                @endif
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Template File</label>
                <input type="file" name="template_file" class="w-full px-3 py-2 border rounded-lg">
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">Update
                Template</button>
        </form>
    </div>
</x-layouts.app>
