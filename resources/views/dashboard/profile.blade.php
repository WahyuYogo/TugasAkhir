<x-layouts.sidebar>
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow">
        @if (session('success'))
            <div class="p-4 mb-4 text-green-700 bg-green-100 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        @if (!$user->job && !$user->about)
            {{-- Create Form --}}
            <h2 class="text-xl font-semibold mb-4">Create Your Profile</h2>

            <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700">Profile Photo</label>
                    <input type="file" name="profile_photo" class="w-full border p-2 rounded">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Role / Job</label>
                    <input type="text" name="job" class="w-full border p-2 rounded" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">About Me</label>
                    <textarea name="about" class="w-full border p-2 rounded" required></textarea>
                </div>

                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Save Profile</button>
            </form>

        @else
            {{-- Show Profile --}}
            <h2 class="text-xl font-semibold mb-4">Your Profile</h2>

            <div class="mb-4">
                @if ($user->profile_photo)
                    <img src="{{ asset('storage/' . $user->profile_photo) }}" class="w-24 h-24 rounded-full mb-2">
                @endif
                <p><strong>Role / Job:</strong> {{ $user->job }}</p>
                <p class="mt-2"><strong>About Me:</strong></p>
                <p>{{ $user->about }}</p>
            </div>

            {{-- Edit Form --}}
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="mt-6">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-gray-700">Change Profile Photo</label>
                    <input type="file" name="profile_photo" class="w-full border p-2 rounded">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Update Role / Job</label>
                    <input type="text" name="job" value="{{ old('job', $user->job) }}" class="w-full border p-2 rounded">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Update About Me</label>
                    <textarea name="about" class="w-full border p-2 rounded">{{ old('about', $user->about) }}</textarea>
                </div>

                <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded">Update Profile</button>
            </form>
        @endif
    </div>
</x-layouts.sidebar>
