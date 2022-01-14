@extends('layout')
@section('content')
<div class="card shadow mt-3 mb-3">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"
            style="display: inline-block; font-size: 22px; color: var(--secondary-color) !important;">
            Divisions</h6>
        <button type="button" class="btn btn-dark" data-toggle="modal"
            data-target="#exampleModal" data-whatever="@mdo" style="float: right;"><span
                style="font-size: 18px;font-weight: 900;">&#43;</span> New Divisions</button>
        <!-- Modal New Divisions -->
        <div class="modal fade" id="exampleModal" style="font-size: 16px !important;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>New Divisions</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="my-modal-body">
                      <form id="form-positon" method="POST" action="{{route('divisioninsert')}}" enctype="multipart/form-data" class="row g-3">
                        {{csrf_field()}}
                        <div class="col-md-12">
                          <label class="form-label">Project Type</label>
                          <select name="projecttype" class="form-control">
                              @foreach($projectType as $pt)
                                <option value={{$pt->ProjectTypeID}}>{{$pt->ProjectTypeName}}</option>
                              @endforeach
                          </select>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Divisions Name</label>
                            <input name="activityname" type="text" class="form-control">
                        </div>
                        <div class="col-3" style="margin-left: auto; margin-top: 16px;">
                            <button type="submit" class="btn btn-dark">Create</button>
                        </div>
                      </form>
                    </div>
                </div>
            </div>
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
                    <div class="col-sm-12 col-md-6"
                        style="display: flex; justify-content: flex-end">
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
                        <table class="table table-bordered dataTable" id="dataTable"
                            width="100%" cellspacing="0" role="grid" style="width: 100%;">
                            <thead>
                                <tr role="row">
                                    <th style="width: 40%;">Divisions</th>
                                    <th style="width: 40%;">Project Type</th>
                                    @if(Auth::user()->level == 1)
                                    <th style="width: 20%;">Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Divisions</th>
                                    <th>Project Type</th>
                                    @if(Auth::user()->level == 1)
                                    <th>Action</th>
                                    @endif
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($activity as $a)
                                  <tr>
                                    <td>{{$a->ActivityName}}</td>
                                    <td>
                                      <?php
                                        for($i = 0; $i < $projectType->count(); $i++) {
                                          if($projectType[$i]->ProjectTypeID == $a->ProjectTypeID) {
                                            echo 
                                              $projectType[$i]->ProjectTypeName
                                            ;
                                          }
                                        }
                                      ?>
                                    </td>
                                    @if(Auth::user()->level == 1)
                                    <td>
                                      <a style="font-size:12px;" 
                                          class="btn btn-success"
                                          href="{{route('divisionedit', ['ActivityID'=>$a->ActivityID])}}"
                                      >
                                        <i class="fas fa-edit"></i>
                                      </a>
                                      
                                      <a style="font-size:12px;" 
                                          class="btn btn-danger" 
                                          href="{{route('divisiondelete', ['ActivityID'=>$a->ActivityID])}}"
                                      >
                                        <i class="fas fa-trash"></i>
                                      </a>
                                    </td>
                                    @endif
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
                          $showingTo = $activity->count();
                          if(request()->page) {
                            $pageNumber = request()->page;
                            $showingFrom = $activity->count()*($pageNumber-1)+1;
                            $showingTo = $activity->count()*$pageNumber;
                            if($activity->count() < request()->dataTable_length) {
                              $showingTo = $totalActivity->count();
                              $showingFrom+=2;
                            }
                          }
                        ?>
                        Showing 
                        {{$showingFrom}} to 
                        {{$showingTo}} of 
                        {{$totalActivity->count()}} 
                        entries
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-7" style="display: flex; justify-content: flex-end">
                        {{$activity->appends(request()->all())->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop