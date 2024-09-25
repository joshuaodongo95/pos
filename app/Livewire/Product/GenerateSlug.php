<?php

namespace App\Livewire\Product;

use Livewire\Component;
use Illuminate\Support\Str;

class GenerateSlug extends Component
{
    public $name,$slug;

    public function generate_slug(){

        $this->slug = Str::slug($this->name);
    }
    public function render()
    {
        return view('livewire.product.generate-slug');
    }
}
