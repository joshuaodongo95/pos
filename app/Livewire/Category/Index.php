<?php

namespace App\Livewire\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $category_id;

    public function deleteCategory($id){

        $this->category_id = $id;
    }

    public function destroyCategory(){

        $category = Category::find($this->category_id);

        $destination = public_path('/uploads/'.$category->image);
        if(File::exists($destination)){
            File::delete($destination);
        }

        $category->delete();

        return redirect('/categories')->with('success','Category deleted!');
    }
    
    public function render()
    {   
        $categories = Category::orderBy('id','DESC')->paginate(10);
        return view('livewire.category.index',['categories'=> $categories]);
    }
}
