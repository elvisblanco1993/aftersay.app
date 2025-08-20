<div>
    <div class="grid grid-cols-3 gap-6">
      <div class="col-span-2 md:col-span-1 bg-white dark:bg-white/10 p-4 border dark:border-white/10 rounded-xl drop-shadow-xl">
         <flux:heading size="xl">{{ $campaigns }}</flux:heading>
         <flux:text>Active Campaigns</flux:text>
      </div>
      <div class="col-span-2 md:col-span-1 bg-white dark:bg-white/10 p-4 border dark:border-white/10 rounded-xl drop-shadow-xl">
         <flux:heading size="xl">{{ $linkClicks }}</flux:heading>
         <flux:text>Estimated Reviews</flux:text>
      </div>
      <div class="col-span-2 md:col-span-1 bg-white dark:bg-white/10 p-4 border dark:border-white/10 rounded-xl drop-shadow-xl">
         <flux:heading size="xl">{{ $concerns }}</flux:heading>
         <flux:text>Concerns</flux:text>
      </div>
   </div>
</div>
