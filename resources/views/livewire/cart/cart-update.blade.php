<div class="input-group">
    <button type="button" class="btn btn1"> <i class="fa fa-minus"></i> </button>
    <input type="text" value="{{$product->quantity }}" wire:click="updateCart" class="input-quantity">
    <button type="button" class="btn btn1"> <i class="fa fa-plus"></i></button>
</div>