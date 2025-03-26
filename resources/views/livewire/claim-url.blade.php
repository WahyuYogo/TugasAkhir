<div>
    <h2 class="text-2xl font-bold mb-4">Claim URL</h2>

    @if (session()->has('error'))
    <div class="bg-red-200 text-red-800 p-2 rounded mb-4">
        {{ session('error') }}
    </div>
    @endif

    <form wire:submit.prevent="claim">
        <div class="mb-4">
            <label for="slug" class="block text-black font-medium mb-2 text-base">Claim Your URL</label>
            <div class="flex mt-1">
                <span class="bg-gray-200 p-2 rounded-l">mypt.com/</span>
                <input type="text" id="slug" wire:model="slug"
                    class="w-full bg-orange-50 border border-white text-gray-500 text-sm focus:ring-white focus:border-white block py-2 px-4">
            </div>

            @error('slug')
            <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror

            @if ($slug)
            @if ($slugAvailable === true)
            <span class="text-green-600 text-sm"></span>
            @elseif ($slugAvailable === false)
            <span class="text-red-600 text-sm"></span>
            @endif
            @endif
        </div>

        <button type="submit" class="w-full bg-orange-500 text-white py-2 rounded">
            Klaim URL
        </button>
    </form>
</div>