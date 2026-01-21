<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <flux:heading size="xl">Articles</flux:heading>
            <flux:subheading>Bring the traffic and money my way...</flux:subheading>
        </div>
        <livewire:article.generate />
    </div>

    <flux:table :paginate="$articles">
        <flux:table.columns>
            <flux:table.column>Title</flux:table.column>
            <flux:table.column>Topic</flux:table.column>
            <flux:table.column>Status</flux:table.column>
            <flux:table.column>Actions</flux:table.column>
        </flux:table.columns>

        <flux:table.rows>
            @foreach ($articles as $article)
                <flux:table.row :key="$article->id">
                    <flux:table.cell>
                        <a href="{{ route('article.manage', ['article' => $article]) }}">
                            {{ $article->title ?? 'Generating...' }}
                        </a>
                    </flux:table.cell>

                    <flux:table.cell>{{ $article->topic }}</flux:table.cell>

                    <flux:table.cell>
                        <flux:badge size="sm" :color="$article->status->color()" inset="top bottom">{{ $article->status->label() }}</flux:badge>
                    </flux:table.cell>

                    <flux:table.cell></flux:table.cell>

                    <flux:table.cell>
                        <flux:button variant="ghost" size="sm" icon="ellipsis-horizontal" inset="top bottom"></flux:button>
                    </flux:table.cell>
                </flux:table.row>
            @endforeach
        </flux:table.rows>
    </flux:table>
</div>
