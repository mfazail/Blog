<x-app-layout>
    <div class="max-w-7xl mx-auto pt-4">
        @if (session('contact'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('contact') }}
            </div>
        @endif
        <form method="POST" action="{{ route('contact.support') }}">
            @csrf
            <div class="w-full flex flex-wrap">
                <div class="w-full sm:w-2/4 px-2">
                    <x-jet-label for="name" value="{{ __('Name') }}" />
                    <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                        required autofocus />
                </div>
                <div class="w-full sm:w-2/4 px-2">
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        required />
                </div>
            </div>
            <div class="mt-5 w-full px-2">
                <textarea name="description"
                    class="w-full  border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    id="description"></textarea>
            </div>
            <div class="flex justify-end items-center my-5 ">
                <x-jet-button class="ml-4">
                    {{ __('Submit') }}
                </x-jet-button>
            </div>
        </form>
    </div>
</x-app-layout>
