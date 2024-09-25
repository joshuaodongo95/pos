<div class="row">
    <div wire:ignore.self class="modal fade" id="DeleteBrandModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Brand</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form wire:submit.prevent="destroyBrand">
                    <div class="modal-body">
                    <h6 class="alert alert-warning">Are you sure you want to delete this brand?</h6>
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
                <li class="breadcrumb-item active">Brands</li>
            </ul>
            <h1 class="page-header mb-0">Brands</h1>
        </div>
                            
        <div class="ms-auto">
            <a href="{{ route('brands.create') }}" class="btn btn-theme"><i class="fa fa-plus-circle fa-fw me-1"></i> Add Brand</a>
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
                                        <th >Image</th>
                                        <th >Status</th>
                                        <th >Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($brands as $brand)
                                        <tr>
                                            
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="product1">
                                                    <label class="form-check-label" for="product1"></label>
                                                </div>
                                            </td>
                                            <td>{{$brand->name}}</td>
                                            <td>
                                                <div class="w-60px h-60px bg-gray-100 d-flex align-items-center justify-content-center">
                                                    <img alt="" class="mw-100 mh-100" src="{{asset('/uploads/'.$brand->image)}}">
                                                </div>
                                            </td>
                                            <td>{{$brand->status ==1 ? "Hidden" : "Visible"}}</td>
                                            <td>
                                                <a href="{{url('brands/'.$brand->id.'/edit')}}" class="btn btn-theme btn-sm" >Edit</a>
                                                <a href="#" wire:click="deleteBrand({{ $brand->id }})" data-bs-toggle="modal" data-bs-target="#DeleteBrandModal" class="btn btn-danger btn-sm" >Delete</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7"> No brands Found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{$brands->links()}}
                        </div>
                    <!-- END table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
