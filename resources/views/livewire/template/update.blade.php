<div>
    @livewire('livewire-quill', [
    'quillId' => 'editor',
    'data' => $body,
    'placeholder' => 'Type something...',
    'classes' => 'bg-white text-primary dark:text-white', // optional classes that can be added to the editor, that are added for this instance only
])
</div>
