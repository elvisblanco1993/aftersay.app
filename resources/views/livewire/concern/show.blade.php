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

    <div class="grid grid-cols-4 gap-8">
        <div class="col-span-4 sm:col-span-1">
            <flux:text>Full Name</flux:text>
            <flux:heading>{{ $concern?->contact?->full_name ?? $concern->contact_name ?? '-' }}</flux:heading>
        </div>
        <div class="col-span-4 sm:col-span-1">
            <flux:text>Email</flux:text>
            <flux:heading>{{ $concern?->contact?->email ?? $concern->contact_email ?? '-' }}</flux:heading>
        </div>
        <div class="col-span-4 sm:col-span-1">
            <flux:text>Phone</flux:text>
            <flux:heading>{{ $concern?->contact?->phone ?? '-' }}</flux:heading>
        </div>
        <div class="col-span-4 sm:col-span-1">
            <flux:text>Rating</flux:text>
            <div class="flex items-center">
                @if ($concern->rating === 1)
                    <flux:icon.star variant="mini" color="orange"/>
                    <flux:icon.star variant="mini" class="text-slate-400"/>
                    <flux:icon.star variant="mini" class="text-slate-400"/>
                @endif
                @if ($concern->rating === 2)
                    <flux:icon.star variant="mini" color="orange"/>
                    <flux:icon.star variant="mini" color="orange" />
                    <flux:icon.star variant="mini" class="text-slate-400"/>
                @endif
                @if ($concern->rating === 3)
                    <flux:icon.star variant="mini" color="orange"/>
                    <flux:icon.star variant="mini" color="orange"/>
                    <flux:icon.star variant="mini" color="orange"/>
                @endif
            </div>
        </div>
    </div>

    <flux:separator variant="subtle" />

    {{-- Original concern message --}}
    <div class="space-y-2">
        <flux:text>Concern</flux:text>
        <div class="prose dark:prose-invert max-w-full">
            {{ $concern->content }}
        </div>
    </div>

    {{-- Comments --}}
    @if ($concern->comments->count() > 0)
        <div class="space-y-2">
            <flux:text>Comments</flux:text>

            @forelse ($concern->comments as $comment)
                <div class="prose dark:prose-invert max-w-full">
                    {{ $comment?->message }}
                </div>
            @empty
            @endforelse
        </div>
    @endif
</div>
