@extends('admin.layouts.master')
@section('page-title')
All category
@endsection
@section('page-content')
<div class="card">
    <div class="card-header">
        <h4> All category</h4>
    </div>
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{session()->get('message')}}
    </div>

    @endif
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-md">
                <tbody>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id}}</td>
                        <td>{{ $category->category_name }}</td>
                        <td>{{ $category->slug }}</td>
                        {{-- condition to display active or inactive button --}}
                        <td>
                        @if($category->status == 'active')

                        <div class="badge badge-success">Active</div>
                        @else
                        <div class="badge badge-danger">Inactive</div>
                        @endif
                        </td>

                        <td><a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-info">Edit</a>
                        <a href="{{ route('admin.category.delete',$category->id )}}" class="btn btn-danger">Delete</a>
                    @if($category->status == 'active')
                    {{-- <a href="{{ route('admin.category.deactivate',$category->id )}}" class="btn btn-warning">Deactivate</a> --}}
                    <form action="{{  route('admin.category.deactivate',$category->id)  }}" method="POST">
                        @csrf
                        {{-- <input type="hidden" name="id" value="{{ $category->id }}"> --}}
                        <input type="submit" value="Deactivate" class="btn btn-warning mt-2">
                    </form>
                    @else
                    {{-- <a href="{{ route('admin.category.activate',$category->id )}}" class="btn btn-success">Activate</a> --}}
                    <form action="{{   route('admin.category.activate', $category->id) }}"  method="POST">
                        @csrf
                        {{-- <input type="hidden" name="id" value="{{ $category->id }}"> --}}
                        <input type="submit" value="Activate" class="btn btn-success mt-2">

                    @endif
                    </td>
                    </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

