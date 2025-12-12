<div class="space-y-6">
    <div class="flex items-center justify-between">
        <flux:heading size="xl">Contacts</flux:heading>
        <div class="flex items-center gap-3">
            <livewire:contact.import />
            <livewire:contact.create />
        </div>
    </div>

    <div class="flex items-center justify-between">
        <flux:input wire:model.live.debounce-250="query" icon="magnifying-glass" placeholder="Search..." class="w-full sm:max-w-xs" />
    </div>

    <div class="relative overflow-x-auto border dark:border-zinc-700 rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-zinc-500 dark:text-zinc-400">
            @if ($contacts->count() > 0)
                <thead class="text-xs text-zinc-700 uppercase bg-zinc-50 dark:bg-zinc-700 dark:text-zinc-400">
                    <tr>
                        <th scope="col" class="px-4 py-2">
                            Name
                        </th>
                        <th scope="col" class="px-4 py-2">
                            Email
                        </th>
                        <th scope="col" class="px-4 py-2">
                            Active Sequences
                        </th>
                        {{-- <th scope="col" class="px-4 py-2">
                            <span class="sr-only">Edit</span>
                        </th> --}}
                    </tr>
                </thead>
            @endif
            <tbody>
                @forelse ($contacts as $contact)
                    <tr @class([
                        "bg-white dark:bg-zinc-800 hover:bg-zinc-50 dark:hover:bg-zinc-700/50",
                        "border-b dark:border-zinc-700 border-zinc-200" => !$loop->last
                    ])>
                        <td>
                            <a href="{{ route('contact.show', ['contact' => $contact]) }}" class="block px-4 py-2.5">
                                {{ $contact->full_name }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('contact.show', ['contact' => $contact]) }}" class="block px-4 py-2.5">
                                {{ $contact->email }}
                            </a>
                        </td>
                        <td class="px-4 py-2.5 space-x-2 space-y-1">
                            <flux:badge size="sm" variant="pill">{{ $contact->activeSequences->count() }}</flux:badge>
                        </td>
                    </tr>
                @empty
                    <tr colspan="4">
                        <div class="text-center space-y-3 p-4 bg-zinc-50 dark:bg-zinc-700">
                            <flux:icon.sparkles class="size-6 mx-auto" />
                            <flux:heading size="lg">No contacts available</flux:heading>
                        </div>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div>{{ $contacts->links() }}</div>
</div>
