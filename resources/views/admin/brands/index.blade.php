@extends('admin.layouts.master')
@section('page-title')
All Brands
@endsection
@section('page-content')
<div class="card">
    <div class="card-header">
        <h4> All Brands</h4>
    </div>

    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>

    @endif

    <div class="card-body">
        <div class="table-responsive">
            <table id="data_table" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($brands_info as $brand)
                    <tr>
                        <td>{{ $brand->id}}</td>
                        <td>{{ $brand->sub_category_name }}</td>
                        <td>{{ $brand->slug }}</td>

                        {{-- condition to display active or inactive button --}}
                        <td>
                            @if($brand->status == 'active')

                            <div class="badge badge-success">Active</div>
                            @else
                            <div class="badge badge-danger">Inactive</div>
                            @endif
                        </td>
                        <td>
                            <div>
                                <a href="{{ route('admin.brands.edit', $brand->id) }}" class="btn btn-info">Edit</a>

                                <a href="{{   route('admin.brands.delete',$brand->id) }}" class="btn btn-danger">Delete</a>
                                @if($sub_category->status == 'active')

                                <form action="{{ route('admin.brands.deactivate',$brand->id) }}" method="POST">
                                    @csrf

                                    <input type="submit" value="Deactivate" class="btn btn-warning mt-2">
                                </form>
                                @else

                                <form action="{{ route('admin.brands.activate',$brand->id) }}" method="POST">
                                    @csrf

                                    <input type="submit" value="Activate" class="btn btn-success mt-2">

                                    @endif
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

