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
                    <img class="rounded w-10 h-10 my-5 block" src="{{ $image->temporaryUrl() }}" alt="">
                @endif

                <div wire:loading.delay wire:target="image">
                    <button type="button" class="flex rounded px-3 py-1 bg-blue-400 text-white" disabled>
                        <svg width="24" height="24" class="animate-spin h-5 w-5 mr-3 ..." viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <style>
                                .spinner_Wezc {
                                    transform-origin: center;
                                    animation: spinner_Oiah .75s step-end infinite
                                }

                                @keyframes spinner_Oiah {
                                    8.3% {
                                        transform: rotate(30deg)
                                    }

                                    16.6% {
                                        transform: rotate(60deg)
                                    }

                                    25% {
                                        transform: rotate(90deg)
                                    }

                                    33.3% {
                                        transform: rotate(120deg)
                                    }

                                    41.6% {
                                        transform: rotate(150deg)
                                    }

                                    50% {
                                        transform: rotate(180deg)
                                    }

                                    58.3% {
                                        transform: rotate(210deg)
                                    }

                                    66.6% {
                                        transform: rotate(240deg)
                                    }

                                    75% {
                                        transform: rotate(270deg)
                                    }

                                    83.3% {
                                        transform: rotate(300deg)
                                    }

                                    91.6% {
                                        transform: rotate(330deg)
                                    }

                                    100% {
                                        transform: rotate(360deg)
                                    }
                                }
                            </style>
                            <g class="spinner_Wezc">
                                <circle cx="12" cy="2.5" r="1.5" opacity=".14" />
                                <circle cx="16.75" cy="3.77" r="1.5" opacity=".29" />
                                <circle cx="20.23" cy="7.25" r="1.5" opacity=".43" />
                                <circle cx="21.50" cy="12.00" r="1.5" opacity=".57" />
                                <circle cx="20.23" cy="16.75" r="1.5" opacity=".71" />
                                <circle cx="16.75" cy="20.23" r="1.5" opacity=".86" />
                                <circle cx="12" cy="21.5" r="1.5" />
                            </g>
                        </svg>
                        Processing...
                    </button>
                </div>

                <button type="button" wire:click.prevent='reloadList' class="my-2 block rounded px-3 py-1 bg-green-400 text-white">
                    Reload List
                </button>

                <button wire:loading.class.remove='bg-blue-400' wire:loading.attr="disabled" type="submit"
                    class="block rounded px-3 py-1 bg-blue-400 text-white">Create +
                </button>
            </form>
        </div>
    </div>
