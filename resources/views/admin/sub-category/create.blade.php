@extends('admin.layouts.master')
@section('page-content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Create Sub Category</h4>
            </div>
            <form action="" method="POST">
                <div class="card-body">
                    <div class="form-group">
                        <label for="subcategory_name"><h6><strong>Enter Sub Category Name</strong></h6></label>
                        <input type="text" class="form-control" id="subcategory_name" name="subcategory_name" placeholder="Electronics">
                    </div>
                    <div class="form-group">
                        <label for="category_name">Select Category</label>
                        <select class="form-control"  name="category_id">
                            <option value="">Select Category</option>
                            <option value="1">Electronics</option>
                            <option value="2">Fashion</option>
                            <option value="3">Sports</option>
                            <option value="4">Home & Kitchen</option>
                            <option value="5">Grocery</option>
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary">Create sub Category</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

