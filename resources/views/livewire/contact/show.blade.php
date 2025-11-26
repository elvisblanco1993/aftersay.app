<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <flux:heading size="xl">{{ $contact->full_name ?? $contact->email }}</flux:heading>
            <flux:breadcrumbs>
                <flux:breadcrumbs.item :href="route('contact.index')">Contacts</flux:breadcrumbs.item>
                <flux:breadcrumbs.item>{{ $contact->name ?? $contact->email }}</flux:breadcrumbs.item>
            </flux:breadcrumbs>
        </div>
        <livewire:contact.update :contact="$contact" />
    </div>

    <div class="grid grid-cols-4 gap-6">
        <div class="space-y-2">
            <flux:text>First Name</flux:text>
            <flux:heading>{{ $contact->first_name }}</flux:heading>
        </div>
            <div class="space-y-2">
            <flux:text>Last Name</flux:text>
            <flux:heading>{{ $contact->last_name }}</flux:heading>
        </div>
        <div class="space-y-2">
            <flux:text>Email address</flux:text>
            <flux:heading>{{ $contact->email }}</flux:heading>
        </div>
        <div class="space-y-2">
            <flux:text>Created</flux:text>
            <flux:heading>{{ $contact->created_at->diffForHumans() }}</flux:heading>
        </div>
    </div>

    <flux:separator faint variant="subtle" />

    {{-- Sequences --}}
    <div class="space-y-4">
        <flux:heading size="lg">Sequences</flux:heading>
        <div class="relative overflow-x-auto border dark:border-zinc-700 rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-zinc-500 dark:text-zinc-400">
                @if ($sequences->count() > 0)
                    <thead class="text-xs text-zinc-700 uppercase bg-zinc-50 dark:bg-zinc-700 dark:text-zinc-400">
                        <tr>
                            <th scope="col" class="px-4 py-2">
                                Workflow
                            </th>
                            <th scope="col" class="px-4 py-2">
                                Status
                            </th>
                            <th scope="col" class="px-4 py-2">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                @endif
                <tbody>
                    @forelse ($sequences as $sequence)
                        <tr @class([
                            "bg-white dark:bg-zinc-800 hover:bg-zinc-50 dark:hover:bg-zinc-700/50",
                            "border-b dark:border-zinc-700 border-zinc-200" => !$loop->last
                        ])>
                            <td class="px-4 py-2.5">{{ $sequence?->workflow?->name }}</td>
                            <td class="px-4 py-2.5 space-x-2 space-y-1">
                                <flux:badge size="sm" variant="pill" :color="$sequence->status->color()">{{ $sequence->status->label() }}</flux:badge>
                            </td>
                            <td class="px-4 py-2.5 text-right">
                                @if ($sequence && $sequence->status !== \App\Enums\SequenceStatus::Completed)
                                    <flux:button size="xs" type="button" :icon-trailing="$sequence ? 'rotate-ccw' : 'play'" @click="$dispatch('start-sequence', { contact_id: {{ $sequence->contact_id }} })">
                                        Restart Sequence
                                    </flux:button>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr colspan="4">
                            <div class="text-center space-y-3! card">
                                <flux:icon.megaphone class="size-8 mx-auto" />
                                <flux:text>This is where your sequences will show up. <a href="{{ route('contact.index') }}" class="underline">Go to your contacts</a> to start your first sequence.</flux:text>
                            </div>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div>{{ $sequences->links() }}</div>
    </div>
</div>
