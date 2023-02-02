@extends('admin.layouts.master')
@section('page-title')
All Sub category
@endsection
@section('page-content')
<div class="card">
    <div class="card-header">
       <h4> All Sub category</h4>
    </div>

    @if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>

    @endif

<div class="card-body">
    <div class="table-responsive">
        <table id="sub_category_table" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
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
                @foreach ($sub_categories as $sub_category)
                <tr>
                    <td>{{  $sub_category->id}}</td>
                    <td>{{ $sub_category->sub_category_name }}</td>
                    <td>{{ $sub_category->slug }}</td>
                    {{-- <td>{{ $sub_category->status }}</td> --}}
                    {{-- condition to display active or inactive button --}}
                    <td>
                        @if($sub_category->status == 'active')

                        <div class="badge badge-success">Active</div>
                        @else
                        <div class="badge badge-danger">Inactive</div>
                        @endif
                        </td>
                        <td>
                            <div>
                                <a href="" class="btn btn-info">Edit</a>

                                <a href="" class="btn btn-danger">Delete</a>
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

