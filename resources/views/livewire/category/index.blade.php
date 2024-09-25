<div class="row">
    <div wire:ignore.self class="modal fade" id="DeleteCategoryModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form wire:submit.prevent="destroyCategory">
                    <div class="modal-body">
                    <h6 class="alert alert-warning">Are you sure you want to delete this category?</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-theme" data-bs-dismiss="modal"> Close</button>
                        <button type="submit" class="btn btn-danger"> Delete</button>
                                ...
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="d-flex align-items-center mb-3">
        <div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Categories</li>
            </ul>
            <h1 class="page-header mb-0">Categories</h1>
        </div>
                            
        <div class="ms-auto">
            <a href="{{ route('categories.create') }}" class="btn btn-theme"><i class="fa fa-plus-circle fa-fw me-1"></i> Add Category</a>
        </div>
        </div>
        @if (\Session::has('success'))
            <div class="alert alert-success alert-dismissible">
                <p>{{ \Session::get('success') }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div id="datatable" class="mb-5">        
            <div class="card">
            
                <div class="card-body">               
                    <!-- BEGIN table -->
                        <div class="table-responsive">
                            <table id="datatableDefault" class="table text-nowrap w-100">
                                <thead>
                                    <tr>
                                        <th ></th>
                                        <th >Name</th>
                                        <th >Sub categories</th>
                                        <th >Status</th>
                                        <th >Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($categories as $category)
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="product1">
                                                    <label class="form-check-label" for="product1"></label>
                                                </div>
                                            </td>
                                            <td>{{$category->name}}</td>
                                            <td>
                                                @if($category->subcategories)
                                                    @foreach($category->subcategories as $subcategory)
                                                     {{ $subcategory->name}}
                                                    </br>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>{{$category->status ==1 ? "Hidden" : "Visible"}}</td>
                                            <td>
                                                <a href="{{url('categories/'.$category->id.'/edit')}}" class="btn btn-theme btn-sm" >Edit</a>
                                                <a href="#" wire:click="deleteCategory({{ $category->id }})" data-bs-toggle="modal" data-bs-target="#DeleteCategoryModal" class="btn btn-danger btn-sm" >Delete</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9">  No Categories Found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{$categories->links()}}
                        </div>
                    <!-- END table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
