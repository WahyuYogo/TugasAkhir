<x-layouts.sidebar>
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow">
        @if (session('success'))
            <div class="p-4 mb-4 text-green-700 bg-green-100 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="w-full mb-4 p-4 text-sm text-red-800 rounded-lg bg-red-100 border border-red-300" role="alert">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (!$user->job && !$user->about)
            {{-- Create Form --}}
            <div class="w-full flex flex-col justify-start items-start gap-5">
                <form method="POST" action="{{ route('profile.store') }}" enctype="multipart/form-data" class="w-full">
                    @csrf

                    {{-- Upload Area --}}
                    <div id="profile-parent"
                        class="w-full mb-3 h-60 rounded-xl border border-dashed border-gray-300 flex flex-col justify-center items-center gap-2.5">
                        <label for="profile_photo" class="cursor-pointer flex flex-col justify-center items-center">
                            <img id="profile-preview" class="hidden object-contain rounded-full">
                            <div id="profile-placeholder" class="flex flex-col justify-center items-center">
                                <svg class="text-gray-800 w-12 h-12" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M13 10a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2H14a1 1 0 0 1-1-1Z"
                                        clip-rule="evenodd" />
                                    <path fill-rule="evenodd"
                                        d="M2 6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v12c0 .556-.227 1.06-.593 1.422A.999.999 0 0 1 20.5 20H4a2.002 2.002 0 0 1-2-2V6Zm6.892 12 3.833-5.356-3.99-4.322a1 1 0 0 0-1.549.097L4 12.879V6h16v9.95l-3.257-3.619a1 1 0 0 0-1.557.088L11.2 18H8.892Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <p class="text-black text-xs font-medium">Upload your profile photo</p>
                            </div>
                        </label>
                        <input id="profile_photo" type="file" name="profile_photo" class="hidden" accept="image/*"
                            onchange="previewProfilePhoto(event)">
                    </div>

                    {{-- Job --}}
                    <div class="flex flex-col gap-2">
                        <label for="job" class="text-gray-900 font-semibold">Role / Job</label>
                        <input type="text" id="job" name="job" required
                            placeholder="Masukkan role atau pekerjaan"
                            class="border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:ring-orange-500 focus:border-orange-500">
                    </div>

                    {{-- About --}}
                    <div class="flex flex-col gap-2 mt-4">
                        <label for="about" class="text-gray-900 font-semibold">About Me</label>
                        <textarea id="about" name="about" required placeholder="Tulis sesuatu tentang dirimu"
                            class="border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:ring-orange-500 focus:border-orange-500"></textarea>
                    </div>

                    {{-- Submit --}}
                    <div class="mt-4">
                        <button type="submit"
                            class="w-full text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            Save Profile
                        </button>
                    </div>
                </form>
            </div>
        @else
            {{-- Show Profile --}}
            <div id="profileShow" class="w-full flex flex-col items-center gap-4">
                <h2 class="text-2xl font-bold text-gray-900">Your Profile</h2>
                @if ($user->profile_photo)
                    <img src="{{ asset('storage/' . $user->profile_photo) }}"
                        class="w-24 h-24 rounded-full object-cover">
                @endif
                <p class="text-gray-900 text-xl"><strong>{{ $user->name }}</strong></p>
                <hr class="w-full border-t border-gray-300">
                <div class="flex flex-col w-full items-center gap-3">
                    <p class="text-gray-900"><strong>Role / Job</strong></p>
                    <p
                        class="text-gray-900 bg-gray-100 hover:bg-gray-200 rounded-lg text-sm px-5 py-2.5 border w-full text-center">
                        {{ $user->job }}</p>
                    <p class="text-gray-900 mt-2"><strong>About Me</strong></p>
                    <p
                        class="text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg text-sm px-5 py-2.5 border w-full text-center">
                        {{ $user->about }}</p>
                </div>

                <button onclick="toggleEdit()"
                    class="px-4 py-2 bg-orange-500 hover:bg-orange-600 text-white rounded-lg w-full">
                    Edit Profile
                </button>
            </div>

            {{-- Edit Profile --}}
            <form id="profileEdit" action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data"
                class="w-full hidden flex-col gap-5">
                @csrf
                @method('PUT')

                <h2 class="text-2xl font-bold text-gray-900">Edit Profile</h2>

                {{-- Upload Area --}}
                <div id="parent"
                    class="w-full mb-3 h-60 rounded-xl border border-dashed border-gray-300 flex flex-col justify-center items-center gap-2.5">
                    <label for="imageUpload" class="cursor-pointer flex flex-col justify-center items-center">
                        @if ($user->profile_photo)
                            <img id="imagePreview" src="{{ asset('storage/' . $user->profile_photo) }}"
                                class="object-contain rounded-lg w-full h-48">
                            <div id="uploadPlaceholder" class="hidden flex-col justify-center items-center">
                                <!-- Icon Placeholder -->
                                <svg class="text-gray-800 w-12 h-12" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M13 10a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2H14a1 1 0 0 1-1-1Z"
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
                                <!-- Icon Placeholder -->
                                <svg class="text-gray-800 w-12 h-12" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M13 10a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2H14a1 1 0 0 1-1-1Z"
                                        clip-rule="evenodd" />
                                    <path fill-rule="evenodd"
                                        d="M2 6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v12c0 .556-.227 1.06-.593 1.422A.999.999 0 0 1 20.5 20H4a2.002 2.002 0 0 1-2-2V6Zm6.892 12 3.833-5.356-3.99-4.322a1 1 0 0 0-1.549.097L4 12.879V6h16v9.95l-3.257-3.619a1 1 0 0 0-1.557.088L11.2 18H8.892Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <p class="text-black text-xs font-medium">Upload your image here</p>
                            </div>
                        @endif
                    </label>
                    <input id="imageUpload" type="file" name="profile_photo" class="hidden" accept="image/*"
                        onchange="previewImage(event)">
                    <small class="text-gray-500 mt-2">Kosongkan jika tidak ingin mengubah foto</small>
                </div>

                {{-- Job --}}
                <div class="flex flex-col gap-2">
                    <label for="job" class="text-gray-900 font-semibold">Role / Job</label>
                    <input type="text" id="job" name="job" required
                        value="{{ old('job', $user->job) }}"
                        class="border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:ring-orange-500 focus:border-orange-500">
                </div>

                {{-- About Me --}}
                <div class="flex flex-col gap-2 mt-4">
                    <label for="about" class="text-gray-900 font-semibold">About Me</label>
                    <textarea id="about" name="about" rows="4"
                        class="border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:ring-orange-500 focus:border-orange-500">{{ old('about', $user->about) }}</textarea>
                </div>

                {{-- Submit --}}
                <div class="mt-4 flex gap-2">
                    <button type="submit"
                        class="text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5">
                        Update Profile
                    </button>
                    <button type="button" onclick="toggleEdit()"
                        class="text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg text-sm px-5 py-2.5 border">
                        Cancel
                    </button>
                </div>
            </form>
        @endif
    </div>

    {{-- Preview Script --}}
    <script>
        function previewProfilePhoto(event) {
            const input = event.target;
            const preview = document.getElementById('profile-preview');
            const placeholder = document.getElementById('profile-placeholder');
            const parent = document.getElementById('profile-parent');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    preview.classList.add('w-48', 'h-48');
                    placeholder.classList.add('hidden');
                    parent.classList.remove('border');
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        function toggleEdit() {
            const show = document.getElementById('profileShow');
            const edit = document.getElementById('profileEdit');
            show.classList.toggle('hidden');
            edit.classList.toggle('hidden');
        }

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
