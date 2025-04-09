<x-layouts.sidebar>

    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow">
        <h2 class="text-xl font-semibold mb-4">Create Your Profile</h2>
    
        @if (session('success'))
            <div class="p-4 mb-4 text-green-700 bg-green-100 rounded-lg">
                {{ session('success') }}
            </div>
        @endif
    
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
    </div>
</x-layouts.sidebar>
