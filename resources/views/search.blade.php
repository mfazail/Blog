<x-app-layout>
    <div class="max-w-7xl mx-auto pt-3 grid gap-3 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
        @forelse ($posts as $post)
            <x-card :post="$post" />
        @empty
            No Post Found
        @endforelse
    </div>
</x-app-layout>
