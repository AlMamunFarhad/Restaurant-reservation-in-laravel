<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex py-4">
                <a href="{{ route('admin.reservations.index') }}"
                    class="focus:outline-none text-dark bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-300">Back
                    to Reservations</a>
            </div>
            <div class="dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg">
                <form action="{{ route('admin.reservations.update', $reservation->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="p-12">
                        <div class="mb-6">
                            <label for="first_name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                            <input name="first_name" id="first_name" type="text" value="{{ $reservation->first_name }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @if ($errors->has('first_name'))
                                <div class="text-red-600 text-md mt-2">
                                    {{ $errors->first('first_name') }}
                                </div>
                            @endif
                        </div>
                        <div class="mb-6">
                            <label for="last_name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
                            <input name="last_name" id="last_name" type="text" value="{{ $reservation->last_name }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @if ($errors->has('last_name'))
                                <div class="text-red-600 text-md mt-2">
                                    {{ $errors->first('last_name') }}
                                </div>
                            @endif
                        </div>
                        <div class="mb-6">
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input name="email" id="email" type="email" value="{{ $reservation->email }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @if ($errors->has('email'))
                                <div class="text-red-600 text-md mt-2">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>
                        <div class="mb-6">
                            <label for="tel_number"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone
                                Number</label>
                            <input name="tel_number" id="tel_number" type="text" value="{{ $reservation->tel_number }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @if ($errors->has('tel_number'))
                                <div class="text-red-600 text-md mt-2">
                                    {{ $errors->first('tel_number') }}
                                </div>
                            @endif
                        </div>
                        <div class="mb-6">
                            <label for="guast_number"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Guast
                                Number</label>
                            <input name="guast_number" id="guast_number" type="number" value="{{ $reservation->guast_number }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @if ($errors->has('guast_number'))
                                <div class="text-red-600 text-md mt-2">
                                    {{ $errors->first('guast_number') }}
                                </div>
                            @endif
                        </div>
                        <div class="mb-6">
                            <label for="res_date"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Reservation Date</label>
                            <input name="res_date" id="res_date" type="datetime-local"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @if ($errors->has('res_date'))
                                <div class="text-red-600 text-md mt-2">
                                    {{ $errors->first('res_date') }}
                                </div>
                            @endif
                        </div>
                        <div class="mb-6">
                            <label for="table_id"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tables</label>
                            <select name="table_id" id="table_id"
                                class="form-multiselect bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach ($tables as $table)
                                    <option value="{{ $table->id }}">{{ $table->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('table_id'))
                            <div class="text-red-600 text-md mt-2">
                                {{ $errors->first('table_id') }}
                            </div>
                        @endif
                        </div>
                        <div class="flex py-4">
                            <button type="submit"
                                class="focus:outline-none text-dark bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-300">Submit</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>
