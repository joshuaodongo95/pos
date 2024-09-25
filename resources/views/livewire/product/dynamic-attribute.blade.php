<div>
    <table class="table text-nowrap w-100">
        <thead>
            <tr>
                <th>Attribute</th>
                <th>Option</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($this->inputs as $index => $input)
                <tr>
                    <td>
                        <select wire:model.live="inputs.{{ $index }}.attribute_id" id="attribute_{{ $index }}" name="attributes[{{$index}}][attribute_id]" class="form-select" >
                            <option value="">Select Attribute</option>
                            @foreach($product_attributes as $attribute)
                                <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select wire:model="inputs.{{ $index }}.attribute_option_id" id="atttribute_option_{{ $index }}" name="options[{{$index}}][attribute_id]" class="form-select" multiple>
                            <option value="">Select Option</option>
                            @foreach($input['atttribute_options'] as $option)
                                <option value="{{ $option->id }}">{{ $option->value }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <button type="button" wire:click="removeSelect({{ $index }})" class="btn btn-danger btn-sm">Remove</button>
                       
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <button type="button" wire:click="addSelect" class="btn btn-primary btn-sm">Add Attribute</button>
</div>