<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit this topic: {{$topic->name}}
        </h2>
        <h5 class="font-semibold text-xs text-gray-800 leading-tight">
            Actual category: {{$topic->category->name}}
        </h5>
        <h5 class="font-semibold text-xs text-gray-800 leading-tight">
            Actual Tags: 
            @forelse ($topic->tags as $tag)
                {{$tag->name}}
            @empty
                There are no tags yet
            @endforelse
        </h5>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <form method="POST" action="{{ route('topics.update', ['topic'=>$topic->id]) }}">
                    <input type="hidden" name="_method" value="PATCH">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="{{ $topic->id }}">
                    <div class="relative z-0 mb-6 w-full group">
                        <input type="text" name="name" id="name" value="{{ $topic->name }}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Topic tittle</label>
                    </div>
                    <div class="relative z-0 mb-6 w-full group">
                        <textarea id="description" name="description" rows="4" class=" block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write something about it..." required>{{ $topic->description }}</textarea>
                    </div>
                    <select id="category" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected disabled="disabled">Chose new category</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                      <div class="mt-5">
                          <select id="tag" name="tags_id[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-2/6 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" multiple >
                              <option disabled="disabled">Choose new tags from below: </option>
                              @forelse ($tags as $tag)
                                  <option id="{{ $tag->id }}" name="tag_id" value="{{$tag->id}}">{{$tag->name}}</option>
                              @empty
                                  <option>There are no tags</option>
                              @endforelse
                          </select>
                      </div>
                    <x-button class="ml-3">
                    {{ __('Submit') }}
                    </x-button>
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
