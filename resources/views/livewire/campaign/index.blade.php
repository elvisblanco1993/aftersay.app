<div class="space-y-6">
    <div class="flex items-center justify-between">
        <flux:heading size="xl">Campaigns</flux:heading>
    </div>

    <div class="flex items-center justify-between">
        <flux:input wire:model.live.debounce-250="query" icon="magnifying-glass" placeholder="Search..." class="w-full sm:max-w-xs" />
    </div>

    <div class="relative overflow-x-auto border dark:border-zinc-700 rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-zinc-500 dark:text-zinc-400">
            @if ($campaigns->count() > 0)
                <thead class="text-xs text-zinc-700 uppercase bg-zinc-50 dark:bg-zinc-700 dark:text-zinc-400">
                    <tr>
                        <th scope="col" class="px-4 py-2">
                            Name
                        </th>
                        <th scope="col" class="px-4 py-2">
                            Contact
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
                @forelse ($campaigns as $campaign)
                    <tr @class([
                        "bg-white dark:bg-zinc-800 hover:bg-zinc-50 dark:hover:bg-zinc-700/50",
                        "border-b dark:border-zinc-700 border-zinc-200" => !$loop->last
                    ])>
                        <td class="px-4 py-2.5">
                            {{-- <a href="{{ route('campaign.show', ['campaign' => $campaign]) }}" class="block px-4 py-2.5"> --}}
                                {{ $campaign?->workflow?->name }}
                            {{-- </a> --}}
                        </td>
                        <td class="px-4 py-2.5">
                            {{-- <a href="{{ route('campaign.show', ['campaign' => $campaign]) }}" class="block px-4 py-2.5"> --}}
                                {{ $campaign?->contact?->full_name }}
                            {{-- </a> --}}
                        </td>
                        <td class="px-4 py-2.5 space-x-2 space-y-1">
                            <flux:badge size="sm" variant="pill" :color="$campaign->status->color()">{{ $campaign->status->label() }}</flux:badge>
                        </td>
                        <td class="px-4 py-2.5 text-right">
                            @if ($campaign && $campaign->status !== \App\Enums\CampaignStatus::Completed)
                                <flux:button size="xs" type="button" :icon-trailing="$campaign ? 'rotate-ccw' : 'play'" @click="$dispatch('start-campaign', { contact_id: {{ $campaign->contact_id }} })">
                                    Restart Campaign
                                </flux:button>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr colspan="4">
                        <div class="text-center space-y-3 p-4 bg-zinc-50 dark:bg-zinc-700">
                            <flux:icon.sparkles class="size-6 mx-auto" />
                            <flux:heading size="lg">This is where your campaigns will show up. <a href="{{ route('contact.index') }}" class="underline">Go to your contacts</a> to start your first campaign.</flux:heading>
                        </div>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div>{{ $campaigns->links() }}</div>

    {{-- Campaign Selector --}}
    <livewire:contact.start-campaign />
</div>
