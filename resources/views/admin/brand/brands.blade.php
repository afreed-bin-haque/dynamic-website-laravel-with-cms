@extends('admin.admin_master')

@section('admin_main')
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
    <h2 class="font-semibold text-xl text-gray-800 leading-tight nounderline">Brand table</h2>
    <div class="panel panel-default">
                        <div class="panel-body table-responsive">
                            <table class="table table-hover" style="background-color: #5931a4;color:white">
                                <thead>
                                    <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">Id</th>
                                    <th scope="col">Brand Name</th>
                                    <th scope="col">Brand Image</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Updated At</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($brands as $brand_details)
                                    <tr>
                                    <td>{{ $brands->firstItem()+$loop->index }}</td>
                                    <td>{{ $brand_details->id }}</td>
                                    <td>{{ $brand_details->brand_name }}</td>
                                    <td><img src="{{ asset($brand_details->brand_image) }}" alt="Brand Image" width="40px" height="80px"></td>
                                    @if($brand_details->created_at == null)
                                    <td>Create Time is not available</td>
                                    @else
                                    <td>{{ Carbon\Carbon::parse($brand_details->created_at)->diffForHumans() }}</td>
                                    @endif
                                    @if($brand_details->updated_at == null)
                                    <td>Upate Time is not available</td>
                                    @else
                                    <td>{{ Carbon\Carbon::parse($brand_details->updated_at)->diffForHumans() }}</td>
                                    @endif
                                    <td><a href="{{url('brand/edit/'.$brand_details->id) }}" class="btn btn-sm btn-outline-light text-warning" style="border-radius: 25px;color:#f48c06">Edit</a>
                                    <a href="{{url('brand/delete/'.$brand_details->id) }}" class="btn btn-sm btn-outline-danger text-white" style="border-radius: 25px;color:#d90429" onclick="return confirm('Are you sure to delete this brand?')">Delete</a>
                                    </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $brands->links() }}
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
    <h2 class="font-semibold text-xl text-gray-800 leading-tight nounderline">Insert <span style="color:#5931a4">Brand</span></h2>
    <form action="{{ route('store.brand') }}" method="POST" enctype="multipart/form-data">
    @csrf
  <div class="mb-3">
    <label for="brand_name" class="form-label">Brand Name</label>
    <input type="text" class="form-control" id="brand_name" name="brand_name" aria-describedby="brandName">
    </div>
    @error('brand_name')
    <div class="alert alert-danger text-center" role="alert" style="border-radius: 25px;">
  {{ $message }}
</div>
@enderror
<div class="mb-3">
    <label for="brand_image" class="form-label">Brand Image</label>
    <input type="file" class="form-control" id="brand_image" name="brand_image" aria-describedby="brandImage">
    </div>
    @error('brand_image')
    <div class="alert alert-danger text-center" role="alert" style="border-radius: 25px;">
  {{ $message }}
</div>
@enderror
<button type="submit" class="btn text-white" style="border-radius: 25px; background-color:#7055A4">Add Brand</button>
  </div>
</form>
    </div>
    </div>
<!---------Second section Ends-------->
<!---------Second section Ends-------->
    </div>
    </div>
  </div>
</div>
</div>
</div>
@endsection
