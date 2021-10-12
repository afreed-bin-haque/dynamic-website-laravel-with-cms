<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight nounderline">
         <b style="color:#6875f5">All Category  <i class="bi bi-list-nested"></i></b>
           <b style="float:right; font-size:small;color:#b5179e">Total Category (by paginator): <span style="padding: 5px 10px; border-radius: 50%;background-color: #f72585;color: white;"> {{ count ($categories) }}</span> </b>
        </h2>
    </x-slot>
    <div class="py-12">
<div class="container">
  <div class="row">
  @if(session('success'))
  <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
</svg>
  <div class="text-center">
    <strong>{{ session('success') }}</strong>
    <span class="float-left"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></span>
  </div>
 </div>
 @endif
    <div class="col-8">
    <div class="card">
    <div class="card-body">
    <div class="card-title">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight nounderline">Category table</h2>
    <div class="panel panel-default">
                        <div class="panel-body table-responsive">
                            <table class="table table-hover" style="background-color: #6875f5;color:white">
                                <thead>
                                    <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">Id</th>
                                    <th scope="col">Author Id</th>
                                    <th scope="col">Author Name</th>
                                    <th scope="col">Categroy Name</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Updated At</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category_details)
                                    <tr>
                                    <td>{{ $categories->firstItem()+$loop->index }}</td>
                                    <td>{{ $category_details->id }}</td>
                                    <td>{{ $category_details->user_id }}</td>
                                    <td>{{ $category_details->author->name }}</td>
                                    <td>{{ $category_details->category_name }}</td>
                                    @if($category_details->created_at == null)
                                    <td>Create Date is not available</td>
                                    @else
                                    <td>{{ Carbon\Carbon::parse($category_details->created_at)->diffForHumans() }}</td>
                                    @endif
                                    @if($category_details->updated_at == null)
                                    <td>Upate Date is not available</td>
                                    @else
                                    <td>{{ Carbon\Carbon::parse($category_details->updated_at)->diffForHumans() }}</td>
                                    @endif
                                    <td><a href="{{url('category/edit/'.$category_details->id) }}" class="btn btn-sm btn-outline-light text-dark" style="border-radius: 25px;color:#f48c06">Edit</a>
                                    <a href="{{url('softdelete/category/'.$category_details->id) }}" class="btn btn-sm btn-outline-warning text-dark" style="border-radius: 25px;color:#d90429">Move to Trash</a>
                                    </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $categories->links() }}
                        </div>
                    </div>
    </div>
    </div>
    </div>
    </div>
    <div class="col-4">
    @if(session('danger'))
  <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
</svg>
  <div class="text-center">
    <strong>{{ session('danger') }}</strong>
    <span class="float-left"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></span>
  </div>
 </div>
 @endif
    <div class="card">
    <div class="card-body">
    <div class="card-title">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight nounderline">Insert <span style="color:#6875f5">Category</span></h2>
    <form action="{{ route('store.category') }}" method="POST">
    @csrf
  <div class="mb-3">
    <label for="category_name" class="form-label">Category Name</label>
    <input type="text" class="form-control" id="category_name" name="category_name" aria-describedby="categoryName">
    </div>
    @error('category_name')
    <div class="alert alert-danger text-center" role="alert" style="border-radius: 25px;">
  {{ $message }}
</div>
@enderror
<button type="submit" class="btn text-white" style="border-radius: 25px; background-color:#4e95f9">Add Category</button>
  </div>
</form>
    </div>
    </div><br>
    <!----------Soft Delete table------->
    <div class="card">
    <div class="card-body">
    <div class="card-title">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight nounderline">Trash Cane <i class="bi bi-trash"></i></h2>
    <div class="panel panel-default">
    <div class="panel-body table-responsive">
                            <table class="table table-hover" style="background-color: #f4a261;color:white">
                                <thead>
                                    <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Categroy Name</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($trachcart as $trash_details)
                                    <tr>
                                    <td>{{ $trash_details->id }}</td>
                                    <td>{{ $trash_details->category_name }}</td>
                                    <td><a href="{{url('category/restore/'.$trash_details->id) }}" class="btn btn-sm btn-outline-info text-white" style="border-radius: 25px;color:#f48c06">Restore</a>
                                    <a href="{{url('delete/category/'.$trash_details->id) }}" class="btn btn-sm btn-outline-danger text-white" style="border-radius: 25px;color:#d90429">Delete</a>
                                    </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $trachcart->links() }}
    </div>
    </div>
    </div>
<!---------Soft Delete table Ends-------->
    </div>
    </div>
  </div>
</div>
</div>
</div>
</x-app-layout>
