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

    <div class="grid grid-cols-3 gap-8">
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
            <flux:text>Phone</flux:text>
            <flux:heading>{{ $contact->phone }}</flux:heading>
        </div>
        <div class="space-y-2">
            <flux:text>Campaign Status</flux:text>
            <flux:badge :color="$contact?->campaign?->status?->color() ?? 'gray'">{{ $contact?->campaign?->status?->label() ?? 'New' }}</flux:badge>
        </div>
        <div class="space-y-2">
            <flux:text>Created</flux:text>
            <flux:heading>{{ $contact->created_at->diffForHumans() }}</flux:heading>
        </div>
    </div>
</div>
