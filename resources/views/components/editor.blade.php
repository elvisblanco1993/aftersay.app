<div x-data="setupEditor(
    $wire.entangle('{{ $attributes->wire('model')->value() }}')
)" x-init="() => init($refs.editor)" wire:ignore {{ $attributes->whereDoesntStartWith('wire:model') }}>

    {{-- Editor Controls --}}
    <flux:button.group>
        <flux:button icon="heading-1" size="sm" @click="toggleH2()" />
        <flux:button icon="heading-2" size="sm" @click="toggleH3()" />
        <flux:button icon="heading-3" size="sm" @click="toggleH4()" />
        <flux:button icon="bold" icon-variant="micro" size="sm" @click="toggleBold()" />
        <flux:button icon="italic" icon-variant="micro" size="sm" @click="toggleItalic()" />
        <flux:button icon="list-ordered" size="sm" @click="toggleOrderedList()" />
        <flux:button icon="list" size="sm" @click="toggleBulletList()" />
    </flux:button.group>
    
    {{-- Editor --}}
    <div x-ref="editor" class="mt-2"></div>
</div>