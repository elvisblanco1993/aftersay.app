<div>
    <div class="flex items-center justify-between">
        <flux:heading class="capitalize">{{ $platform->name }}</flux:heading>
        
        <flux:modal.trigger name="show-platform-{{ $platform->id }}">
            <flux:button size="sm" icon-trailing="qr-code" />
        </flux:modal.trigger>
    </div>

    <flux:modal name="show-platform-{{ $platform->id }}" class="md:w-96" variant="flyout">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg" class="capitalize">{{ $platform->name }}</flux:heading>
            </div>

            <flux:input value="{{ $platform->url }}" label="Review URL" copyable/>

            <div class="w-1/2 mx-auto bg-pink-100 rounded" id="qrcode">
                {!! $qr !!}
            </div>
        </div>
    </flux:modal>
</div>
