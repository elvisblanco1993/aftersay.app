<?php

namespace App\Livewire\Testimonial;

use App\Models\Testimonial;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public string $query = '';

    public int $perPage = 15;

    public function render()
    {
        return view('livewire.testimonial.index', [
            'testimonials' => Testimonial::search($this->query)->paginate($this->perPage),
        ]);
    }

    public function approve($testimonial_id)
    {
        Testimonial::where('id', $testimonial_id)
            ->update([
                'is_approved' => DB::raw('NOT is_approved'),
            ]);
    }

    public function feature($testimonial_id)
    {
        Testimonial::where('id', $testimonial_id)
            ->update([
                'is_featured' => DB::raw('NOT is_featured'),
            ]);
    }

    public function delete($testimonial_id)
    {
        Testimonial::where('id', $testimonial_id)->delete();
    }
}
