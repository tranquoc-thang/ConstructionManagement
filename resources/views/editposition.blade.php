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
    New Position
    </h6>
  </div>
<div class="card-body">
  <?php
    $idposition = substr(request()->getRequestUri(),15)
  ?>
  <form id="form-positon" method="post" action="{{route('positionupdate', ['PositionID'=>$idposition])}}" enctype="multipart/form-data" class="row g-3">
    {{csrf_field()}}
    @method('PUT')
      <div class="col-md-12">
        <label class="form-label">Position Name</label>
        <input name="positionname" type="text" class="form-control" value = {{$record->PositionName}}>
      </div>
      <div class="col-md-12">
        <label class="form-label">Daily Rate</label>
        <input name="salary" type="number" class="form-control" value = {{$record->Salary}}>
      </div>
      <div style="margin: 16px 15px 0 auto">
        <button type="submit" class="btn btn-dark">Update</button>
      </div>     
  </form>
</div>
@stop