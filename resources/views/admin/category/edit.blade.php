<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight nounderline">
         <b style="color:#faa307">Update Category  <i class="bi bi-pencil-square"></i></b>
        </h2>
    </x-slot>
    <div class="py-12">
<div class="container">
  <div class="row">
    <div class="col-12">
    <div class="card">
    <div class="card-body">
    <div class="card-title">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight nounderline">Edit <span style="color:#6875f5">Category</span></h2>
    <form action="{{ url('category/update/'.$categories->id) }}" method="POST">
    @csrf
  <div class="mb-3">
    <label for="category_name" class="form-label">Update Category Name</label>
    <input type="text" class="form-control" id="category_name" name="category_name" aria-describedby="categoryName" value="{{ $categories->category_name }}">
    </div>
    @error('category_name')
    <div class="alert alert-danger text-center" role="alert" style="border-radius: 25px;">
  {{ $message }}
</div>
@enderror
<button type="submit" class="btn text-white" style="border-radius: 25px; background-color:#faa307">Update Category</button>
  </div>
</form>
    </div>
    </div>
    </div>
    </div>
  </div>
</div>
</div>
</div>
</x-app-layout>
