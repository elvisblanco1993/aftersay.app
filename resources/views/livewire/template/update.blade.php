<div>
    <form wire:submit="save">
        @csrf
        <x-editor wire:model="body" class="prose dark:prose-invert" />
    </form>
</div>
