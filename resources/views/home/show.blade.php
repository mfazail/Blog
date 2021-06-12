<x-app-layout>
    <style>
        pre {
            overflow: auto;
        }

    </style>
    <div class="max-w-7xl mx-auto px-3">
        <h1 class="text-3xl font-semibold text-gray-700">{{ $post[0]->title }}</h1>
        <img class="w-full sm:w-3/5 object-cover object-center" src="{{ asset($post[0]->cover_photo) }}"
            alt="{{ $post[0]->title }}">
        <div class="flex justify-between sm:justify-start space-x-0 sm:space-x-3 items-center">
            <h1>Author - <span class="font-semibold text-gray-600">{{ $post[0]->user->name }}</span></h1>
            <h1>{{ $post[0]->created_at->diffForHumans() }}</h1>
        </div>
        <div>{!! $post[0]->content !!}</div>
    </div>
</x-app-layout>
