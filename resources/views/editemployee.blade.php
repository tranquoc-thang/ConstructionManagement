@extends('layout')
@section('content')
<link rel="stylesheet" href="/css/style.css">
<div class="collapse-new-project" style="margin-top: 16px;">
  <div class="card">
      <div class="card-header">
          <h5>Edit Employee</h5>
      </div>
      <div class="card-body">
        <?php
          $idproject = substr(request()->getRequestUri(),14);
        ?>
          <div class="my-modal-body">
            <form id="form-positon" method="POST" action="{{route('employeeupdate', ['EmployeeID'=>$record->EmployeeID])}}" enctype="multipart/form-data" class="row g-3">
            {{csrf_field()}}
            @method('PUT')
              <div class="col-md-12">
                <label class="form-label">Full Name</label>
                <input name="name" type="text" class="form-control" value='{{$record->EmployeeName}}' />
              </div>
              <div class="col-12">
                <label class="form-label">Birthday</label>
                <input name="birth" type="date" class="form-control" value='{{$record->BirthDate}}' />
              </div>
              <div class="col-md-6">
                <label class="form-label">Gender</label>
                <select name="gender" class="form-control">
                    <option <?php if($record->Gender == 'Male') echo 'selected' ?> value='Male'>Male</option>
                    <option <?php if($record->Gender == 'Female') echo 'selected' ?> value='Female'>Female</option>
                    <option <?php if($record->Gender == 'Other') echo 'selected' ?> value='Other'>Other</option>
                </select>
              </div>
              <div class="col-md-6">
                <label class="form-label">Position</label>
                <select name="position" class="form-control">
                  @foreach($position as $p)
                    <option <?php if($record->PositionID == $p->PositionID) echo 'selected' ?> value='{{$p->PositionID}}'>{{$p->PositionName}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-12">
                <label class="form-label">Phone Number</label>
                <input name="phone" type="tel" class="form-control" value='{{$record->Phone}}' />
              </div>
              <div class="col-md-12">
                <label class="form-label">Email</label>
                <input name="email" type="email" class="form-control" value='{{$record->Email}}' />
              </div>
              <div class="col-md-12">
                <label class="form-label">Address</label>
                <input name="address" type="text" class="form-control" value='{{$record->Address}}' />
              </div>
              <div class="col-md-12">
                <label class="form-label">Avatar</label>
                <input type="file" class="form-control" id="inputFile" name="inputFile">
              </div>
              <div
                class="col-3"
                style="margin-left: auto; margin-top: 16px"
              >
                <button type="submit" class="btn btn-dark" style="float:right;">
                  Save
                </button>
              </div>
            </form>
          </div>
      </div>
  </div>
</div>
@stop