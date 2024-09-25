<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('brands.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('status',0)->get();
        return view('brands.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request)
    {
        $validated = $request->validated();


        $brand = new Brand;
        
        $brand->name = $validated['name'];
        $brand->slug = Str::slug('slug');
        $brand->description = $request->description;

        if($request->hasFile('image')){
            $filename = time().'.'.$request->file('image')->getClientOriginalExtension();
            $path = $request->file('image')->storeAs('brand', $filename, 'public_uploads');

            $brand->image = $path;
        }

        $brand->status = $request->status==true ? 0 : 1;
        $brand->categories()->sync($request->input('categories', []));
        $brand->save();


        return redirect('brands')->with('success','Brand added successfully!');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        $subcategories = subcategory::where('status',1)->get();
        return view('brands.edit',compact('brand','subcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBrandRequest $request, $brand)
    {
        $validated = $request->validated();

        $brand = Brand::findOrFail($brand);

        $brand->name = $request->name;
        $brand->categories()->sync($request->input('categories', []));
        $brand->description = $request->description;

        if($request->hasFile('image')){

            $destination = public_path('/uploads/'.$brand->image);
            if(File::exists($destination)){
                File::delete($destination);
            }

            $filename = time().'.'.$request->file('image')->getClientOriginalExtension();
            $path = $request->file('image')->storeAs('brand', $filename, 'public_uploads');
            $brand->image = $path;

        }

        $brand->status = $request->status==true ? 1 : 0;
        $brand->update();

        if(!empty($request->category )){
            
            foreach($request->category as $cat){
                
                $category = Category::find($cat);
                $category->brands()->attach($brand->id);

            }
        }

        return redirect('brands')->with('success','Brand updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        //
    }
}
