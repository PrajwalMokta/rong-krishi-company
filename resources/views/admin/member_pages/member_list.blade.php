@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Member List</h1>
        </div>
        <div class="col-sm-6" style="text-align:right;">
          <a href="{{url('/member_add')}}" class="btn btn-primary">Add New Member</a>
        </div>
      </div>
    </div>
  </div>

  @include('admin.auth.message')
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Member List</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Status</th>
            <th style="text-align: center;">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($getRecords as $value)
          <tr>
            <td>{{$no++}}</td>
            <td>{{$value->name}}</td>
            <td>{{$value->email}}</td>
            <td>
              @if ($value->status == 0)
              <span style="color: rgb(8, 165, 8)">Active</span>
              @endif
              @if ($value->status == 1)
              <span style="color: #D0342C">Inactive</span>
              @endif
            </td>
            <td style="text-align: center;">
              <a href="{{url('/member_edit/'.$value->id)}}" class="btn btn-primary" style="width: 100px;">Edit</a>
              <a onclick="confirmation(event)" href="{{url('/member_delete/'.$value->id)}}" class="btn btn-danger" style="width: 100px;">Delete</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div style="padding: 10px; float: right;">
        {!! $getRecords->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
@endsection