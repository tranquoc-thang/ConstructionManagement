@extends('layout')
@section('content')
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
      Employee
    </h6>
    <button
      type="button"
      class="btn btn-dark"
      data-toggle="modal"
      data-target="#exampleModal"
      data-whatever="@mdo"
      style="float: right"
    >
      <span style="font-size: 18px; font-weight: 900">&#43;</span>
      New Employee
    </button>
    <!-- Modal New Employee -->
    <div
      class="modal fade"
      id="exampleModal"
      style="font-size: 16px !important"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5>New Employee</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
            >
              <span>&times;</span>
            </button>
          </div>
          <div class="my-modal-body">
            <form id="form-positon" method="POST" action="{{route('employeeinsert')}}" enctype="multipart/form-data" class="row g-3">
            {{csrf_field()}}
              <div class="col-md-12">
                <label class="form-label">Full Name</label>
                <input name="name" type="text" class="form-control" />
              </div>
              <div class="col-12">
                <label class="form-label">Birthday</label>
                <input name="birth" type="date" class="form-control" />
              </div>
              <div class="col-md-6">
                <label class="form-label">Gender</label>
                <select name="gender" class="form-control">
                    <option value='Male'>Male</option>
                    <option value='Female'>Female</option>
                    <option value='Other'>Other</option>
                </select>
              </div>
              <div class="col-md-6">
                <label class="form-label">Position</label>
                <select name="position" class="form-control">
                  @foreach($position as $p)
                    <option value='{{$p->PositionID}}'>{{$p->PositionName}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-12">
                <label class="form-label">Phone Number</label>
                <input name="phone" type="tel" class="form-control" />
              </div>
              <div class="col-md-12">
                <label class="form-label">Email</label>
                <input name="email" type="email" class="form-control" />
              </div>
              <div class="col-md-12">
                <label class="form-label">Address</label>
                <input name="address" type="text" class="form-control" />
              </div>
              <div class="col-md-12">
                <label class="form-label">Avatar</label>
                <input type="file" class="form-control" id="inputFile" name="inputFile">
              </div>
              <div
                class="col-3"
                style="margin-left: auto; margin-top: 16px"
              >
                <button type="submit" class="btn btn-dark">
                  Create
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="card-body">
    <div class="table-responsive" style="overflow: visible">
      <div
        id="dataTable_wrapper"
        class="dataTables_wrapper dt-bootstrap4"
      >
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <div class="dataTables_length" id="dataTable_length">
              <form action="">
                  <label style="display: flex;">Show 
                    <select
                        id="selectShowing"
                        style="width: auto; margin: 0 4px;" name="dataTable_length"
                        aria-controls="dataTable"
                        class="custom-select custom-select-sm form-control form-control-sm"
                        >
                        <option <?php if(request()->dataTable_length == 5) echo 'selected' ?> value="5">5</option>
                        <option <?php if(request()->dataTable_length == 10) echo 'selected' ?> value="10">10</option>
                        <option <?php if(request()->dataTable_length == 20) echo 'selected' ?> value="20">20</option>
                        <?php 
                            $showEntities = 5;
                            if(request()->dataTable_length) {
                                $showEntities = request()->dataTable_length;
                            }
                        ?>
                        <script>
                            document.querySelector('#selectShowing').addEventListener('change', function () {
                                document.querySelector('#btn-numShowing').click();
                            })
                        </script>
                    </select> entries
                </label>
                <button class="d-none" id="btn-numShowing" type="submit"></button>
              </form>
            </div>
          </div>
          <div
            class="col-sm-12 col-md-6"
            style="display: flex; justify-content: flex-end"
          >
            <div id="dataTable_filter" class="dataTables_filter">
            <label style="display: flex; flex-wrap: nowrap;">
              <form style="display: flex;">
                <input id="searchpositon" style="padding-left: 8px;" 
                        name="search" 
                        placeholder="Search..."
                        value=<?php echo request()->search ?>
                        >
                <button id="btnSearch" type="submit" class="btn btn-dark">
                  <i class="fas fa-search"></i>
                </button>
              </form>
              </label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <table
              class="table table-bordered dataTable"
              id="dataTable"
              width="100%"
              cellspacing="0"
              role="grid"
              aria-describedby="dataTable_info"
              style="width: 100%"
            >
              <thead>
                <tr role="row">
                  <th
                    class="sorting sorting_asc"
                    tabindex="0"
                    aria-controls="dataTable"
                    rowspan="1"
                    colspan="1"
                    aria-sort="ascending"
                    aria-label="Name: activate to sort column descending"
                    style="width: 20%"
                  >
                    Avatar
                  </th>
                  <th
                    class="sorting"
                    tabindex="0"
                    aria-controls="dataTable"
                    rowspan="1"
                    colspan="1"
                    aria-label="Position: activate to sort column ascending"
                    style="width: 20%"
                  >
                    Name
                  </th>
                  <th
                    class="sorting"
                    tabindex="0"
                    aria-controls="dataTable"
                    rowspan="1"
                    colspan="1"
                    aria-label="Office: activate to sort column ascending"
                    style="width: 20%"
                  >
                    Gender
                  </th>
                  <th
                    class="sorting"
                    tabindex="0"
                    aria-controls="dataTable"
                    rowspan="1"
                    colspan="1"
                    aria-label="Age: activate to sort column ascending"
                    style="width: 20%"
                  >
                    Phone
                  </th>
                  <th
                    class="sorting"
                    tabindex="0"
                    aria-controls="dataTable"
                    rowspan="1"
                    colspan="1"
                    aria-label="Start date: activate to sort column ascending"
                    style="width: 20%"
                  >
                    Action
                  </th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th rowspan="1" colspan="1">Avatar</th>
                  <th rowspan="1" colspan="1">Name</th>
                  <th rowspan="1" colspan="1">Gender</th>
                  <th rowspan="1" colspan="1">Phone</th>
                  <th rowspan="1" colspan="1">Action</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach($employees as $e)
                  <tr>
                    <td>
                      <img
                        class='employee-avatar'
                        src='images/{{$e->Picture}}'
                      />
                    </td>
                    <td>{{$e->EmployeeName}}</td>
                    <td>{{$e->Gender}}</td>
                    <td>{{$e->Phone}}</td>
                    <td>
                      <a style='font-size:12px;' 
                          class='btn btn-primary'
                          href="{{route('employeedetail', ['EmployeeID'=>$e->EmployeeID])}}"
                      >
                        <i class='fas fa-eye'></i>
                      </a>
                      @if(Auth::user()->level == 1 || Auth::user()->level == 2)
                      <a style='font-size:12px;' 
                          class='btn btn-success'
                          href="{{route('employeeedit', ['EmployeeID'=>$e->EmployeeID])}}"
                      >
                        <i class='fas fa-edit'></i>
                      </a>
                      @endif
                      @if(Auth::user()->level == 1)
                      <a style='font-size:12px;'
                          class='btn btn-danger'
                          href="{{route('employeedelete', ['EmployeeID'=>$e->EmployeeID])}}"
                      >
                        <i class='fas fa-trash'></i>
                      </a>
                      @endif
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12 col-md-5">
            <div
              class="dataTables_info"
              id="dataTable_info"
              role="status"
              aria-live="polite"
              style="color: var(--text-content)"
            >
            <?php
              $showingFrom = 1;
              $showingTo = $employees->count();
              if(request()->page) {
                $pageNumber = request()->page;
                $showingFrom = $employees->count()*($pageNumber-1)+1;
                $showingTo = $employees->count()*$pageNumber;
                if($employees->count() < request()->dataTable_length) {
                  $showingTo = $totalEmployees->count();
                  $showingFrom+=2;
                }
              }
            ?>
            Showing 
            {{$showingFrom}} to 
            {{$showingTo}} of 
            {{$totalEmployees->count()}} 
            entries
            </div>
          </div>
          <div class="col-sm-12 col-md-7" style="display: flex; justify-content: flex-end">
            {{$employees->appends(request()->all())->links()}}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop