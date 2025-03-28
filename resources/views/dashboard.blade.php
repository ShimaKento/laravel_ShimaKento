<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900" style="font-size: 30px;">
                    {{ __("You're logged in!") }}
                </div>
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg" style="font-size: 30px;">
                <a href="{{ route('mypost') }}">
                go see my posts</a>
                </div>
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg" style="font-size: 30px;">
                <a href="{{ route('ourpost') }}">Go see everyone's posts</a>
                </div>
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg" style="font-size: 30px;">
                <a href="{{ route('postpage') }}">Go post an article</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
