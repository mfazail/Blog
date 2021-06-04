<x-app-layout>
    <style>
        li {
            list-style: inside;
        }

    </style>
    <div class="max-w-7xl mx-auto" x-data="data()">
        <form method="POST" action="{{ route('upload_post') }}" enctype="multipart/form-data" class="px-2">
            @csrf
            <div
                class="mb-4 mt-4 flex flex-wrap justify-center sm:justify-start items-center space-x-0 sm:space-x-2 space-y-2 sm:space-y-0 ">
                <div>
                    <x-jet-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')"
                        required autofocus placeholder="Post Title" />
                </div>
                <div>
                    <select name="category" id="category"
                        class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        @forelse ($categories as $category)
                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                        @empty
                            <option value="na">NA</option>
                        @endforelse
                    </select>
                </div>
                <div>
                    <label for="cover_photo"
                        class="cursor-pointer inline-flex items-center px-4 py-3 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                        <x-jet-input id="cover_photo" class="hidden" type="file" name="cover_photo" required
                            x-on:change="addImage" />
                        <span>Upload Cover Photo</span>
                    </label>
                </div>
                <div>
                    <x-jet-button class="py-3" type="button" @click="show = true"
                        x-bind:disabled="previewImage == null">
                        Preview Cover Photo
                    </x-jet-button>
                </div>
            </div>
            <textarea name="content" id="editor"></textarea>
            <div class="flex items-center justify-end mt-4">
                <x-jet-button type="submit" class="ml-4">
                    {{ __('Submit') }}
                </x-jet-button>
            </div>
        </form>

        <div x-on:close.stop="show = false" x-on:keydown.escape.window="show = false"
            x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()"
            x-on:keydown.shift.tab.prevent="prevFocusable().focus()" x-show="show"
            class="jetstream-modal fixed inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50" style="display: none;">
            <div x-show="show" class="fixed inset-0 transform transition-all" x-on:click="show = false"
                x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <div x-show="show"
                class="relative p-3 mb-6 bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm:mx-auto"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                <img class="w-3/5 h-3/5 mx-auto" :src="previewImage" alt="previewImage">
                <h1 x-text="preImageName" class="text-center"></h1>
            </div>
        </div>

        <script src="{{ mix('js/editor.js') }}"></script>
        <script>
            function data() {
                return {
                    show: false,
                    previewImage: null,
                    preImageName: '',
                    editorData: '',
                    focusables() {
                        // All focusable element types...
                        let selector =
                            'a, button, input:not([type=\'hidden\']), textarea, select, details, [tabindex]:not([tabindex=\'-1\'])'

                        return [...$el.querySelectorAll(selector)]
                            // All non-disabled elements...
                            .filter(el => !el.hasAttribute('disabled'))
                    },
                    firstFocusable() {
                        return this.focusables()[0]
                    },
                    lastFocusable() {
                        return this.focusables().slice(-1)[0]
                    },
                    nextFocusable() {
                        return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable()
                    },
                    prevFocusable() {
                        return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable()
                    },
                    nextFocusableIndex() {
                        return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1)
                    },
                    prevFocusableIndex() {
                        return Math.max(0, this.focusables().indexOf(document.activeElement)) - 1
                    },
                    addImage(e) {
                        this.preImageName = e.target.files[0].name;
                        var url = URL.createObjectURL(e.target.files[0]);
                        this.previewImage = url;
                    }
                };
            }

        </script>
    </div>
</x-app-layout>
