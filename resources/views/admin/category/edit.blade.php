@extends('admin.layouts.master')
@section('page-title')
Create Category
@endsection
@section('page-content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Edit Category</h4>
            </div>
            {{-- display error messages --}}
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            {{-- end error messages --}}

            <form method="post" action="{{route('admin.category.update', $category_info->id)}}" enctype="multipart/form-data">
            {{-- <form method="post" action="" enctype="multipart/form-data"> --}}

                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="category_name">Enter Category Name</label>
                        <input type="text" class="form-control" id="category_name" name="category_name" value="{{  $category_info->category_name  }}">
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary">Update Category</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

