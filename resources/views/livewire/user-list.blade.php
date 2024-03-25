<div wire:poll.keep-alive.10s class="mt-10 p-5 sm:w-full">
    <div class="flex items-center">
        <h2 class="text-center font-semibold text-2xl text-gray-800 mb-5">User lists <span
                class="inline-flex items-center rounded-md bg-purple-50 px-2 py-1 text-xs font-medium text-purple-700 ring-1 ring-inset ring-purple-700/10">{{ $count }}</span>
        </h2>
    </div>
    <input type="text" wire:model.live.debounce.500ms='search' placeholder="Search..."
        class="ring-1 ring-inset ring-gray-300 bg-gray-100 text-gray-900 text-sm rounded px-5 py-2">
    <div class="relative overflow-x-auto shadow-sm">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Joined
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($this->users as $user)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $user->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $user->email }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->created_at }}
                        </td>
                        <td>
                            <button class="bg-sky-500 hover:bg-sky-700 text-white px-3 py-2 rounded">
                                View
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-3">
        {{ $this->users->links() }}
    </div>
</div>
