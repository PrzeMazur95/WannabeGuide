<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            List of all topics
        </h2>
    </x-slot>
    @if(Session::has('Topic_added'))
        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
            <span class="font-medium">{{ Session::get('Topic_added')}}</span>
        </div>
    @endif
    @foreach($topics as $topic)
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{$topic->name}}
                </div>
            </div>
        </div>
    </div>
    @endforeach
</x-app-layout>
