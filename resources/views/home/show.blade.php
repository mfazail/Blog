<x-app-layout>
    <style>
        pre {
            overflow: auto;
        }

    </style>
    <img src="{{ asset($post[0]->cover_photo) }}" alt="{{ $post[0]->title }}">
    <h1>{{ $post[0]->title }}</h1>
    <div>{!! $post[0]->content !!}</div>
</x-app-layout>
