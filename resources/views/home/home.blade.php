<x-app-layout>
    <style>
        .owl-prev span,
        .owl-next span {
            position: absolute;
            top: 40%;
            width: 35px;
            height: 35px;
            background: rgba(129, 140, 248, var(--tw-bg-opacity));
            border-radius: 50%;
            border: 4px solid white;
            text-align: center;
            color: white;
            line-height: 25px;
        }

        .owl-next span {
            right: 0;
        }

        .owl-nav {
            display: block !important;
        }

        .owl-prev span {
            left: 0;
        }

    </style>
    <div>
        {{-- Latest Posts --}}
        <h1 class="p-2 font-medium text-3xl text-indigo-400">Latest Posts</h1>
        <div class="owl-carousel owl-theme px-4 border-b">
            @if ($posts->count() > 0 && $posts->count() <= 1)
                @forelse ($posts as $post) <x-card :post="$post" />
            @empty
                <h1>Not Post Found</h1> @endforelse
            @elseif ($posts->count() > 0)
                @for ($i = 0; $i < 2; $i++)
                    <x-card :post="$posts[$i]" />
                @endfor
            @endif

        </div>
        {{-- All posts --}}
        <div class="max-w-7xl mx-auto pb-3">

            <h1 class="p-2 font-medium text-3xl text-indigo-400">All Posts</h1>
            <div class="pt-3 px-2 grid grid-cols-1 sm:grid-cols-2 justify-items-center lg:grid-cols-3 gap-3">
                @forelse ($posts as $post)
                    <x-card :post="$post" />
                @empty
                    <h1>Not Post Found</h1>
                @endforelse
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                dots: false,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                responsive: {
                    // breakpoint from 0 up
                    0: {
                        items: 1,
                    },
                    // breakpoint from 480 up
                    480: {
                        nav: true,
                        items: 2,
                    },
                    // breakpoint from 768 up
                    1024: {
                        nav: true,
                        items: 3,
                        touchDrag: false,
                        freeDrag: true
                    }
                }
            });
        });

    </script>
</x-app-layout>
