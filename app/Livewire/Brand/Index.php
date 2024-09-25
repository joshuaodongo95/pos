<?php

namespace App\Livewire\Brand;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class Index extends Component
{
    use WithPagination; 

    protected $paginationTheme = 'bootstrap';

    public $brand_id,$category_id;

    public function deleteBrand($id){

        $this->brand_id = $id;
    }

    public function destroyBrand(){

        $brand = Brand::find($this->brand_id);

        $destination = public_path('/uploads/'.$brand->image);
        if(File::exists($destination)){
            File::delete($destination);
        }

        $brand->delete();

        return redirect('/brands')->with('success','Brand deleted!');
    }
    

    public function render()
    {
        $brands = Brand::orderBy('id','DESC')->paginate(10);
        return view('livewire.brand.index',['brands'=> $brands]);
    }
}
