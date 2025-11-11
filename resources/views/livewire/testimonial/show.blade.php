<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <flux:heading size="xl">{{ $testimonial->title }}</flux:heading>
            <flux:breadcrumbs>
                <flux:breadcrumbs.item :href="route('testimonial.index')">Testimonials</flux:breadcrumbs.item>
                <flux:breadcrumbs.item>{{ $testimonial->title }}</flux:breadcrumbs.item>
            </flux:breadcrumbs>
        </div>
        {{-- Actions --}}
    </div>

    <div class="">
        <flux:avatar :src="$testimonial->headshot" :alt="$testimonial->author_name" size="xl" />
    </div>
</div>
