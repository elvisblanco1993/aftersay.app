<?php

namespace App\Livewire\Contact;

use App\Imports\ContactPreviewImport;
use App\Imports\ContactsImport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class Import extends Component
{
    use WithFileUploads;

    public $file;

    public $previewData = [];

    public $previewHeaders = [];

    public $maxUploadSize;

    public $tenantId;

    public function mount()
    {
        $this->maxUploadSize = ini_get('upload_max_filesize');
        $this->tenantId = Auth::user()->current_tenant_id;
    }

    public function rules(): array
    {
        return [
            'file' => 'required|mimes:csv,txt|max:50000',
        ];
    }

    public function validateUploadedFile()
    {
        $this->validate();

        return true;
    }

    public function updatedFile($value)
    {
        if (is_null($value)) {
            $this->previewData = [];
            $this->previewHeaders = [];

            return;
        }

        // Validate the file before trying to read it
        $this->validate(['file' => 'required|mimes:csv,txt|max:50000']);

        try {
            $filePath = $this->file->getRealPath();
            $collection = Excel::toCollection(new ContactPreviewImport, $filePath);

            if ($collection->isNotEmpty() && $collection->first()->isNotEmpty()) {
                $dataCollection = $collection->first();
                $this->previewHeaders = $dataCollection->first()->keys()->toArray();
                $this->previewData = $dataCollection->take(5)->toArray();
            } else {
                $this->previewData = [];
                $this->previewHeaders = [];
            }
        } catch (\Exception $e) {
            Log::error('CSV Preview Error: '.$e->getMessage());
            $this->previewData = [];
            $this->previewHeaders = [];
            $this->addError('file', 'Could not read the file. Please check the format.');
        }
    }

    public function render()
    {
        return view('livewire.contact.import');
    }

    public function save()
    {
        // 1. Validate the file one last time
        $this->validate();

        $fileToImportFrom = $this->file->store('imports');

        Excel::queueImport(new ContactsImport($this->tenantId), Storage::path($fileToImportFrom))
            ->afterResponse(
                // Remove file from storage after import is completed.
                Storage::delete($fileToImportFrom)
            );

        session()->flash('flash.banner', 'Import is processing in the background. You will be notified when it is complete.');
        session()->flash('flash.bannerStyle', 'success');

        $this->redirect(url: url()->previous(), navigate: true);
    }

    public function downloadSample()
    {
        return download_contacts_sample_csv();
    }
}
