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

                        <td><a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ route('admin.category.delete',$category->id )}}" class="btn btn-danger">Delete</a></td>
                    </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

