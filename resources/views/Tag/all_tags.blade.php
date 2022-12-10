<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Here we have all tags') }}
        </h2>
        <div class="flex flex-wrap align-center">
            @forelse ( $tags as $tag )
                <div class="bg-white sm:rounded-lg mx-2 my-2 text-center h-24 w-24 p-4 ...">
                    <p class="truncate ...">{{ $tag->name }}</p>
                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold px-1 my-6 rounded">
                        <p class="text-sm">x</p>
                    </button>
                </div>
            @empty
                <div class="bg-white sm:rounded-lg mx-2 my-2 text-center h-24 w-24 p-4 ...">There are no tags yet</div>
            @endforelse
        </div>
</x-app-layout>