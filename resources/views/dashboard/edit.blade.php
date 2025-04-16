<x-layouts.sidebar>
    <div class="w-full flex flex-col justify-start items-start gap-5">
        <form method="POST" action="{{ route('projects.update', $project->id) }}" enctype="multipart/form-data"
            class="w-full">
            @csrf
            @method('PUT')

            {{-- Upload Area --}}
            <div id="parent"
                class="w-full mb-3 h-60 rounded-xl border border-dashed border-gray-300 flex flex-col justify-center items-center gap-2.5">
                <label for="imageUpload" class="cursor-pointer flex flex-col justify-center items-center">
                    @if ($project->image)
                        <img id="imagePreview" src="{{ asset('storage/' . $project->image) }}"
                            class="object-contain rounded-lg w-full h-48">
                        <div id="uploadPlaceholder" class="hidden flex-col justify-center items-center">
                            <svg class="text-gray-800 w-12 h-12" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M13 10a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2H14a1 1 0 0 1-1-1Z"
                                    clip-rule="evenodd" />
                                <path fill-rule="evenodd"
                                    d="M2 6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v12c0 .556-.227 1.06-.593 1.422A.999.999 0 0 1 20.5 20H4a2.002 2.002 0 0 1-2-2V6Zm6.892 12 3.833-5.356-3.99-4.322a1 1 0 0 0-1.549.097L4 12.879V6h16v9.95l-3.257-3.619a1 1 0 0 0-1.557.088L11.2 18H8.892Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <p class="text-black text-xs font-medium">Upload your image here</p>
                        </div>
                    @else
                        <img id="imagePreview" class="hidden object-contain rounded-lg">
                        <div id="uploadPlaceholder" class="flex flex-col justify-center items-center">
                            <svg class="text-gray-800 w-12 h-12" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M13 10a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2H14a1 1 0 0 1-1-1Z"
                                    clip-rule="evenodd" />
                                <path fill-rule="evenodd"
                                    d="M2 6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v12c0 .556-.227 1.06-.593 1.422A.999.999 0 0 1 20.5 20H4a2.002 2.002 0 0 1-2-2V6Zm6.892 12 3.833-5.356-3.99-4.322a1 1 0 0 0-1.549.097L4 12.879V6h16v9.95l-3.257-3.619a1 1 0 0 0-1.557.088L11.2 18H8.892Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <p class="text-black text-xs font-medium">Upload your image here</p>
                        </div>
                    @endif
                </label>
                <input id="imageUpload" type="file" name="image" class="hidden" accept="image/*"
                    onchange="previewImage(event)">
                <small class="text-gray-500 mt-2">Biarkan jika tidak ingin mengubah gambar</small>
            </div>

            {{-- Title --}}
            <div class="flex flex-col gap-2">
                <label for="title" class="text-gray-900 font-semibold">Project Title</label>
                <input type="text" id="title" name="title" required value="{{ old('title', $project->title) }}"
                    class="border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:ring-orange-500 focus:border-orange-500">
            </div>

            {{-- Description --}}
            <div class="flex flex-col gap-2 mt-4">
                <label for="description" class="text-gray-900 font-semibold">Project Description</label>
                <textarea id="description" name="description" required rows="4"
                    class="border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:ring-orange-500 focus:border-orange-500">{{ old('description', $project->description) }}</textarea>
            </div>

            {{-- Submit --}}
            <div class="mt-4">
                <button type="submit"
                    class="w-full text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Update Project
                </button>
            </div>
        </form>
    </div>

    {{-- Script Preview --}}
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
                    if (placeholder) placeholder.classList.add('hidden');
                    parent.classList.remove('border');
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</x-layouts.sidebar>
