<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
    <div class="grid grid-rows-3 grid-flow-col gap-4">
  <div class="row-span-3 bg-white overflow-hidden shadow-sm sm:rounded-lg sm:px-6 lg:px-8 p-6 mx-2 ...">01</div>
  <div class="col-span-2 bg-white overflow-hidden shadow-sm sm:rounded-lg sm:px-6 lg:px-8 p-6 mx-2 ...">02</div>
  <div class="row-span-2 bg-white overflow-hidden shadow-sm sm:rounded-lg col-span-2 sm:px-6 lg:px-8 p-6 mx-2 ...">03</div>
</div>
</x-app-layout>
