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
    New Division
    </h6>
  </div>
<div class="card-body">
  <form id="form-positon" method="post" action="{{route('divisionupdate', ['ActivityID'=>$record->ActivityID])}}" enctype="multipart/form-data" class="row g-3">
    {{csrf_field()}}
    @method('PUT')
      <div class="col-md-12">
        <label class="form-label">Project Type</label>
        <select name="projecttype" class="form-control">
            @foreach($projectType as $pt)
              <option <?php if($record) ?> value={{$pt->ProjectTypeID}}>{{$pt->ProjectTypeName}}</option>
            @endforeach
        </select>
      </div>
      <div class="col-md-12">
          <label class="form-label">Divisions Name</label>
          <input name="activityname" type="text" class="form-control" value='{{$record->ActivityName}}'>
      </div>
      <div class="col-3" style="margin-left: auto; margin-top: 16px;">
          <button type="submit" class="btn btn-dark" style="float: right;">Save</button>
      </div>
  </form>
</div>
@stop