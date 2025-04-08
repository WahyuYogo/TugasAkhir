<x-layouts.sidebar>
    <div class="w-full mx-auto p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-lg font-semibold text-gray-700">Your Social Links</h2>

        <!-- Form Tambah Social Link -->
        <form action="{{ route('links.store') }}" method="POST" class="mt-4">
            @csrf
            <label for="social-link" class="block text-sm font-medium text-gray-700">Add New Link</label>
            <div class="relative flex items-center mt-2">
                <!-- Ikon Platform -->
                <div class="absolute left-3">
                    <svg id="social-icon" class="w-6 h-6 text-gray-500" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M12.3 1.8a5.3 5.3 0 0 1 7.5 7.5l-2.9 2.9a5.3 5.3 0 0 1-7.5 0l-.9-.9a.8.8 0 1 1 1.2-1.2l.9.9a3.7 3.7 0 0 0 5.3 0l2.9-2.9a3.7 3.7 0 0 0-5.3-5.3l-.9.9a.8.8 0 1 1-1.2-1.2l.9-.9Zm-4.6 16.4a5.3 5.3 0 0 1-7.5-7.5l2.9-2.9a5.3 5.3 0 0 1 7.5 0l.9.9a.8.8 0 1 1-1.2 1.2l-.9-.9a3.7 3.7 0 0 0-5.3 0l-2.9 2.9a3.7 3.7 0 0 0 5.3 5.3l.9-.9a.8.8 0 1 1 1.2 1.2l-.9.9Z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <!-- Input Link -->
                <input type="url" id="social-link" name="url" required
                    class="pl-10 p-2 w-full border rounded-md focus:ring-orange-500 focus:border-orange-500"
                    placeholder="Enter your social media URL" oninput="updateSocialPreview(this.value)">
            </div>
            <!-- Tombol Submit -->
            <button type="submit" class="mt-4 w-full bg-orange-500 text-white p-2 rounded-lg hover:bg-orange-600">
                Add Social Link
            </button>
        </form>

        <!-- Daftar Link -->
        <div class="mt-6">
            <table class="w-full text-sm text-left rtl:text-right text-black border border-gray-200 rounded-lg">
                <thead class="text-xs text-black uppercase bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-4 py-3 border-r border-gray-200">No</th>
                        <th class="px-4 py-3 border-r border-gray-200">Platform</th>
                        <th class="px-4 py-3 border-r border-gray-200">Username</th>
                        <th class="px-4 py-3 border-r border-gray-200">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($socialLinks as $index => $link)
                        <tr class="bg-white border-b border-gray-200">
                            <td class="px-4 py-3 border-r border-gray-200">{{ $index + 1 }}</td>
                            <td class="px-4 py-3 border-r border-gray-200 flex items-center space-x-3">
                                <img src="https://www.google.com/s2/favicons?domain={{ parse_url($link->url, PHP_URL_HOST) }}&sz=32"
                                    class="w-6 h-6" alt="Icon">
                                <span>{{ parse_url($link->url, PHP_URL_HOST) }}</span>
                            </td>
                            <td class="px-4 py-3 border-r border-gray-200">{{ getUsernameFromUrl($link->url) }}</td>
                            <td class="px-4 py-3 border-r border-gray-200">
                                <a href="{{ route('links.edit', $link->id) }}"
                                    class="px-3 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600">Edit</a>

                                <form action="{{ route('links.destroy', $link->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure?')"
                                        class="px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-600">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function updateSocialPreview(url) {
            if (!url) return;

            try {
                let hostname = new URL(url).hostname.replace("www.", ""); // Ambil domain tanpa 'www.'
                let faviconUrl = `https://www.google.com/s2/favicons?domain=${hostname}&sz=64`; // API Favicon Google

                document.getElementById("social-icon").src = faviconUrl;
            } catch (e) {
                console.error("Invalid URL");
            }
        }
    </script>
</x-layouts.sidebar>
