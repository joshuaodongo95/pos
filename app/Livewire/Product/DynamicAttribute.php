<?php

namespace App\Livewire\Product;

use Livewire\Component;
use App\Models\Attribute;
use App\Models\AttributeOption;

class DynamicAttribute extends Component
{
    public $inputs = [];
    public $product_attributes = [];
    public $atttribute_options = [];

    public function mount()
    {
        $this->product_attributes = Attribute::all();
        $this->inputs = [
            ['attribute_id' => '', 'attribute_option_id' => '', 'atttribute_options' => []]
        ];
    }

    public function updated($field)
    {
        if (strpos($field, 'attribute_id') !== false) {
            $index = explode('.', $field)[1];
            $attributeId = $this->inputs[$index]['attribute_id'];
            $this->inputs[$index]['atttribute_options'] = AttributeOption::where('attribute_id', $attributeId)->get();
        }
    }

    public function addSelect()
    {
        $this->inputs[] = ['attribute_id' => '', 'attribute_option_id' => '', 'atttribute_options' => []];
    }

    public function removeSelect($index)
    {
        unset($this->inputs[$index]);
        $this->inputs = array_values($this->inputs); // Reindex array
    }


    public function render()
    {
        return view('livewire.product.dynamic-attribute');
    }
}
