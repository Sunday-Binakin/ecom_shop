@extends('admin.layouts.master')
@section('page-title')
    Create Brand
@endsection
@section('page-content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Create Brand</h4>
            </div>
            <form action="{{ route('admin.brands.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="brand_name">Enter Brand Name</label>
                        <input type="text" class="form-control" id="brand_name"
                         name="brand_name" placeholder="Electronics">
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

