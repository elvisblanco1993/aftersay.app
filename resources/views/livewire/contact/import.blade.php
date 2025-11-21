<div>
    <flux:modal.trigger name="import-contacts">
        <flux:button variant="filled">Import</flux:button>
    </flux:modal.trigger>

    <flux:modal name="import-contacts" class="md:w-256">
        <form wire:submit="save">
            @csrf
            <div class="space-y-6">
                <div class="space-y-2">
                    <flux:heading size="lg">Import Contacts</flux:heading>
                    <flux:text class="mt-2">Upload a CSV file to import your contacts</flux:text>
                </div>

                <x-filepond::upload 
                    wire:model="file" 
                    accept=".csv"
                    labelFileProcessingComplete="File ready to import"
                    labelIdle="Drop your CSV file here <span class='filepond--label-action'> or click to browse </span> <span class='filepond-max-filesize-label'>Maximum file size: {{ $maxUploadSize }}B</span>"
                />

                @if (!empty($previewData))
                    <flux:separator text="Data Preview (First {{ count($previewData) }} Rows)" />

                    <div class="relative overflow-x-auto border dark:border-zinc-700 rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-zinc-500 dark:text-zinc-400">
                            <thead class="text-xs text-zinc-700 bg-zinc-50 dark:bg-zinc-700 dark:text-zinc-400">
                                <tr>
                                    @foreach ($previewHeaders as $header)
                                        <th scope="col" class="px-3 py-2">{{ $header }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($previewData as $row)
                                    <tr class="bg-white dark:bg-zinc-800 hover:bg-zinc-50 dark:hover:bg-zinc-700/50">
                                        @foreach ($previewHeaders as $header)
                                            <td class="px-3 py-2.5">{{ $row[$header] ?? 'N/A' }}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <flux:callout color="blue" icon="file-spreadsheet" heading="Need a template?" text="Download our CSV template to ensure your data is formatted correctly">
                        <x-slot name="actions">
                            <flux:button icon="download" type="button" wire:click="downloadSample" size="xs">Download template</flux:button>
                        </x-slot>
                    </flux:callout>

                    <flux:callout heading="CSV Format Requirements:">
                        <flux:callout.text>
                            <ul class="ml-4 list-disc">
                                <li>Include headers: first_name, last_name, email, phone (optional)</li>
                                <li>One contact per row</li>
                            </ul>
                        </flux:callout.text>
                    </flux:callout>
                @endif

                <div class="flex">
                    <flux:spacer />

                    <flux:button type="submit" variant="primary">Import Contacts</flux:button>
                </div>
            </div>
        </form>
    </flux:modal>

    @filepondScripts
</div>
