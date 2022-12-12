@extends('admin.layouts.master')
@section('page-content')
<div class="card">
    <div class="card-header">
       <h4> All Brands</h4>
    </div>
<div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-md">
        <tbody><tr>
          <th>#</th>
          <th>Name</th>
          <th>Slug</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
        <tr>
          <td>1</td>
          <td>Irwansyah Saputra</td>
          <td>2017-01-09</td>
          <td>
            <div class="badge badge-success">Active</div>
          </td>
          <td><a href="#" class="btn btn-primary">Detail</a></td>
        </tr>
        <tr>
          <td>2</td>
          <td>Hasan Basri</td>
          <td>2017-01-09</td>
          <td>
            <div class="badge badge-success">Active</div>
          </td>
          <td><a href="#" class="btn btn-primary">Detail</a></td>
        </tr>
        <tr>
          <td>3</td>
          <td>Kusnadi</td>
          <td>2017-01-11</td>
          <td>
            <div class="badge badge-danger">Not Active</div>
          </td>
          <td><a href="#" class="btn btn-primary">Detail</a></td>
        </tr>
        <tr>
          <td>4</td>
          <td>Rizal Fakhri</td>
          <td>2017-01-11</td>
          <td>
            <div class="badge badge-success">Active</div>
          </td>
          <td><a href="#" class="btn btn-primary">Detail</a></td>
        </tr>
      </tbody></table>
    </div>
  </div>
</div>
@endsection

