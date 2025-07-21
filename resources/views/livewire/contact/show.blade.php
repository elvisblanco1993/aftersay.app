<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <flux:heading size="xl">{{ $contact->name ?? $contact->email }}</flux:heading>
            <flux:breadcrumbs>
                <flux:breadcrumbs.item :href="route('contact.index')" separator="slash">Contacts</flux:breadcrumbs.item>
                <flux:breadcrumbs.item separator="slash">{{ $contact->name ?? $contact->email }}</flux:breadcrumbs.item>
            </flux:breadcrumbs>
        </div>
        <livewire:contact.update :contact="$contact" />
    </div>
</div>
