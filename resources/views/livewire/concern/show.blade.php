<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <flux:heading size="xl">{{ $concern->contact_name ?: $concern->contact_email }}</flux:heading>
            <flux:breadcrumbs>
                <flux:breadcrumbs.item :href="route('concern.index')">Concerns</flux:breadcrumbs.item>
                <flux:breadcrumbs.item>{{ $concern->contact_name ?: $concern->contact_email }}</flux:breadcrumbs.item>
            </flux:breadcrumbs>
        </div>
        <livewire:concern.resolve :concern="$concern" />
    </div>

    <flux:separator variant="subtle" />

    {{-- Messages --}}
    <div class="space-y-2">
        <flux:heading size="lg">Message</flux:heading>
        <div class="prose dark:prose-invert max-w-full">
            {{ $concern->content }}
        </div>
    </div>
</div>
