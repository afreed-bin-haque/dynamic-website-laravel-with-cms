@extends('admin.admin_master')

@section('admin_main')
    <div class="py-12">
<div class="container">
  <div class="row">
    <div class="col-12">
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
    <h2 class="font-semibold text-xl text-gray-800 leading-tight nounderline">Hero Section</h2>
    <div class="panel panel-default">
    <div class="panel-body table-responsive">
        <table class="table table-hover">
            @foreach($hero as $hero_details)
            @php($i=1)
        <div class="card" >
        <img src="{{ asset($hero_details->image) }}" class="card-img-top" alt="...">
        <div class="card-body">
        <h5 class="card-title"><b>Header:</b> {{ $hero_details->header_text}}</h5>
        <h6 class="card-subtitle mb-2 text-muted">Serial: {{ $i++ }} || ID: {{ $hero_details->id }}</h6>
        <p class="card-text"><b>Description:</b> {{ $hero_details->short_description}}</p>
        <table>
            <tr>
            <td>Created at:
            <span> @if($hero_details->created_at == null)
            Create Time is not available
            @else
            {{ Carbon\Carbon::parse($hero_details->created_at)->diffForHumans() }}
            @endif
            </span>
            </td>
           </tr>
            <tr>
            <td>Updated at:
            <span> @if($hero_details->updated_at == null)
            Update Time is not available
            @else
            {{ Carbon\Carbon::parse($hero_details->updated_at)->diffForHumans() }}
            @endif
            </span>
            </td>
            </tr>
        </table>
        <hr>
        <a href="{{url('hero/edit/'.$hero_details->id) }}" class="btn btn-sm btn-outline-warning text-dark btn-block" style="border-radius: 25px;color:#f48c06">Edit</a>
        <a href="{{url('hero/delete/'.$hero_details->id) }}" class="btn btn-sm btn-outline-danger text-dark btn-block" style="border-radius: 25px;color:#f48c06">Delete</a>
        </div>
        </div>
        @endforeach
        </div>
        </div>
        </div>
        </div>
        @php ($minrow = count($hero))
        @if($minrow == 0)
        <a href="{{ route('hero.add') }}" class="btn btn-lg btn-success text-white btn-block tex-sm" style="border-radius: 25px;">Add Header Data</a>
        </div>
        @else
        </div>
        @endif
        </div>
        </div>
@endsection
