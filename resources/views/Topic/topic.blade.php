<x-app-layout>
    <x-slot name="header">
    <div class="py-2 text-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight py-2">
            {{$topic->name}}
        </h2>
        <form class="inline-flex" method="POST" action="{{ route('topics.delete', ['topic'=>$topic->id]) }}">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <x-button_white class="ml-3">
                {{ __('Edit') }}
            </x-button>
        </form>
        <form class="inline-flex" method="POST" action="{{ route('topics.edit', ['topic'=>$topic->id]) }}">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <x-button class="ml-3">
                {{ __('Delete') }}
            </x-button>
        </form>
    </div>
    </x-slot>
     <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {!! $topic->description !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>