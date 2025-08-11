<div class="space-y-6">
    <div class="flex items-center justify-between">
        <flux:heading size="xl">Templates</flux:heading>
        {{-- <livewire:contact.create /> --}}
    </div>

    <div class="flex items-center justify-between">
        <flux:input wire:model.live.debounce-250="query" icon="magnifying-glass" placeholder="Search..." class="w-full sm:max-w-xs" />
    </div>

    <div class="relative overflow-x-auto border dark:border-zinc-700 rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-zinc-500 dark:text-zinc-400">
            <thead class="text-xs text-zinc-700 uppercase bg-zinc-50 dark:bg-zinc-700 dark:text-zinc-400">
                <tr>
                    <th scope="col" class="px-4 py-2">
                        Name
                    </th>
                    <th scope="col" class="px-4 py-2">
                        Type
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($templates as $template)
                    <tr @class([
                        "bg-white dark:bg-zinc-800 hover:bg-zinc-50 dark:hover:bg-zinc-700/50",
                        "border-b dark:border-zinc-700 border-zinc-200" => !$loop->last
                    ])>
                        <td>
                            <a href="{{ route('template.update', ['template' => $template]) }}" class="block px-4 py-2.5">
                                {{ $template->name }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('template.update', ['template' => $template]) }}" class="block px-4 py-2.5">
                                <flux:badge size="sm" color="{{ \App\Enums\TemplateType::tryFrom($template->type)->color() }}">{{ \App\Enums\TemplateType::tryFrom($template->type)->label() }}</flux:badge>
                            </a>
                        </td>
                    </tr>
                @empty
                    
                @endforelse
            </tbody>
        </table>
    </div>

    <div>{{ $templates->links() }}</div>
</div>
