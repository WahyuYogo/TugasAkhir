<x-layouts.sidebar>
    <div class="max-w-7xl mx-auto p-6">
        <h2 class="text-2xl font-bold text-center mb-6">Pilih Template Portofolio</h2>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded-lg mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach ($templates as $template)
                <div class="rounded-lg p-4 text-center">
                    <img src="{{ asset('images/' . $template->preview_image) }}"
                        class="mb-4 rounded-lg w-full object-cover">
                    <h3 class="font-semibold text-lg">{{ $template->name }}</h3>

                    <form method="POST" action="{{ url('/template') }}" class="mt-4">
                        @csrf
                        <input type="hidden" name="template_id" value="{{ $template->id }}">
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                            Pilih Template
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</x-layouts.sidebar>
