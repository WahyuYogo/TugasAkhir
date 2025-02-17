<x-layouts.app>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="text-red-500">Logout</button>
    </form>
</x-layouts.app>
