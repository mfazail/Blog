<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2 space-y-2">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-2">
                <a href="{{ route('new_post') }}">New Post</a>
            </div>
            <div class="flex justify-start items-center bg-white overflow-hidden shadow-xl sm:rounded-lg p-2">
                @livewire('add-category')
            </div>
        </div>
    </div>
</x-app-layout>
