<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Here we have all tags') }}
        </h2>
        <div class="flex flex-wrap align-center">
            @forelse ( $tags as $tag )
                <div class="bg-white sm:rounded-lg mx-2 my-2 text-center h-24 w-24 p-4 ...">
                    <p class="truncate ...">{{ $tag->name }}</p>
                    <form method="POST" action="{{ route('tag.delete', ['tag'=>$tag->id]) }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <x-deleteButton>
                            {{ __('x') }}
                        </x-deleteButton>
                    </form>
                </div>
            @empty
                <div class="bg-white sm:rounded-lg mx-2 my-2 text-center h-24 w-24 p-4 ...">There are no tags yet</div>
            @endforelse
        </div>
</x-app-layout>