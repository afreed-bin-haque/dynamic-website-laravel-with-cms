@extends('admin.admin_master')

@section('admin_main')
    <div class="py-12">
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
    <div class="card">
    <div class="card-body">
    <div class="card-title">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight nounderline">Insert <span style="color:#23AC7F">About</span></h2>
    <form action="{{ route('add.about') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
    <label for="question_title" class="form-label">Question</label>
    <input type="text" class="form-control" id="question_title" name="question_title">
    </div>
    @error('question_title')
    <div class="alert alert-danger text-center" role="alert" style="border-radius: 25px;">
  {{ $message }}
</div>
@enderror
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control" id="title" name="title">
    </div>
    @error('title')
    <div class="alert alert-danger text-center" role="alert" style="border-radius: 25px;">
  {{ $message }}
</div>
@enderror
<div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea class="form-control" id="description" name="description"></textarea>
    </div>
    @error('description')
    <div class="alert alert-danger text-center" role="alert" style="border-radius: 25px;">
  {{ $message }}
</div>
@enderror
<div class="mb-3">
    <label for="image" class="form-label">Image</label>
    <input type="file" class="form-control" id="image" name="image">
    </div>
    @error('image')
    <div class="alert alert-danger text-center" role="alert" style="border-radius: 25px;">
  {{ $message }}
</div>
@enderror
<button type="submit" class="btn text-white" style="border-radius: 25px; background-color:#23AC7F">Add About</button>
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
