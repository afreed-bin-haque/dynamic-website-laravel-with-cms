@extends('admin.admin_master')

@section('admin_main')
    <div class="py-12">
<div class="container">
  <div class="row">
    <div class="col-12">
    <div class="card">
    <div class="card-body">
    <div class="card-title">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight nounderline">Edit <span style="color:#6875f5">Hero Section</span></h2>
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
    <form action="{{ url('hero/update/'.$hero->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="old_image" value="{{ $hero->image }}">
  <div class="mb-3">
    <label for="header_text" class="form-label">Update Hero Header </label>
    <input type="text" class="form-control" id="header_text" name="header_text" aria-describedby="headertText" value="{{ $hero->header_text }}">
    </div>
    @error('header_text')
    <div class="alert alert-danger text-center" role="alert" style="border-radius: 25px;">
  {{ $message }}
</div>
@enderror
<div class="mb-3">
    <label for="header_description" class="form-label">Update Hero Description </label>
    <input type="text" class="form-control" id="header_description" name="header_description" aria-describedby="headertText" value="{{ $hero->	short_description	 }}">
    </div>
    @error('header_description')
    <div class="alert alert-danger text-center" role="alert" style="border-radius: 25px;">
  {{ $message }}
</div>
@enderror
<div class="mb-3">
    <label for="image" class="form-label">Update Header Image</label>
    <input type="file" class="form-control" id="image" name="image" aria-describedby="heroImage" value="{{ $hero->image }}">
</div>
    <div class="card">
        <div class="card-header text-center">
           <h4 class="card-title">Previous Image of the Hero Section</h4>
           </div>
           <div class="card-body float-center">
           <img src="{{ asset($hero->image) }}" alt="Previous image of the Hero Section" style="width:600px; height:450px;">
           </div>
    </div><br>
    @error('image')
    <div class="alert alert-danger text-center" role="alert" style="border-radius: 25px;">
  {{ $message }}
</div>
@enderror
<button type="submit" class="btn text-white" style="border-radius: 25px; background-color:#faa307">Update Hero</button>
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
@endsection
