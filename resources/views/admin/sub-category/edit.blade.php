@extends('admin.layouts.master')
@section('page-title')
Create Sub Category
@endsection
@section('page-content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Create Sub Category</h4>
            </div>
            <form action="{{   route('admin.sub.category.update',$sub_category_info->id) }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="sub_category_name">
                            <h6><strong>Enter Sub Category Name</strong></h6>
                        </label>
                        <input type="text" class="form-control" id="sub_category_name" name="sub_category_name" value="{{   $sub_category_info->sub_category_name }}">
                    </div>

                    @php
                    $categories = App\Models\Category::where('status', 'active')->get();
                    @endphp

                    <div class="form-group">
                        <label for="category_name">Select Category</label>
                        <select class="form-control" name="category_id">
                              {{-- <option value="">Select Subcategory</option> --}}

                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                               @if($category->id == $sub_category_info->category_id)
                                 selected

                               @endif
                                >{{ $category->category_name }}</option>
                            {{-- <option value="1">Electronics</option> --}}
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    {{-- <button class="btn btn-primary">Create sub Category</button> --}}
                    <input type="submit" value="Update SubCategory" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

