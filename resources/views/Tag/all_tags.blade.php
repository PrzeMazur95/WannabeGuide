<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Here we have all tags') }}
        </h2>
    </x-slot>
    <div class="flex ...">
        <div class="flex-1 bg-white sm:rounded-lg mx-2 my-2 text-center h-32 w-32 p-4 ...">mysql</div>
        <div class="flex-1 bg-white sm:rounded-lg mx-2 my-2 text-center h-32 w-32 p-4 ...">linux</div>
        <div class="flex-1 bg-white sm:rounded-lg mx-2 my-2 text-center h-32 w-32 p-4 ...">windows</div>
        <div class="flex-1 bg-white sm:rounded-lg mx-2 my-2 text-center h-32 w-32 p-4 ...">php</div>
        <div class="flex-1 bg-white sm:rounded-lg mx-2 my-2 text-center h-32 w-32 p-4 ...">laravel</div>
        <div class="flex-1 bg-white sm:rounded-lg mx-2 my-2 text-center h-32 w-32 p-4 ...">ci</div>
    </div>
</x-app-layout>