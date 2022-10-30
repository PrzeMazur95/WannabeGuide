<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            List of all topics belongs to this category : 
            <h3> {{$category->name}}</h3>
        </h2>
    </x-slot>
    @forelse($category->topics as $topic)
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
                <div class="p-6 bg-red-100 border-b border-gray-200">
                    <p>There are no topics in this category</p>
                </div>
            </div>
         </div>
    </div>
    @endforelse
</x-app-layout>
