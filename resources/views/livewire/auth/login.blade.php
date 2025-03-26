<div>
    <h2 class="text-2xl font-bold">Login</h2>
    <p class="text-sm mb-6">Welcome back, Don't have an account yet? <a href="{{ route('register') }}"
            class="underline text-blue-600">Sign
            Up</a></p>
    @if (session()->has('error'))
        <div class="bg-red-200 text-red-800 p-2 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif
    <form wire:submit.prevent="login">
        <div class="mb-4">
            <label for="email" class="block text-black font-medium mb-2 text-base">Email</label>
            <input type="email" id="email" wire:model="email"
                class="w-full bg-orange-50 border border-white text-gray-500 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block py-2 px-4"
                placeholder="Enter Your Email">
            @error('email')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-6">
            <label for="password" class="block text-black font-medium mb-2 text-base">Password</label>
            <input type="password" id="password" wire:model="password"
                class="w-full bg-orange-50 border border-white text-gray-500 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block py-2 px-4"
                placeholder="Enter Your Password">
            @error('password')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="w-full bg-orange-500 text-white py-2 rounded">Login</button>
    </form>
</div>
