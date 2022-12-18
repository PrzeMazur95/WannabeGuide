<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Here we have all tags') }}
        </h2>
    </x-slot>
    <x-slot name="slot">
        @if(Session::has('TAG_DELETED'))
            <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                <span class="font-medium">{{ Session::get('TAG_DELETED')}}</span>
            </div>
        @elseif(Session::has('TAG_ADDED'))
        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
            <span class="font-medium">{{ Session::get('TAG_ADDED')}}</span>
        </div>
        @endif
        <div class="flex flex-wrap align-center">
            @forelse ( $tags as $tag )
                <a href="{{ url('topicsRelatedTo/'.$tag->id) }}">
                    <div class="bg-white sm:rounded-lg mx-2 my-2 text-center h-24 w-24 p-4 ...">
                        <p class="truncate ...">{{ $tag->name }}</p>
                        <p class="text-xs">Topics: {{ $tag->topics->count() }}</p>
                        <form method="POST" action="{{ route('tag.delete', ['tag'=>$tag->id]) }}">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <x-deleteButton>
                                {{ __('x') }}
                            </x-deleteButton>
                        </form>
                    </div>
                </a>
            @empty
                <div class="bg-white sm:rounded-lg mx-2 my-2 text-center h-24 w-24 p-4 ...">There are no tags yet</div>
            @endforelse
        </div>
    </x-slot>
</x-app-layout>