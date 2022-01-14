@extends('layout')
@section('content')
  <div class="card shadow mt-3 mb-3">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary"
              style="display: inline-block; font-size: 22px; color: var(--secondary-color) !important;">
              User</h6>
          <button type="button" 
                  class="btn btn-dark" 
                  data-toggle="modal"
                  data-target="#exampleModal" 
                  style="float: right;"
                  id="btn-new-position"
                  >
                  <span style="font-size: 18px;font-weight: 900;">&#43;</span>
                   New User
          </button>
          <!-- Modal New Position -->
          <div class="modal fade" id="exampleModal" style="font-size: 16px !important;">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5>New User</h5>
                          <button type="button" class="close" data-dismiss="modal">
                              <span>&times;</span>
                          </button>
                      </div>
                      <div class="my-modal-body">
                          <form id="form-positon" method="POST" action="{{route('userinsert')}}" enctype="multipart/form-data" class="row g-3">
                              {{csrf_field()}}
                              <div class="col-md-12">
                                  <label class="form-label">Name</label>
                                  <input name="name" type="text" class="form-control" value='{{old("name")}}'>
                              </div>
                              <div class="col-md-12">
                                  <label class="form-label">Email</label>
                                  <input name="email" type="text" class="form-control" value='{{old("email")}}'>
                              </div>
                              <div class="col-md-12">
                                  <label class="form-label">Password</label>
                                  <input name="password" type="password" class="form-control">
                              </div>
                              <div class="col-md-12">
                                  <label class="form-label">Confirmation Password</label>
                                  <input name="password_confirmation" type="password" class="form-control">
                              </div>
                              <div class="col-md-12">
                                  <label class="form-label">Role</label>
                                  <select name="level" class="form-control">
                                    <option value="3">Moderator</option>
                                    <option value="2">Manager</option>
                                    <option value="1">Admin</option>
                                  </select>
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
                                      <th style="width: 20%;">Name</th>
                                      <th style="width: 30%;">Email</th>
                                      <th style="width: 20%;">Role</th>
                                      <th style="width: 20%;">Action</th>
                                  </tr>
                              </thead>
                              <tfoot>
                                  <tr>
                                      <th>Name</th>
                                      <th>Email</th>
                                      <th>Role</th>
                                      <th>Action</th>
                                  </tr>
                              </tfoot>
                              <tbody>
                                  @foreach($user as $u)
                                    <tr data-index = {{$u->id}}>
                                      <td>{{$u->name}}</td>
                                      <td>{{$u->email}}</td>
                                      <td>
                                        <?php 
                                          if($u->level == 1)
                                            echo 'Admin';
                                          else if($u->level == 2)
                                            echo 'Manager';
                                          else
                                            echo 'Moderator';
                                        ?>
                                      </td>
                                      <td>
                                        <a style="font-size:12px;" 
                                           class="btn btn-success"
                                           href="{{route('useredit', ['id'=>$u->id])}}"
                                        >
                                          <i class="fas fa-edit"></i>
                                        </a>
                                        
                                        <a style="font-size:12px;" 
                                           class="btn btn-danger" 
                                           href="{{route('userdelete', ['id'=>$u->id])}}"
                                        >
                                          <i class="fas fa-trash"></i>
                                        </a>
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
                                $showingTo = $user->count();
                                if(request()->page) {
                                  $pageNumber = request()->page;
                                  $showingFrom = $user->count()*($pageNumber-1)+1;
                                  $showingTo = $user->count()*$pageNumber;
                                  if($user->count() < request()->dataTable_length) {
                                    $showingTo = $totalUser->count();
                                    $showingFrom+=2;
                                  }
                                }
                              ?>
                              Showing 
                              {{$showingFrom}} to 
                              {{$showingTo}} of 
                              {{$totalUser->count()}} 
                              entries
                            </div>
                      </div>
                      <div class="col-sm-12 col-md-7" style="display: flex; justify-content: flex-end">
                        {{$user->appends(request()->all())->links()}}
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
@stop