<x-layouts.app>
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-xl font-semibold mb-4">Manage Templates</h2>

        @if ($errors->any())
            <div class="text-red-500 text-sm">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('templates.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700">Template Name</label>
                <input type="text" name="name"
                    class="w-full px-3 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-200">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Preview Image</label>
                <input type="file" name="preview_image" class="w-full px-3 py-2 border rounded-lg">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Template File</label>
                <input type="file" name="template_file" class="w-full px-3 py-2 border rounded-lg">
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">Add
                Template</button>
        </form>

        <h3 class="text-lg font-semibold mt-6 mb-3">Template List</h3>
        <table class="min-w-full border rounded-lg overflow-hidden shadow-md">
            <thead class="bg-blue-500 text-white">
                <tr>
                    <th class="py-2 px-4">Name</th>
                    <th class="py-2 px-4">Preview</th>
                    <th class="py-2 px-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($templates as $template)
                    <tr class="border-b">
                        <td class="py-2 px-4">{{ $template->name }}</td>
                        <td class="py-2 px-4">
                            <img src="{{ asset('storage/' . $template->preview_image) }}"
                                class="h-12 w-12 rounded-lg shadow-md">
                        </td>
                        <td class="py-2 px-4 space-x-2">
                            <a href="{{ route('templates.edit', $template->id) }}"
                                class="bg-yellow-500 text-white px-3 py-1 rounded-lg hover:bg-yellow-600">Edit</a>
                            <form action="{{ route('templates.destroy', $template->id) }}" method="POST"
                                class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layouts.app>
