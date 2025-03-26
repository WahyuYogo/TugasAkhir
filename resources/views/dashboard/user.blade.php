<x-layouts.sidebar>
    <h1>Welcome, {{ Auth::user()->name }}!</h1>
    <h1 class="font-semibold text-gray-900 text-2xl mb-3">Statistics</h1>
    <div class="grid grid-cols-3 gap-4 mb-4">
        <div class="max-w-sm py-4 px-6 bg-orange-300 border border-orange-500 rounded-xl shadow-sm">
            <p class="font-semibold text-gray-900">Today</p>
            <a href="#">
                <h5 class="text-5xl font-normal tracking-tight text-gray-900">{{ $today }}</h5>
            </a>
            <p class="font-semibold text-gray-900">Views</p>
            </a>
        </div>
        <div class="max-w-sm py-4 px-6 bg-white border border-gray-200 rounded-xl shadow-sm">
            <p class="font-semibold text-gray-900">This Weak</p>
            <a href="#">
                <h5 class="text-5xl font-normal tracking-tight text-gray-900">{{$week}}</h5>
            </a>
            <p class="font-semibold text-gray-900">Views</p>
            </a>
        </div>
        <div class="max-w-sm py-4 px-6 bg-white border border-gray-200 rounded-xl shadow-sm">
            <p class="font-semibold text-gray-900">This Month</p>
            <a href="#">
                <h5 class="text-5xl font-normal tracking-tight text-gray-900">{{$month}}</h5>
            </a>
            <p class="font-semibold text-gray-900">Views</p>
            </a>
        </div>
    </div>

    <div class="flex items-center justify-between mt-6 mb-3">
        <h1 class="font-semibold text-gray-900 text-2xl mb-3 mt-6">Projects</h1>
        <button type="button"
            class="ms-auto text-white bg-orange-500 hover:bg-orange-700 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-4 py-2 focus:outline-none ">Add Project</button>
    </div>
    <div class="relative overflow-x-auto sm:rounded-lg border border-gray-200">
        <table class="w-full text-sm text-left rtl:text-right text-black">
            <thead class="text-xs text-black uppercase bg-white border-b border-gray-200">
                <tr>
                    <th scope="col" class="px-6 py-3 border-r border-gray-200">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3 border-r border-gray-200">
                        Image
                    </th>
                    <th scope="col" class="px-6 py-3 border-r border-gray-200">
                        Title
                    </th>
                    <th scope="col" class="px-6 py-3 border-r border-gray-200">
                        Description
                    </th>
                    <th scope="col" class="px-6 py-3 border-r border-gray-200">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b border-gray-200">
                    <td class="px-6 py-4 border-r border-gray-200">
                        {{-- {{ $loop->iteration }} --}}1
                    </td>
                    <th scope="row"
                        class="px-6 py-4 border-r border-gray-200 font-medium text-black whitespace-nowrap">
                        <img src="https://source.unsplash.com/random/800x600" alt="Image">
                    </th>
                    <td class="px-6 py-4 border-r border-gray-200">
                        Silver
                    </td>
                    <td class="px-6 py-4 border-r border-gray-200">
                        Laptop
                    </td>
                    <td class="px-6 py-4 border-r border-gray-200">
                        <a href="#" class="font-medium text-black hover:underline">Edit</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="flex items-center justify-between mt-6 mb-3">
        <h1 class="font-semibold text-gray-900 text-2xl mb-3 mt-6">ShortLink</h1>
        <button type="button"
            class="ms-auto text-white bg-orange-500 hover:bg-orange-700 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-4 py-2 focus:outline-none ">Add
            Link</button>
    </div>
    <div class="relative overflow-x-auto sm:rounded-lg border border-gray-200">
        <table class="w-full text-sm text-left rtl:text-right text-black">
            <thead class="text-xs text-black uppercase bg-white border-b border-gray-200">
                <tr>
                    <th scope="col" class="px-6 py-3 border-r border-gray-200">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3 border-r border-gray-200">
                        Link
                    </th>
                    <th scope="col" class="px-6 py-3 border-r border-gray-200">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b border-gray-200">
                    <td class="px-6 py-4 border-r border-gray-200">
                        {{-- {{ $loop->iteration }} --}}
                    </td>
                    <th scope="row"
                        class="px-6 py-4 border-r border-gray-200 font-medium text-black whitespace-nowrap">
                        Facebook.com
                    </th>
                    <td class="px-6 py-4 border-r border-gray-200">
                        <a href="#" class="font-medium text-black hover:underline">Edit</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</x-layouts.sidebar>
