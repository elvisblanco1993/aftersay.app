<div>
    @forelse ($steps as $step)
        
    @empty
        <flux:callout color="violet">
            <flux:callout.heading icon="lightbulb">{{ __("Let’s get this workflow moving!") }}</flux:callout.heading>
            <flux:callout.text>{{ __("This workflow doesn’t have any steps yet. Start by adding an action — like sending an email, scheduling a text, or waiting a few days. You’re in control of how things flow.") }}</flux:callout.text>
        </flux:callout>
    @endforelse
</div>
