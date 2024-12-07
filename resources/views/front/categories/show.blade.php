<x-guest-layout>
    <div class="container w-full px-5 py-6 mx-auto">
        <div class="grid lg:grid-cols-4 gap-y-6">
            @foreach ($category->menus as $menu)
                <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg">
                    <img class="w-full h-56" src="{{ Storage::url($menu->image) }}" alt="Image" />
                    <div class="px-6 py-4">
                      <h5>{{ $menu->name }}</h5>
                      <p>{{ $menu->description }}</p>
                      <p class="text-green-600 text-xl">$ {{ $menu->price }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-guest-layout>