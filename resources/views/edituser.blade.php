@extends('layout')
@section('content')
<link rel="stylesheet" href="/css/style.css">
<div class="card shadow mt-3 mb-3">
  <div class="card-header py-3">
    <h6
    class="m-0 font-weight-bold text-primary"
    style="
    display: inline-block;
    font-size: 22px;
    color: var(--secondary-color) !important;
    "
    >
    Edit User
    </h6>
  </div>
<div class="card-body">
  <form id="form-positon" method="post" action="{{route('userupdate', ['id'=>$record->id])}}" enctype="multipart/form-data" class="row g-3">
    {{csrf_field()}}
    @method('PUT')
    <div class="col-md-12">
        <label class="form-label">Name</label>
        <input name="name" type="text" class="form-control" value='{{$record->name}}'>
    </div>
    <div class="col-md-12">
        <label class="form-label">Email</label>
        <input name="email" type="text" class="form-control" value='{{$record->email}}'>
    </div>
    <div class="col-md-12">
        <label class="form-label">Password</label>
        <input name="password" type="password" class="form-control">
    </div>
    <div class="col-md-12">
        <label class="form-label">Password Confirmation</label>
        <input name="password_confirmation" type="password" class="form-control">
    </div>
    <div class="col-md-12">
        <label class="form-label">Role</label>
        <select name="level" class="form-control">
          <option <?php if($record->level == 3) echo 'selected'?> value="3">Moderator</option>
          <option <?php if($record->level == 2) echo 'selected'?> value="2">Manager</option>
          <option <?php if($record->level == 1) echo 'selected'?> value="1">Admin</option>
        </select>
    </div>
    <div class="col-3" style="margin-left: auto; margin-top: 16px;">
        <button type="submit" class="btn btn-dark" style="float: right;">Save</button>
    </div>
  </form>
</div>
@stop