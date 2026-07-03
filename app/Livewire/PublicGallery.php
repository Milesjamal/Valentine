<?php

namespace App\Livewire;

use App\Models\Gallery;
use App\Models\GalleryCategory;
use Livewire\Component;

class PublicGallery extends Component
{
    public $activeCategory = 'all';

    public function render()
    {
        $categories = GalleryCategory::all();

        $query = Gallery::query();
        if ($this->activeCategory !== 'all') {
            $query->where('gallery_category_id', $this->activeCategory);
        }

        return view('livewire.public-gallery', [
            'categories' => $categories,
            'images' => $query->latest()->limit(8)->get(),
        ]);
    }
}
