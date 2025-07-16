<div class="space-y-6">
    <div class="flex items-center justify-between">
        <flux:heading size="xl">Contacts</flux:heading>
        <livewire:contact.create />
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-zinc-500 dark:text-zinc-400">
            <thead class="text-xs text-zinc-700 uppercase bg-zinc-50 dark:bg-zinc-700 dark:text-zinc-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Phone
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($contacts as $contact)
                    <tr @class([
                        "bg-white dark:bg-zinc-800 hover:bg-zinc-50 dark:hover:bg-zinc-600",
                        "border-b dark:border-zinc-700 border-zinc-200" => !$loop->last
                    ])>
                        <td class="px-6 py-4">
                            {{ $contact->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $contact->email }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $contact->phone }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        </td>
                    </tr>
                @empty
                    
                @endforelse
            </tbody>
        </table>
    </div>

    <div>{{ $contacts->links() }}</div>
</div>
