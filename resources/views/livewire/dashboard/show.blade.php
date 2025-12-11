<div class="space-y-6">
   <flux:heading size="xl">Welcome back, {{ auth()->user()->first_name }}</flux:heading>
   <flux:subheading size="lg">Here's what's happening with your customer feedback today.</flux:subheading>

   <div class="grid grid-cols-2 gap-6">
      <flux:card>
         <flux:avatar icon="users" icon-variant="outline"/>
         <div class="mt-3 text-3xl font-medium">{{ $contacts }}</div>
         <flux:text>Total Contacts</flux:text>
      </flux:card>

      <flux:card>
         <flux:avatar icon="send" icon-variant="outline"/>
         <div class="mt-3 text-3xl font-medium">{{ $activeSequences }}</div>
         <flux:text>Active Sequences</flux:text>
      </flux:card>
      <flux:card>
         <flux:avatar icon="star" icon-variant="outline"/>
         <div class="mt-3 text-3xl font-medium">{{ $linkClicks }}</div>
         <flux:text>Estimated Reviews Generated</flux:text>
      </flux:card>
         <flux:card>
         <flux:avatar icon="message-square-heart" icon-variant="outline"/>
         <div class="mt-3 text-3xl font-medium">{{ $testimonials }}</div>
         <flux:text>Testimonials</flux:text>
      </flux:card>
  </div>
</div>
