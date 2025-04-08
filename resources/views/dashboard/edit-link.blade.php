<x-layouts.sidebar>
    <form action="{{ route('links.update', $Link->id) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="url" name="url" value="{{ old('url', $Link->url) }}" required>

        <button type="submit">Update</button>
    </form>


</x-layouts.sidebar>
