<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $validated = $request->validated();

        $category = new Category;
        
        $category->name = $validated['name'];
        $category->slug = Str::slug($request->slug);
        $category->description = $validated['description'];
        if($request->hasFile('image')){
            $filename = time().'.'.$request->file('image')->getClientOriginalExtension();
            $path = $request->file('image')->storeAs('category', $filename, 'public_uploads');

            $category->image = $path;
        }
        $category->status = $request->status==true ? 1 : 0;

        $category->save();

        return redirect('/categories')->with('success','Category added successfully!');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request,$category)
    {   
        $validated = $request->validated();

        $category = Category::findOrFail($category);

        $category->name = $validated['name'];
        $category->slug = Str::slug($request->slug);
        $category->description = $validated['description'];

        if($request->hasFile('image')){

            $destination = public_path('/uploads/'.$category->image);
            if(File::exists($destination)){
                File::delete($destination);
            }

            $filename = time().'.'.$request->file('image')->getClientOriginalExtension();
            $path = $request->file('image')->storeAs('category', $filename, 'public_uploads');

            $category->image = $path;

        }

        $category->status = $request->status==true ? 1 : 0;

        $category->update();

        return redirect('categories')->with('success','Category Updated Successfully!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
