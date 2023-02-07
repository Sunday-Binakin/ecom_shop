@extends('admin.layouts.master')
@section('page-title')
Edit Brand
@endsection
@section('page-content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Edit Brand</h4>
            </div>
            <form action="{{ route('admin.brands.update',$brands_info->id) }}" method="POST">
                <div class="card-body">
                    <div class="form-group">
                        <label for="brand_name">Edit Brand</label>
                        <input type="text" class="form-control" id="brand_name" name="brand_name"
                         value="{{$brands_info->brand_name}}">
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary">Create Brand</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

