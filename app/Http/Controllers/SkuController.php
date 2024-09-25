<?php

namespace App\Http\Controllers;

use App\Models\Sku;
use App\Models\Attribute;
use App\Models\Product;
use Illuminate\Http\Request;

class SkuController extends Controller
{
    public function index()
    {
        $skus = Sku::all();
        return view('skus.index', compact('skus'));
    }

    public function edit(Sku $sku)
    {
        return view('skus.edit',compact('sku'));
    }

    public function update(Request $request, $sku){

        //$validated = $request->validated();
        $sku = Sku::findOrFail($sku);

        $sku->code = $request->sku_code;
        $sku->price = $request->sku_price;
        $sku->stock = $request->sku_quantity;
        $sku->attributeOptions()->sync($request->options,[]);
        $sku->update();

        return redirect('/skus')->with('success','Product Variant updated successfully!');

    }

    public function destroy(Sku $sku){
        $sku = Sku::findOrFail($sku);
        $sku->delete();
        $sku->attributeOptions()->detach();
        return redirect('/skus')->back()->with('success','Varaint deleted');
    }

}
