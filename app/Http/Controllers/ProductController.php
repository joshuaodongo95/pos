<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdateRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        $categories = Category::all();
        $attributes = Attribute::all();
        return view('products.create',compact('categories','attributes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $validated = $request->validated();
        $product = new Product; 
        $sku = new Sku;

        $product->name = $validated['name'];
        $product->slug = Str::slug($request->name);
        $product->description = $validated['description'];
        $product->category_id = $validated['category'];
        $product->default_price = $validated['default_price'];
        $product->selling_price = $validated['selling_price'];
        $product->isactive = $request->status==true ? 0 : 1;
        $product->quantity = $validated['quantity'];
        $product->weight = $request->weight;

        if($request->hasFile('image')){
            $filename = time().'.'.$request->file('image')->getClientOriginalExtension();
            $path = $request->file('image')->storeAs('products', $filename, 'public_uploads');
            $product->image = $path;
        }
        
        $product->save();

        return redirect('/products')->with('success','Product added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();

        return view('products.edit',compact('product','brands','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, $product)
    {
        $validated = $request->validated();
        $product = Product::findOrFail($product);
        
        if($product){

            $product->category_id = $validated['category'];
            $product->name = $validated['name'];
            $product->slug = Str::slug($request->name);
            $product->description = $validated['description'];
            $product->default_price = $validated['default_price'];
            $product->selling_price = $validated['selling_price'];
            $product->isactive = $request->status==true ? 0 : 1;
            $product->quantity = $validated['quantity'];
            $product->weight = $validated['weight'];

            if($request->hasFile('image')){
                $destination = public_path('/uploads/'.$product->image);
    
                if(File::exists($destination)){
                    File::delete($destination);
                }
                $filename = time().'.'.$request->file('image')->getClientOriginalExtension();
                $path = $request->file('image')->storeAs('products', $filename, 'public_uploads');
                $product->image = $path;
            }
            $product->update();
        
            return redirect('/products')->with('success','Product updated successfully!');

        }else{
            return redirect()->with('message','No such product Id found');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product = Product::findOrFail($product);
        if($product->images){
            foreach($product->images as $image){
                $destination = public_path('/uploads/'.$productImage->image);
                if(File::exists($destination)){
                    File::delete($destination);
                }
            }
        }

        $product->delete();
        $product->colors()->detach();
        return redirect('/products')->back()->with('success','Product deleted');
    }

    public function destroyImage(int $product_image_id){
        $productImage = ProductImage::findOrFail($product_image_id);

        $destination = public_path('/uploads/'.$productImage->image);
        if(File::exists($destination)){
            File::delete($destination);
        }
        $productImage->delete();

        return redirect()->with('success','Product image deleted');
    }
}
