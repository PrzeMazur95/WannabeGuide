<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            List of all topics
        </h2>
    </x-slot>
    @if(Session::has('TOPIC_ADDED'))
        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
            <span class="font-medium">{{ Session::get('TOPIC_ADDED')}}</span>
        </div>
    @elseif(Session::has('TOPIC_DELETED'))
        <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
            <span class="font-medium">{{ Session::get('TOPIC_DELETED')}}</span>
        </div>
     @elseif(Session::has('TOPIC_UPDATED'))
        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
             <span class="font-medium">{{ Session::get('TOPIC_UPDATED')}}</span>
        </div>
    @endif
    @forelse ($topics as $topic)
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
    <div class="py-2">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                 <div class="p-6 bg-white border-b border-gray-200">
                     There are no topics yet
                 </div>
             </div>
         </div>
    </div>
    @endforelse
</x-app-layout>
