<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex py-4">
                <a href="{{ route('admin.tables.index') }}"
                    class="focus:outline-none text-dark bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-300">Back
                    to Tables</a>
            </div>
            <div class="dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg">
                <form action="{{ route('admin.tables.update', $table->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="p-12">
                        <div class="mb-6">
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input name="name" id="name" type="text" value="{{ $table->name }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @if ($errors->has('name'))
                                <div class="text-red-600 text-md mt-2">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>
                        <div class="mb-6">
                            <label for="categories"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                            <select name="status" id="status"
                                class="form-multiselect bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach (\App\Enums\TableStatus::cases() as $status)
                                    <option value="{{ $status->value }}" @selected($table->status == $status)>
                                        {{ $status->name }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('status'))
                                <div class="text-red-600 text-md mt-2">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                        </div>
                        <div class="mb-6">
                            <label for="location"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location</label>
                            <select name="location" id="location"
                                class="form-multiselect bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach (\App\Enums\TableLocation::cases() as $location)
                                    <option value="{{ $location->value }}" @selected($table->location == $location)>
                                        {{ $location->name }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('location'))
                                <div class="text-red-600 text-md mt-2">
                                    {{ $errors->first('location') }}
                                </div>
                            @endif
                        </div>
                        <div class="mb-6">
                            <label for="guast_number"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Guest
                                Number</label>
                            <input name="guast_number" id="guast_number" type="number"
                                value="{{ $table->guast_number }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @if ($errors->has('guast_number'))
                                <div class="text-red-600 text-md mt-2">
                                    {{ $errors->first('guast_number') }}
                                </div>
                            @endif
                        </div>
                        <div class="flex py-4">
                            <button type="submit"
                                class="focus:outline-none text-dark bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-300">Update</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>
