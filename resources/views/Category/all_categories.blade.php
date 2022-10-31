<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            List of all categories
        </h2>
        <h3>We have: {{$categories->count()}}</h3>
    </x-slot>
    @if(Session::has('CATEGORY_ADDED'))
        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
            <span class="font-medium">{{ Session::get('CATEGORY_ADDED')}}</span>
        </div>
    @endif
    @foreach($categories as $category)
     <div class="py-2">
        <a href="{{ url('category/'.$category->id) }}">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        {{$category->name}}
                    </div>
                </div>
            </div>
        </a>
    </div>
    @endforeach
</x-app-layout>
