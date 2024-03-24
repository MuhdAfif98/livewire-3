<div class="mt-10 p-5 mx-auto sm:w-full sm:max-w-sm shadow border-teal-500 border-t-2">
    <div>
        <div class="flex">
            <h2 class="text-center font-semibold text-2x text-gray-800 mb-5">Create New Account</h2>
        </div>
        @if (session('success'))
            <span class="text-green-500">{{ session('success') }}</span>
        @endif
        <form class="p-5" wire:submit='createNewUser'>
            <label class="mt-3 block text-sm font-medium leading-6 text-gray-900">Name</label>
            <input
                class="ring-1 ring-inset ring-gray-300 bg-gray-100 text-gray-900 text-sm rounded block w-full py-1 px-1"
                wire:model='name' type="text" placeholder="Name...">

            @error('name')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror

            <label class="mt-3 block text-sm font-medium leading-6 text-gray-900">Email</label>
            <input
                class="ring-1 ring-inset ring-gray-300 bg-gray-100 text-gray-900 text-sm rounded block w-full py-1 px-1"
                wire:model='email' type="email" placeholder="Email...">

            @error('email')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror

            <label class="mt-3 block text-sm font-medium leading-6 text-gray-900">Password</label>
            <input
                class="ring-1 ring-inset ring-gray-300 bg-gray-100 text-gray-900 text-sm rounded block w-full py-1 px-1"
                wire:model='password' type="password" placeholder="Password...">

            @error('password')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror

            <input wire:model="image" accept="image/png, image/jpeg" type="file" id="image"
                class="my-3 ring-1 ring-inset ring-gray-300 bg-gray-100 text-gray-900 text-sm rounded block w-full">
            @error('image')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror

            @if ($image)
                <img class="rounded w-10 h-10 mt-5 block" src="{{ $image->temporaryUrl() }}" alt="">
            @endif

            <div wire:loading wire:target='image'>
                <span class="text-green-500">Uploading ...</span>
            </div>
            <button class="block rounded px-3 py-1 bg-gray-400 text-white">Create</button>
        </form>
    </div>
</div>
