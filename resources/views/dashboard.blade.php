<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                 <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                 <div class="relative">
                     <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                         <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                     </div>
                     <input type="search" id="topic-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for some topic...">
                 </div>
            </div>
        </div>
    </div>
    <div class="grid grid-rows-3 grid-flow-col gap-4">
  <div class="row-span-3 bg-white overflow-hidden shadow-sm sm:rounded-lg sm:px-6 lg:px-8 p-6 mx-2 ...">01</div>
  <div class="col-span-2 bg-white overflow-hidden shadow-sm sm:rounded-lg sm:px-6 lg:px-8 p-6 mx-2 ...">02</div>
  <div class="row-span-2 bg-white overflow-hidden shadow-sm sm:rounded-lg col-span-2 sm:px-6 lg:px-8 p-6 mx-2 ...">03</div>
</div>
@section('script')
<script>
    $(document).ready(function() {
        $(document).on('keyup', '#topic-search', function (e) {
            e.preventDefault();
            alert($( this ).val());
        });
    });
</script>
@endsection
</x-app-layout>
