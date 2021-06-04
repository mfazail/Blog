<div class="w-full rounded-md shadow-md bg-white">
    <a href="{{ route('post', $post->slug) }}">
        <img class=" h-72 object-contain object-center" src="{{ $post->cover_photo }}" alt="{{ $post->title }}">
        <div class="flex justify-between items-center text-gray-400 px-2">
            <h1>{{ $post->user->name }}</h1>
            <span class="font-mono">{{ $post->created_at->diffForHumans() }}</span>
        </div>
        <h1 class="text-2xl text-indigo-400 px-2 pb-2 truncate">{{ $post->title }}</h1>
    </a>
</div>
