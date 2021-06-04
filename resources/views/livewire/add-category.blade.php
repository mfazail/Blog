<div class="w-full">
    <form wire:submit.prevent="addCategory" class="flex justify-between w-full">
        <div>
            <x-jet-input wire:model="category" placeholder="Category" id="category" class="block mt-1 w-full"
                type="text" name="category" :value="old('category')" required autofocus />
        </div>
        <div class="flex justify-end py-1">
            <x-jet-button class="ml-4">
                {{ __('Add') }}
            </x-jet-button>
        </div>
        @if (session()->has('category'))
            <div class="alert alert-success bg-blue-100 border-l-2 border-blue-500 text-blue-700 px-4 py-3"
                role="alert">
                {{ session('category') }}
            </div>
        @endif
    </form>
</div>
