<div class="space-y-4">
    <flux:heading size="lg">Just a few things to get your started</flux:heading>
    <flux:callout icon="circle-alert" variant="warning" inline>
        <flux:callout.heading>Add your first contact</flux:callout.heading>
        <flux:callout.text>Before you can request reviews, you’ll need at least one contact. Use the button on the right to add your first contact in the Contacts area.</flux:callout.text>
        <x-slot name="actions">
            <flux:button :href="route('contact.index')" variant="filled">Go to contacts</flux:button>
        </x-slot>
    </flux:callout>

    <flux:callout icon="circle-alert" variant="warning" inline>
        <flux:callout.heading>Review your email templates</flux:callout.heading>
        <flux:callout.text>These are the emails your clients will receive. Take a moment to review them in the Templates area and make any adjustments you need.</flux:callout.text>
        <x-slot name="actions">
            <flux:button :href="route('template.index')" variant="filled">Go to templates</flux:button>
        </x-slot>
    </flux:callout>

    <flux:callout icon="circle-alert" variant="warning" inline>
        <flux:callout.heading>Set up your workflow</flux:callout.heading>
        <flux:callout.text>Workflows control when and how often review emails are sent to your clients. Choose or customize a workflow that fits your process.</flux:callout.text>
        <x-slot name="actions">
            <flux:button :href="route('workflow.index')" variant="filled">Explore workflows</flux:button>
        </x-slot>
    </flux:callout>

    {{-- <flux:callout icon="circle-check" variant="success" inline>
        <flux:callout.heading>Your package is delayed</flux:callout.heading>
        <flux:callout.text>Your package is delayed</flux:callout.text>
        <x-slot name="actions">
            <flux:button disabled variant="filled">Explore templates</flux:button>
        </x-slot>
    </flux:callout> --}}
</div>
