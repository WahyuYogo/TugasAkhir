<x-layouts.sidebar>
    <h2>Manage Skills</h2>

    <form method="POST" action="{{ route('skills.store') }}">
        @csrf
        <input type="text" name="name" required placeholder="Enter skill" class="border p-2">
        <button type="submit" class="bg-blue-500 text-white p-2">Add Skill</button>
    </form>

    <ul>
        @foreach ($skills as $skill)
            <li>
                {{ $skill->name }}
                <form method="POST" action="{{ route('skills.destroy', $skill) }}" class="inline">
                    @csrf @method('DELETE')
                    <button type="submit" class="text-red-500">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</x-layouts.sidebar>
