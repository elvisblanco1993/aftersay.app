<div class="space-y-6">
    <div class="flex items-center justify-between">
        <flux:heading size="xl">Concerns</flux:heading>
        {{-- <livewire:concern.create /> --}}
    </div>

    <div class="flex items-center justify-between">
        <flux:input wire:model.live.debounce-250="query" icon="magnifying-glass" placeholder="Search..." class="w-full sm:max-w-xs" />
    </div>

        <div class="relative overflow-x-auto border dark:border-zinc-700 rounded-xl">
        <table class="w-full text-sm text-left rtl:text-right text-zinc-500 dark:text-zinc-400">
            @if ($concerns->count() > 0)
                <thead class="text-xs text-zinc-700 uppercase bg-zinc-50 dark:bg-zinc-700 dark:text-zinc-400">
                    <tr>
                        <th scope="col" class="px-4 py-2">
                            From
                        </th>
                        <th scope="col" class="px-4 py-2">
                            Contact
                        </th>
                        <th scope="col" class="px-4 py-2">
                            Status
                        </th>
                    </tr>
                </thead>
            @endif
            <tbody>
                @forelse ($concerns as $concern)
                    <tr @class([
                        "bg-white dark:bg-zinc-800 hover:bg-zinc-50 dark:hover:bg-zinc-700/50",
                        "border-b dark:border-zinc-700 border-zinc-200" => !$loop->last
                    ])>
                        <td>
                            <a href="{{ route('concern.show', ['concern' => $concern]) }}" class="block px-4 py-2.5">
                                {{ $concern->contact_name ?? $concern->contact_email }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('concern.show', ['concern' => $concern]) }}" class="block px-4 py-2.5">
                                {{ $concern->contact?->full_name ?: '-' }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('concern.show', ['concern' => $concern]) }}" class="block px-4 py-2.5">
                               <flux:badge size="sm" :color="$concern->status->color()" variant="pill">{{ $concern->status->label() }}</flux:badge>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr colspan="4">
                        <div class="text-center space-y-3 card">
                            <flux:icon.sparkles class="size-6 mx-auto" />
                            <flux:heading size="lg">No concerns reported</flux:heading>
                        </div>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div>{{ $concerns->links() }}</div>
</div>
