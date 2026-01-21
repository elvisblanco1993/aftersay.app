<div>
    <flux:modal.trigger name="new-article">
    <flux:button variant="primary">Generate New Article</flux:button>
</flux:modal.trigger>

<flux:modal name="new-article" class="md:w-96">
    <form wire:submit="generateArticle">
        @csrf
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">New article</flux:heading>
                <flux:text class="mt-2">Make changes to your personal details.</flux:text>
            </div>
    
            <flux:input wire:model="topic" label="Topic" />
            <flux:input wire:model="keyword" label="Primary keyword" />
        
            <div class="flex">
                <flux:spacer />
    
                <flux:button type="submit" variant="primary">Save changes</flux:button>
            </div>
        </div>
    </form>
</flux:modal>
</div>
