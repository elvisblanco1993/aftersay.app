<div>
    <flux:callout variant="danger" icon="triangle-alert">
        <flux:callout.heading>Delete template</flux:callout.heading>
        <flux:callout.text>This will permanently remove the template and make it unavailable for all workflows.</br>If you no longer need this template, you can delete it below.</flux:callout.text>
        <x-slot name="actions">
            <flux:button variant="danger" wire:click="delete" wire:confirm="Are you sure you want to delete this template?\nThis action cannot be reversed.">Delete Template</flux:button>
        </x-slot>
    </flux:callout>
</div>
