<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <flux:heading size="xl">Contacts</flux:heading>
            <flux:subheading>Manage your outreach contacts</flux:subheading>
        </div>
        <div class="flex items-center gap-3">
            <livewire:contact.import />
            <livewire:contact.create />
        </div>
    </div>

    <div class="flex items-center justify-between">
        <flux:input wire:model.live.debounce-250="query" icon="magnifying-glass" placeholder="Search contacts..." class="w-full sm:max-w-xs" />
    </div>

    <flux:table :paginate="$contacts" wire:poll.30s>
        <flux:table.columns>
            <flux:table.column sortable :sorted="$sortBy === 'name'" :direction="$sortDirection" wire:click="sort('name')">Contact</flux:table.column>
            <flux:table.column>Email</flux:table.column>
            <flux:table.column>Active Sequences</flux:table.column>
            <flux:table.column></flux:table.column>
        </flux:table.columns>

        <flux:table.rows>
            @foreach ($contacts as $contact)
                <flux:table.row :key="$contact->id">
                    <flux:table.cell>
                        <a href="{{ route('contact.show', ['contact' => $contact]) }}" class="flex items-center gap-3">
                            <flux:avatar size="xs" name="{{ $contact->full_name }}" />
                            <span>{{ $contact->full_name }}</span>
                        </a>
                    </flux:table.cell>

                    <flux:table.cell class="whitespace-nowrap">
                        <a class="flex" href="{{ route('contact.show', ['contact' => $contact]) }}">{{ $contact->email }}</a>
                    </flux:table.cell>
                    <flux:table.cell class="whitespace-nowrap">
                        <a class="flex" href="{{ route('contact.show', ['contact' => $contact]) }}">{{ $contact->activeSequences->count() }}</a>
                    </flux:table.cell>
                    <flux:table.cell class="flex justify-end">
                        <flux:dropdown position="bottom" align="end">
                            <flux:button variant="ghost" size="sm" icon="ellipsis-horizontal" inset="top bottom"></flux:button>

                            <flux:navmenu>
                                <flux:navmenu.item href="{{ route('sequence.index', ['query' => $contact->full_name]) }}" icon="megaphone">View sequences</flux:navmenu.item>
                                <flux:navmenu.item href="#" icon="trash" variant="danger">Delete</flux:navmenu.item>
                            </flux:navmenu>
                        </flux:dropdown>
                    </flux:table.cell>
                </flux:table.row>
            @endforeach
        </flux:table.rows>
    </flux:table>
</div>
