@extends('layout')
@section('content')
<link rel="stylesheet" href="/css/style.css">
<div class="employee-wrap card shadow mt-3 mb-3">
  <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary"
          style="font-size: 22px; color: var(--secondary-color) !important;">
          Employee Detail
      </h6>
  </div>
  <div class="card-body">
      <form action="">
          <div class="row">
              <div class="col-4">
                  <div class="card">
                      <span class="border border-dark">
                          <img style="max-width: calc(100% - 8px); margin: 4px;"
                              src="/images/{{$record->Picture}}" alt="">
                      </span>
                  </div>
              </div>
              <div class="view-project col-8">
                  <div class="view-project-item row">
                      <h6 class="col-3">Employee Name:</h6>
                      <div class="col-9">{{$record->EmployeeName}}</div>
                  </div>
                  <div class="view-project-item row">
                      <h6 class="col-3">Gender:</h6>
                      <div class="col-9">{{$record->Gender}}</div>
                  </div>
                  <div class="view-project-item row">
                      <h6 class="col-3">Birth:</h6>
                      <div class="col-9">{{$record->BirthDate}}</div>
                  </div>
                  <div class="view-project-item row">
                      <h6 class="col-3">Address:</h6>
                      <div class="col-9">{{$record->Address}}</div>
                  </div>
                  <div class="view-project-item row">
                      <h6 class="col-3">Number:</h6>
                      <div class="col-9">{{$record->Phone}}</div>
                  </div>
                  <div class="view-project-item row">
                      <h6 class="col-3">Description:</h6>
                      <div class="col-9">{{$record->Email}}</div>
                  </div>
                  <div class="view-project-item row">
                      <h6 class="col-3">Position:</h6>
                      <div class="col-9">{{$positionRecord->PositionName}}</div>
                  </div>
              </div>
          </div>
      </form>
  </div>
</div>
@stop