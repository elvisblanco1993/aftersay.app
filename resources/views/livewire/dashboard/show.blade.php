<div class="space-y-6">
   <flux:heading size="xl">Welcome back, {{ auth()->user()->first_name }}</flux:heading>
   <div class="grid grid-cols-3 gap-6">
      <div class="col-span-2 md:col-span-1 minicard space-y-1 px-4!">
        <flux:heading size="xl">{{ $contacts }}</flux:heading>
        <flux:text>Contacts</flux:text>
     </div>
     <div class="col-span-2 md:col-span-1 minicard space-y-1 px-4!">
        <flux:heading size="xl">{{ $sequences }}</flux:heading>
        <flux:text>Active Sequences</flux:text>
     </div>
     <div class="col-span-2 md:col-span-1 minicard space-y-1 px-4!">
        <flux:heading size="xl">{{ $linkClicks }}</flux:heading>
        <flux:text>Estimated Reviews</flux:text>
     </div>
     <div class="col-span-2 md:col-span-1 minicard space-y-1 px-4!">
        <flux:heading size="xl">{{ $testimonials }}</flux:heading>
        <flux:text>Testimonials</flux:text>
     </div>
     <div class="col-span-2 md:col-span-1 minicard space-y-1 px-4!">
        <flux:heading size="xl">{{ $concerns }}</flux:heading>
        <flux:text>Concerns</flux:text>
     </div>
  </div>

  {{-- <div class="bg-white dark:bg-white/10 p-4 border dark:border-white/10 dark:text-white rounded-xl">
     <x-chart wire:model="chart" />
   </div> --}}

   @env('local')
   <livewire:onboard.todo />
   @endenv
</div>
