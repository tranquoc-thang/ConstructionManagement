@extends('layout')
@section('content')
<div class="project-wrap card shadow mt-3 mb-3">
  <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary"
          style="display: inline-block; font-size: 22px; color: var(--secondary-color) !important;">
          Project</h6>
      <a href="{{route('projectcreate')}}">
     
        <button type="button" class="btn btn-dark btn-new-project" data-toggle="modal"
            data-target="#exampleModal" style="float: right;"><span
                style="font-size: 18px;font-weight: 900;">&#43;</span>
            New Project
        </button>
       
      </a>
      <div class ="btn-project-wrap">
        <form action="">
          <button type="submit" class="btn btn-success btn-ongoing">On going</button>
          <button type="submit" value="1" name="statusend" class="btn btn-dark btn-finished">Finished</button>
        </form>
      </div>
  </div>
  
  <div class="card-body">
      <div class="table-responsive" style="overflow: visible;">
          <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
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
                  <div class="col-sm-12 col-md-6"
                          style="display: flex; justify-content: flex-end">
                          <div id="dataTable_filter" class="dataTables_filter">
                              <label style="display: flex; flex-wrap: nowrap;">
                                <form style="display: flex;">
                                  <input id="searchpositon" style="padding-left: 8px;" 
                                         name="search" 
                                         placeholder="Search..."
                                         value='<?php echo request()->search ?>'
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
                      <table class="table table-bordered dataTable" id="dataTable"
                          width="100%" cellspacing="0" role="grid" style="width: 100%;">
                          <thead>
                              <tr role="row">
                                  <th style="width: 35%;">Project Name</th>
                                  <th style="width: 25%;">Location</th>
                                  <th style="width: 15%;">End Date</th>
                                  <th style="width: 25%;">Action</th>
                              </tr>
                          </thead>
                          <tfoot>
                              <tr>
                                  <th>Project Name</th>
                                  <th>Location</th>
                                  <th>End Date</th>
                                  <th>Action</th>
                              </tr>
                          </tfoot>
                          <tbody>
                            @foreach($project as $p)
                              <tr>
                                  <td>{{$p->ProjectName}}</td>
                                  <td>{{$p->Location}}</td>
                                  <td>{{$p->EndDate}}</td>
                                  <td>
                                    <a style="font-size:12px;" 
                                       class="btn btn-primary"
                                       href="{{route('projectdetail', ['ProjectID'=>$p->ProjectID])}}"
                                    >
                                      <i class="fas fa-eye"></i>
                                    </a>
                                    @if(Auth::user()->level == 1 || Auth::user()->level == 2)
                                    <a style="font-size:12px;" 
                                       class="btn btn-success" 
                                       href="{{route('projectedit', ['ProjectID'=>$p->ProjectID])}}"
                                    >
                                      <i class="fas fa-edit"></i>
                                    </a>
                                    @endif
                                    @if(Auth::user()->level == 1)
                                    <a style="font-size:12px;" 
                                       class="btn btn-danger" 
                                       href="{{route('projectdel', ['ProjectID'=>$p->ProjectID])}}"
                                    >
                                      <i class="fas fa-trash"></i>
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
                      <div class="dataTables_info" id="dataTable_info" role="status"
                          aria-live="polite" style="color: var(--text-content);">
                          <?php
                            $showingFrom = 1;
                            $showingTo = $project->count();
                            if(request()->page) {
                                $pageNumber = request()->page;
                                $showingFrom = $project->count()*($pageNumber-1)+1;
                                $showingTo = $project->count()*$pageNumber;
                                if($project->count() < request()->dataTable_length) {
                                $showingTo = $totalproject->count();
                                $showingFrom+=2;
                                }
                            }
                            ?>
                            Showing 
                            {{$showingFrom}} to 
                            {{$showingTo}} of 
                            {{$totalProject->count()}} 
                            entries
                      </div>
                  </div>
                  <div class="col-sm-12 col-md-7" style="display: flex; justify-content: flex-end">
                    {{$project->appends(request()->all())->links()}}
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
@stop