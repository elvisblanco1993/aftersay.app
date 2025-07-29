<div class="space-y-6">
    <div class="flex items-center justify-between">
        <flux:heading size="xl">Contacts</flux:heading>
        <livewire:contact.create />
    </div>

    <div class="flex items-center justify-between">
        <flux:input wire:model="query" icon="magnifying-glass" placeholder="Search..." class="max-w-xs" />
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-zinc-500 dark:text-zinc-400">
            <thead class="text-xs text-zinc-700 uppercase bg-zinc-50 dark:bg-zinc-700 dark:text-zinc-400">
                <tr>
                    <th scope="col" class="px-4 py-2">
                        Name
                    </th>
                    <th scope="col" class="px-4 py-2">
                        Email
                    </th>
                    <th scope="col" class="px-4 py-2">
                        Phone
                    </th>
                    <th scope="col" class="px-4 py-2">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($contacts as $contact)
                    <tr @class([
                        "bg-white dark:bg-zinc-800 hover:bg-zinc-50 dark:hover:bg-zinc-700/50",
                        "border-b dark:border-zinc-700 border-zinc-200" => !$loop->last
                    ])>
                        <td>
                            <a href="{{ route('contact.show', ['contact' => $contact]) }}" class="block px-4 py-2.5">
                                {{ $contact->name }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('contact.show', ['contact' => $contact]) }}" class="block px-4 py-2.5">
                                {{ $contact->email }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('contact.show', ['contact' => $contact]) }}" class="block px-4 py-2.5">
                                {{ $contact->phone }}
                            </a>
                        </td>
                        <td class="px-4 py-2.5 text-right">
                            <x-button size="xs" type="button" @click="$dispatch('start-campaign', { contact_id: {{ $contact->id }} })">
                                @if ($contact->workflowInstance)
                                    Reset Campaign
                                @else
                                    Start Campaign
                                @endif
                            </x-button>
                        </td>
                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </div>

    <div>{{ $contacts->links() }}</div>


    {{-- Campaign Selector --}}
    <livewire:contact.start-campaign />
</div>
