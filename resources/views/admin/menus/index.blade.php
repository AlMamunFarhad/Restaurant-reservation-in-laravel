<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (Session::has('success'))
                <div id="alert" class="flex items-center p-4 rounded-lg bg-yellow-100 dark:bg-yellow-100"
                    role="alert">
                    <div class="ms-3 text-md font-medium text-gray-600 dark:gray-600">
                        <p>{{ Session::get('success') }}</p>
                    </div>
                    <button type="button"
                        class="ms-auto -mx-1.5 -my-1.5 text-gray-900 rounded-lg focus:ring-2 focus:ring-yellow-400 p-1.5 inline-flex items-center justify-center h-8 w-8 "
                        data-dismiss-target="#alert" aria-label="Close">
                        <span class="sr-only">Dismiss</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            @endif
            @if (Session::has('delete'))
                <div id="alert" class="flex items-center p-4 rounded-lg bg-red-100 dark:bg-red-100"
                    role="alert">
                    <div class="ms-3 text-md font-medium text-gray-600 dark:gray-600">
                        <p>{{ Session::get('delete') }}</p>
                    </div>
                    <button type="button"
                        class="ms-auto -mx-1.5 -my-1.5 text-gray-900 rounded-lg focus:ring-2 focus:ring-yellow-400 p-1.5 inline-flex items-center justify-center h-8 w-8 "
                        data-dismiss-target="#alert" aria-label="Close">
                        <span class="sr-only">Dismiss</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            @endif
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.menus.create') }}"
                    class="focus:outline-none text-dark bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-300">Add
                    Menu</a>
            </div>
            <div class="dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-12">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-3">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Category
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Description
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Price
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Image
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($menus as $menu)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="px-6 py-4">
                                            {{ $menu->name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $menu->description }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $menu->price }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <img src="{{ Storage::url($menu->image) }}" class="h-16 w-30 rounded" alt="">
                                        </td>
                                        <td class="px-6 py-4 text-right flex">
                           
                                                <a href="{{ route('admin.menus.edit', $menu->id) }}" class="text-gray-900 bg-gray-800 border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Edit</a>

                                                <form action="{{ route('admin.menus.destroy', $menu->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
                                                </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $menus->links() }}
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
