<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex py-4">
                <a href="{{ route('admin.categories.index') }}"
                    class="focus:outline-none text-dark bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-300">Back
                    to Category</a>
            </div>
            <div class="dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg">
                <form action="{{ route('admin.categories.update', $category->id) }}" enctype="multipart/form-data"
                    method="POST">
                    @csrf
                    @method('PUT')
                    <div class="p-12">
                        <div class="mb-6">
                            <label for="default-input"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input value="{{ $category->name }}" name="name" id="name" type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @if ($errors->has('name'))
                                <div class="text-red-600 text-md mt-2">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>
                        <div class="mb-6">
                            <label for="description"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                            <textarea name="description" id="description" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Write your Description...">{{ $category->description }}</textarea>
                            @if ($errors->has('description'))
                                <div class="text-red-600 text-md mt-2">
                                    {{ $errors->first('description') }}
                                </div>
                            @endif
                        </div>
                        <div class="mt-6">
                            <label for="image" id="image"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
                            <div>
                                <img src="{{ Storage::url($category->image) }}" alt="" class="h-24 w-34 ">
                            </div>
                            <input name="image"
                                class="bg-gray-50 mt-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                type="file">
                            @if ($errors->has('image'))
                                <div class="text-red-600 text-md mt-2">
                                    {{ $errors->first('image') }}
                                </div>
                            @endif
                        </div>
                        <div class="flex py-4">
                            <button type="submit"
                                class="focus:outline-none text-dark bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-300">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>
