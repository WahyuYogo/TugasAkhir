<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold">Register</h2>
        <p class="text-sm mb-6">Welcome, Have an account yet? <a href="{{ route('login') }}"
                class="underline text-blue-600">Sign
                in</a></p>
        <form wire:submit.prevent="register">
            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block text-black font-medium mb-2 text-base">Name</label>
                <input type="text" id="name" wire:model.defer="name"
                    class="w-full bg-orange-50 border border-white text-gray-500 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block py-2 px-4"
                    placeholder="Your Name">
                @error('name')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-black font-medium mb-2 text-base">Email</label>
                <input type="email" id="email" wire:model.defer="email"
                    class="w-full bg-orange-50 border border-white text-gray-500 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block py-2 px-4"
                    placeholder="you@example.com">
                @error('email')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-black font-medium mb-2 text-base">Password</label>
                <input type="password" id="password" wire:model.defer="password"
                    class="w-full bg-orange-50 border border-white text-gray-500 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block py-2 px-4"
                    placeholder="••••••••">
                @error('password')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <!-- Password Confirmation -->
            <div class="mb-6">
                <label for="password_confirmation" class="block text-black font-medium mb-2 text-base">Confirm
                    Password</label>
                <input type="password" id="password_confirmation" wire:model.defer="password_confirmation"
                    class="w-full bg-orange-50 border border-white text-gray-500 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block py-2 px-4"
                    placeholder="••••••••">
            </div>
            <button type="submit"
                class="w-full text-white bg-orange-500 hover:bg-orange-700 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Register</button>
        </form>
    </div>
</div>
