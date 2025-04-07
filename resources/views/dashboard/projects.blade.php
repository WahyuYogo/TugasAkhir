<x-layouts.sidebar>
    <div
        class="p-6 bg-white rounded-xl border border-gray-300 flex flex-col md:flex-row justify-center items-center gap-7 w-full">

        <!-- Form -->
        <div class="w-full flex flex-col justify-start items-start gap-5">
            <form method="POST" action="{{ route('projects.store') }}" enctype="multipart/form-data" class="w-full">
                @csrf
                <div id="parent"
                    class="w-full mb-3 h-60 rounded-xl border border-dashed border-gray-300 flex flex-col justify-center items-center gap-2.5">
                    <label for="imageUpload" class="cursor-pointer flex flex-col justify-center items-center">
                        <img id="imagePreview" class="hidden object-contain rounded-lg">
                        <div id="uploadPlaceholder" class="flex flex-col justify-center items-center">
                            <svg class="text-gray-800 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M13 10a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2H14a1 1 0 0 1-1-1Z"
                                    clip-rule="evenodd" />
                                <path fill-rule="evenodd"
                                    d="M2 6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v12c0 .556-.227 1.06-.593 1.422A.999.999 0 0 1 20.5 20H4a2.002 2.002 0 0 1-2-2V6Zm6.892 12 3.833-5.356-3.99-4.322a1 1 0 0 0-1.549.097L4 12.879V6h16v9.95l-3.257-3.619a1 1 0 0 0-1.557.088L11.2 18H8.892Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <p class="text-black text-xs font-medium">Upload your image here</p>
                        </div>
                    </label>
                    <input id="imageUpload" type="file" name="image" class="hidden" accept="image/*"
                        onchange="previewImage(event)">
                </div>

                <!-- Project Title -->
                <div class="flex flex-col gap-2">
                    <label for="title" class="text-gray-900 font-semibold">Project Title</label>
                    <input type="text" id="title" name="title" required placeholder="Masukkan Judul Project"
                        class="border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:ring-orange-500 focus:border-orange-500">
                </div>

                <!-- Project Description -->
                <div class="flex flex-col gap-2 mt-4">
                    <label for="description" class="text-gray-900 font-semibold">Project Description</label>
                    <textarea id="description" name="description" required placeholder="Description"
                        class="border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:ring-orange-500 focus:border-orange-500"></textarea>
                </div>

                <!-- Submit Button -->
                <div class="mt-4">
                    <button type="submit"
                        class="w-full text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>

    @if (session('success'))
        <div class="p-4 mt-4 text-sm text-green-800 bg-green-100 rounded-lg dark:bg-green-900 dark:text-green-200 w-full"
            role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="p-4 mt-4 text-sm text-red-800 bg-red-100 rounded-lg dark:bg-red-900 dark:text-red-200 w-full"
            role="alert">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
    @endif

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
                            <form action="{{ route('projects.update', $project->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="text-blue-500 hover:underline">Edit</button>
                            </form>

                            <form action="{{ route('projects.destroy', $project->id) }}" method="POST"
                                class="inline-block" onsubmit="return confirm('Yakin ingin menghapus project ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="font-medium text-red-600 hover:underline">Delete</button>
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


    <!-- Script Preview Gambar -->
    <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('imagePreview');
            const placeholder = document.getElementById('uploadPlaceholder');
            const parent = document.getElementById('parent');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    preview.classList.add('w-full', 'h-60');
                    placeholder.classList.add('hidden');
                    parent.classList.remove('border');
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</x-layouts.sidebar>
