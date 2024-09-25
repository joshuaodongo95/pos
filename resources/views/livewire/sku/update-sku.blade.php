<div>
    <div class="row">
        <div class="col-lg-6">
            <label class="form-label">Attribute</label>
            <select wire:model.live="productAttribute" id="attribute" name="attribute" class="form-select" >
                <option value="">Select Attribute</option>
                    @foreach($productAttributes as $attribute)
                        <option value="{{ $attribute->id }}" @if($attribute->attribute_id == $attribute->id) selected @endif >{{ $attribute->name }}</option>
                    @endforeach
            </select>
            @error('attribute')<small class="text-danger">{{$message}}</small>@enderror
        </div>
        <div class="col-lg-6 mb-3">
            <label class="form-label">Value</label>
            <select wire:model="attributeOption" id="" name="options[]" class="form-select" multiple>
                <option value="">Select Option</option>
                @foreach($attributeOptions as $option)
                    <option value="{{ $option->id }}" >{{ $option->value }}</option>
                @endforeach
            </select>
            @error('option')<small class="text-danger">{{$message}}</small>@enderror
        </div>
    </div>
</div>  

