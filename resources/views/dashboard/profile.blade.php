<x-layouts.sidebar>
    <div class="max-w-4xl mx-auto my-10 p-6 bg-white shadow-md rounded-lg">
        <h2 class="text-2xl font-bold mb-4">Edit Profile</h2>

        @if (session('success'))
            <div class="text-green-500">{{ session('success') }}</div>
        @endif

        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium">Profile Image</label>
                <input type="file" name="profile_image" class="block w-full mt-1">
                @if ($profile && $profile->profile_image)
                    <img src="{{ asset('storage/' . $profile->profile_image) }}" class="h-20 mt-2">
                @endif
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium">Name</label>
                <input type="text" name="name" value="{{ old('name', $profile->name ?? '') }}"
                    class="w-full p-2 border rounded">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium">Role</label>
                <input type="text" name="role" value="{{ old('role', $profile->role ?? '') }}"
                    class="w-full p-2 border rounded">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium">About Me</label>
                <textarea name="about" class="w-full p-2 border rounded">{{ old('about', $profile->about ?? '') }}</textarea>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Profile</button>
        </form>
    </div>
</x-layouts.sidebar>
