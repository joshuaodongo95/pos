<?php

namespace App\Livewire\Sku;

use Livewire\Component;
use App\Models\Attribute;
use App\Models\AttributeOption;

class UpdateSku extends Component
{
    public $productAttributes;
    public $attributeOptions = [];
    public $productAttribute = null;
    public $attributeOption = null;

    public function mount()
    {
        $this->productAttributes = Attribute::all();
        $this->attributeOptions  = collect();
    }

    public function updatedProductAttribute($value)
    {
        $this->attributeOptions = AttributeOption::where('attribute_id', $value)->get();
    }

    public function render()
    {
        return view('livewire.sku.update-sku');
    }
}
