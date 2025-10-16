<div 
    x-data="setupEditor(
        @entangle($attributes->wire('model')->value()),
    )"
    x-init="() => init($refs.editor)" 
    wire:ignore 
    {{ $attributes->whereDoesntStartWith('wire:model') }}
>

    {{-- Editor Controls --}}
    <div class="flex items-center justify-between">
        <flux:button.group x-show="!preview">
            <flux:button icon="heading-1" size="sm" @click="toggleH2()" />
            <flux:button icon="heading-2" size="sm" @click="toggleH3()" />
            <flux:button icon="heading-3" size="sm" @click="toggleH4()" />
            <flux:button icon="bold" icon-variant="micro" size="sm" @click="toggleBold()" />
            <flux:button icon="italic" icon-variant="micro" size="sm" @click="toggleItalic()" />
            <flux:button icon="list-ordered" size="sm" @click="toggleOrderedList()" />
            <flux:button icon="list" size="sm" @click="toggleBulletList()" />
        </flux:button.group>

        <div x-show="preview"></div>

        <flux:switch 
            x-model="preview" 
            label="Preview"
            @change="$dispatch('parse-content', { preview })"
        />
    </div>
    
    {{-- Editor --}}
    <div x-show="!preview" x-ref="editor" class="mt-3"></div>

    {{-- Preview --}}
    <div x-show="preview" x-html="content" class="mt-3 max-w-full prose prose-sm dark:prose-invert border dark:border-zinc-600 rounded-lg p-3 bg-white dark:bg-white/10"></div>
</div>