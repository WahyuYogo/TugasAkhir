<x-layouts.sidebar>
    <div class="max-w-xl mx-auto p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Kelola Skill</h2>

        {{-- Alert success/error --}}
        @if (session('success'))
            <div class="mb-4 p-4 text-green-700 bg-green-100 rounded-lg">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="mb-4 p-4 text-red-700 bg-red-100 rounded-lg">
                {{ session('error') }}
            </div>
        @endif

        {{-- Form Tambah Skill --}}
        <form method="POST" action="{{ route('skills.store') }}" class="flex items-center gap-4 mb-6">
            @csrf
            <input 
                type="text" 
                name="name" 
                required 
                placeholder="Masukkan skill baru" 
                class="flex-1 border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-orange-500"
            >
            <button 
                type="submit" 
                class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-md shadow"
            >
                Tambah
            </button>
        </form>

        {{-- List Skill --}}
        <ul class="space-y-3">
            @foreach ($skills as $skill)
                <li class="flex justify-between items-center bg-gray-50 p-3 rounded-md border border-gray-200">
                    <span class="text-gray-800 font-medium">{{ $skill->name }}</span>
                    <form method="POST" action="{{ route('skills.destroy', $skill) }}" class="inline">
                        @csrf 
                        @method('DELETE')
                        <button 
                            type="submit" 
                            class="text-red-500 hover:text-red-700 text-sm font-semibold"
                        >
                            Hapus
                        </button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
</x-layouts.sidebar>
