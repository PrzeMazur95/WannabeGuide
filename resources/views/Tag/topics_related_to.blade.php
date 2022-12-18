<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Topics related to: '. $tag->name) }}
        </h2>
    </x-slot>
    <x-slot name="slot">
        @forelse ( $tag->topics as $topic )
        <div class="py-2">
            <a href="{{ url('topics/'.$topic->id) }}">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                       <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                               {{$topic->name}}
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @empty
            <div class="bg-white sm:rounded-lg mx-2 my-2 text-center h-24 w-24 p-4 ...">There are no topics yet</div>
        @endforelse
    </x-slot>
</x-app-layout>