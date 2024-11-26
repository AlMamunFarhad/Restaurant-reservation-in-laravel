<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark-mode:text-gray-200 leading-tight">
            @if (Auth::user()->is_admin)
                <a href="{{ route('admin.index') }}">Admin</a>
            @else
            {{ __('Dashboard') }}
            @endif
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark-mode:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6  text-gray-900 dark-mode:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
