<div>
    <div class="row">
        <div class="col-lg-4">
            <div class="mb-3">
                <label class="form-label">Variant Code</label>
                <input type="text" name="sku_code" class="form-control" value="" />
                @error('sku_code')<small class="text-danger">{{$message}}</small>@enderror
            </div>
        </div>
        <div class="col-lg-4">
            <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="number" name ="sku_price" class="form-control" value="" />
                @error('sku_price')<small class="text-danger">{{$message}}</small>@enderror
            </div>
        </div>
        <div class="col-lg-4">
            <div class="mb-3">
                <label class="form-label">Quantity</label>
                <input type="number" name ="sku_quantity" class="form-control" value="" />
                @error('sku_quantity')<small class="text-danger">{{$message}}</small>@enderror
            </div>
        </div>          
    </div>
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
                        <select wire:model="inputs.{{ $index }}.attribute_option_id" id="atttribute_option_{{ $index }}" name="options[{{$index}}][attribute_option_id]" class="form-select" >
                            <option value="">Select Option</option>
                            @foreach($input['atttribute_options'] as $option)
                                <option value="{{ $option->id }}">{{ $option->value }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <button type="button" wire:click="removeSelect({{ $index }})" class="btn btn-danger btn-sm"><i class="fa fa-minus-circle fa-fw me-1"></i> Remove</button>
                       
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <button type="button" wire:click="addSelect" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle fa-fw me-1"></i>Add</button>
</div>