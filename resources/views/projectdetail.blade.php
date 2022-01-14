@extends('layout')
@section('content')
<link rel="stylesheet" href="/css/style.css">
<div class="project-wrap card shadow mt-3 mb-3">
  <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary"
          style="font-size: 22px; color: var(--secondary-color) !important;">
          Project Detail
      </h6>
  </div>
  <div class="card-body">
      <form action="">
          <div class="row">
              <div class="col-4">
                  <div class="card">
                      <span class="border border-dark">
                          <img style="max-width: calc(100% - 8px); margin: 4px; min-height: 250px;"
                              src="/images/{{$record->Picture}}" alt="">
                      </span>
                  </div>
              </div>
              <div class="view-project col-8">
                  <div class="view-project-item row">
                      <h6 class="col-3">Project Name:</h6>
                      <div class="col-9">{{$record->ProjectName}}</div>
                  </div>
                  <div class="view-project-item row">
                      <h6 class="col-3">Location:</h6>
                      <div class="col-9">{{$record->Location}} 1</div>
                  </div>
                  <div class="view-project-item row">
                      <h6 class="col-3">Manager Name:</h6>
                      <div class="col-9">
                          <?php 
                          foreach($employee as $e) {
                            if($record->EmployeeID == $e->EmployeeID)
                                echo $e->EmployeeName;
                          } 
                          ?>
                      </div>
                  </div>
                  <div class="view-project-item row">
                      <h6 class="col-3">Start Date:</h6>
                      <div class="col-9">{{$record->StartDate}}</div>
                  </div>
                  <div class="view-project-item row">
                      <h6 class="col-3">Dead Line:</h6>
                      <div class="col-9">{{$record->EndDate}}</div>
                  </div>
                  <div class="view-project-item row">
                      <h6 class="col-3">Description:</h6>
                      <div class="col-9">{{$record->Descriptions}}</div>
                  </div>
                  <div class="view-project-item row">
                      <h6 class="col-3">Project Type:</h6>
                      <div class="col-9">
                          <?php
                            foreach($projectType as $pt) {
                            if($record->ProjectTypeID == $pt->ProjectTypeID)
                                echo $pt->ProjectTypeName;
                            } 
                          ?>
                      </div>
                  </div>
                  <div class="view-project-item row">
                      <h6 class="col-3">Budget:</h6>
                      <div class="col-9">{{$record->Cost}}</div>
                  </div>
              </div>
          </div>
      </form>
  </div>
  <div class="card">
      <div class="card-header">
          <h5 style="display: inline-block;">Project Progress</h5>
          <button id="btn-collapse1" class="btn btn-dark float-right" type="button" data-toggle="collapse" data-target="#collapse-progress" aria-expanded="false" aria-controls="collapse-progress">
              <i class="fas fa-angle-double-down"></i>
          </button>
      </div>
      <div class="card-body">
          <div class="collapse" id="collapse-progress">
                <?php
                    for($i = 0; $i < $project_progress->count(); $i++) {
                        for($j = 0; $j < $activity->count(); $j++) {
                            if($project_progress[$i]->ActivityID == $activity[$j]->ActivityID && $record->ProjectID == $project_progress[$i]->ProjectID)
                                echo "
                                <div class='row' style='margin-bottom: 8px;'>
                                    <div class='col-12 progress-name'>
                                        {$activity[$j]->ActivityName}
                                    </div>
                                    <div class='col-12 progress-value'>
                                        <div class='progress'>
                                            <div class='progress-bar progress-bar-js' role='progressbar' style='width: {$project_progress[$i]->Progress}%'
                                                aria-valuenow='100' aria-valuemin='0' aria-valuemax='100'></div>
                                        </div>
                                    </div>
                                </div>
                                ";
                        }
                    }
                ?>
                <div class='row' style='margin-bottom: 8px;'>
                    <div class='col-12 progress-name' style="font-weight: bold;">
                        Total
                    </div>
                    <div class='col-12 progress-value'>
                        <div class='progress'>
                            <div id="total-progress" class='progress-bar' role='progressbar' style='width: 0%'
                                aria-valuenow='100' aria-valuemin='0' aria-valuemax='100'></div>
                        </div>
                    </div>
                </div>
                @if((Auth::user()->level == 1 || Auth::user()->level == 2) && $record->Status == 0)
              <form method="POST" action="{{route('projectprogressupdate', ['ProjectID'=>$record->ProjectID])}}" enctype="multipart/form-data">
                  {{csrf_field()}}
                  @method('PUT')
                  <div class="form-group row mt-4">
                      <label class="col-sm-2 col-form-label">Project Divisions</label>
                      <div class="col-sm-5">
                          <select name="activityid" class="form-control">
                              <?php
                                for($i = 0; $i < $project_progress->count(); $i++) {
                                    for($j = 0; $j < $activity->count(); $j++) {
                                        if($project_progress[$i]->ActivityID == $activity[$j]->ActivityID && $record->ProjectID == $project_progress[$i]->ProjectID)
                                        echo "<option value='{$activity[$j]->ActivityID}'>{$activity[$j]->ActivityName}</option>";
                                    }
                                }
                                ?>
                          </select>
                        </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Project percent</label>
                      <div class="col-sm-5">
                        <input required name="progress" type="number" max="100" min="0" class="form-control">
                      </div>
                    </div>
                  <div class="form-group row">
                      <button id="updateProgress" class="btn btn-dark float-right" style="margin-left: 428px;">Update Progress</button>
                    </div>
                </form>
                <form method="POST" action="{{route('projectend', ['ProjectID'=>$record->ProjectID])}}" enctype="multipart/form-data">
                  {{csrf_field()}}
                  @method('PUT')
                  @if($record->Status == 0)
                  <div class="form-group row">
                      <button id="endProject" class="btn btn-dark float-right" style="margin-left: 465px;" disabled>End Project</button>
                  </div>
                  @endif
                </form>
              @endif
          </div>
      </div>
  </div>
  <div class="card">
      <div class="card-header">
          <h5 style="display: inline-block;">Member</h5>
          <button id="btn-collapse2" class="btn btn-dark float-right" type="button" data-toggle="collapse" data-target="#collapse-member" aria-expanded="false" aria-controls="collapse-member">
              <i class="fas fa-angle-double-down"></i>
          </button>
      </div>
      <div class="card-body">
          <div class="collapse" id="collapse-member">
                @if((Auth::user()->level == 1 || Auth::user()->level == 2) && $record->Status == 0)
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Project Position</label>
                  <div class="col-sm-6">
                      <select id="slt1" class="form-control">
                          @foreach($position as $p)
                            <option value={{$p->PositionID}}>{{$p->PositionName}}</option>
                          @endforeach
                      </select>
                  </div>
                </div>
                <form method="POST" action="{{route('employeeprojectinsert', ['ProjectID'=>$record->ProjectID])}}" enctype="multipart/form-data">
                        <div class="form-group row">
                    {{csrf_field()}}
                    <label style="max-width: unset;" class="col-sm-2 col-form-label">Project Member</label>
                    <div class="col" style="display: flex;">
                        <select id="slt2" class="form-control" name="employeeID" style="max-width: 50%;">
                            <option value="">--Select Member--</option>
                        </select>
                        <button id="btn-addmember" type="submit" class="btn btn-dark" style="margin-left: 12px">Add</button>
                    </div>
                </div>
                </form>
                @endif
                <table class="table table-bordered dataTable" id="dataTable"
                          width="100%" cellspacing="0" role="grid"
                          aria-describedby="dataTable_info" style="width: 100%;">
                          <thead>
                              <tr role="row">
                                  <th class="sorting sorting_asc" tabindex="0"
                                      aria-controls="dataTable" rowspan="1" colspan="1"
                                      aria-sort="ascending"
                                      aria-label="Name: activate to sort column descending"
                                      style="width: 15%;">Avatar</th>
                                  <th class="sorting" tabindex="0" aria-controls="dataTable"
                                      rowspan="1" colspan="1"
                                      aria-label="Position: activate to sort column ascending"
                                      style="width: 15%;">Code</th>
                                  <th class="sorting" tabindex="0" aria-controls="dataTable"
                                      rowspan="1" colspan="1"
                                      aria-label="Office: activate to sort column ascending"
                                      style="width: 20%;">Name</th>
                                @if(Auth::user()->level == 1 || Auth::user()->level == 2)
                                  <th class="sorting" tabindex="0" aria-controls="dataTable"
                                      rowspan="1" colspan="1"
                                      aria-label="Start date: activate to sort column ascending"
                                      style="width: 15%">Action</th>
                                @endif
                              </tr>
                          </thead>
                          <tbody>
                            @foreach($employee_project as $ep => $val)
                            @if($val == $record->ProjectID)
                            <tr>
                                <td>
                                    @foreach($employee as $e)
                                    @if($e->EmployeeID == $ep)
                                    <img style="max-width: 80px;" src="/images/{{$e->Picture}}" alt="images">
                                    @endif
                                    @endforeach
                                </td>
                                <td>{{$ep}}</td>
                                <td>
                                    @foreach($employee as $e)
                                    @if($e->EmployeeID == $ep)
                                    {{$e->EmployeeName}}
                                    @endif
                                    @endforeach
                                </td>
                                @if(Auth::user()->level == 1 || Auth::user()->level == 2)
                                <td>
                                <form
                                    method="GET"
                                    action="{{route('employeeprojectdelete')}}" 
                                    enctype="multipart/form-data">
                                    <input name="projectid" type="hidden" value='{{$record->ProjectID}}'>
                                    @foreach($employee as $e)
                                    @if($e->EmployeeID == $ep)
                                      <input name="employeeid" type="hidden" value='{{$e->EmployeeID}}'>
                                    @endif
                                    @endforeach
                                    <button type="submit" class="btn btn-dark">X</button>
                                </form>
                                </td>
                                @endif
                            </tr>
                            @endif
                            @endforeach
                          </tbody>
                </table>
            </div>
      </div>
  </div>
  <div class="card">
      <div class="card-header">
          <h5 style="display: inline-block;">Material</h5>
          <button id="btn-collapse3" class="btn btn-dark float-right" type="button" data-toggle="collapse" data-target="#collapse-material" aria-expanded="false" aria-controls="collapse-material">
              <i class="fas fa-angle-double-down"></i>
          </button>
      </div>
      <div class="card-body">
          <div class="collapse" id="collapse-material">
            <form method="POST" action="{{route('materialprojectupdate', ['ProjectID'=>$record->ProjectID])}}" enctype="multipart/form-data">
                {{csrf_field()}}
                @method('PUT')
                <table class="tb-new-project" width="100%">
                <thead>
                    <tr role="row">
                        <th style="width: 20%;">Item</th>
                        <th style="width: 20%;">Unit Of Measure</th>
                        <th style="width: 20%;">Rate/Unit</th>
                        <th style="width: 20%;">Quantity</th>
                        <th style="width: 20%;">Amount</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th colspan="1">Total:</th>
                        <th id="totalMaterialCost" colspan="5">0</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($material as $m)
                    @foreach($material_project as $mp)
                        @if($m->MaterialsID == $mp->MaterialsID && $mp->ProjectID == $record->ProjectID)
                        <tr>
                            <input type="hidden" name="id[]" value='{{$m->MaterialsID}}'>
                            <td><input value='{{$m->MaterialsName}}' name="name[]" type="text" readonly required></td>
                            <td><input value='{{$m->CalculationUnit}}' type="text" readonly required></td>
                            <td><input class="rateInput" name="rate[]" value='{{$mp->Price}}' type="number" required></td>
                            <td><input class="quantityInput" name="quantity[]" value='{{$mp->Quantity}}' type="number" required></td>
                            <td><input class="totalInput" name="total[]" value='{{$mp->Price*$mp->Quantity}}' type="number" readonly required></td>
                        </tr>
                        @endif
                    @endforeach
                    @endforeach
                    <script>
                        let rateInput = document.querySelectorAll('.rateInput')
                        let quantityInput = document.querySelectorAll('.quantityInput')
                        let totalInput = document.querySelectorAll('.totalInput')
                        let totalMaterialCost = document.querySelector('#totalMaterialCost')
                        let MaterialCost = 0;

                        rateInput.forEach(function (value, index) {
                            rateInput[index].addEventListener('change', function() {
                                totalInput[index].value = parseInt(rateInput[index].value) * parseInt(quantityInput[index].value)
                                MaterialCost += parseInt(totalInput[index].value)
                                totalMaterialCost.innerText = MaterialCost
                            })
                            quantityInput[index].addEventListener('change', function() {
                                totalInput[index].value = parseInt(rateInput[index].value) * parseInt(quantityInput[index].value)
                                MaterialCost += parseInt(totalInput[index].value)
                                totalMaterialCost.innerText = MaterialCost
                            })
                            MaterialCost += parseInt(totalInput[index].value)
                            totalMaterialCost.innerText = MaterialCost
                        })
                    </script>
                </tbody>
            </table>
                @if((Auth::user()->level == 1 || Auth::user()->level == 2) && $record->Status == 0)
                <div class="form-group row">
                    <button class="btn btn-dark" style="margin: 20px 14px 0 auto;">Update</button>
                </div>
                @endif
            </form>
        </div>
    </div>
  </div>
</div>

<script>
    var optionArray = <?php echo $position ?>;
    var optionEmployee = <?php echo $employee ?>;
    
    // Select Position
    document.querySelector('#slt1').addEventListener('change', function() {
        var s1 = document.getElementById('slt1')
        var s2 = document.getElementById('slt2')
        s2.innerHTML = ""
        
        for(var i = 0; i < optionArray.length; i++) { 
            for(var j = 0; j < optionEmployee.length; j++) {
                if(s1.value == optionArray[i].PositionID && s1.value == optionEmployee[j].PositionID) {
                    var newOption = document.createElement("option")
                    newOption.value = optionEmployee[j].EmployeeID
                    newOption.innerHTML = optionEmployee[j].EmployeeName
                    s2.options.add(newOption)
                }
            }
        }
    })


    // Add member
    const btnAddMember = document.querySelector("#btn-addmember");
    const table = document.querySelector("#dataTable");
    btnAddMember.addEventListener("click", () => {
        let idMember = document.querySelector('#slt2').selectedOptions[0].value
        if(idMember) {
            for(var i = 0; i < optionEmployee.length; i++) {
                if(idMember == optionEmployee[i].EmployeeID) {
                    var result = optionEmployee[i]
                    let html = "";
                    html = table.innerHTML;
                    html += `
                        <td><img style="max-width: 80px;" src="/images/${result.Picture}" alt=""></td>
                        <td name="${result.EmployeeID}">${result.EmployeeID}</td>
                        <td>${result.EmployeeName}</td>
                        <td><button class="btn btn-dark" onclick="this.parentElement.parentElement.remove()">X</button></td>
                    `;
                    table.innerHTML = html;
                }
            }
        }
    });


    // Auto open collapse when load pageNumber
    window.onload = function() {
        document.querySelector('#btn-collapse3').click()
        document.querySelector('#btn-collapse2').click()
        document.querySelector('#btn-collapse1').click()
    }

    // Progress and End Project
    const ProgressBars = document.querySelectorAll(".progress-bar-js")
    const TotalProgresBar = document.querySelector("#total-progress")
    const EndProjectButton = document.querySelector("#endProject")
    let totalValue = 0;
    ProgressBars.forEach(function (value, index) {
        totalValue += parseInt(ProgressBars[index].style.width)
        TotalProgresBar.style.width = (totalValue / ProgressBars.length) + '%'
        if(parseInt(TotalProgresBar.style.width) >= 100) {
            if(EndProjectButton) {
                EndProjectButton.disabled = false
            }
        } else {
            if(EndProjectButton) {
                EndProjectButton.disabled = true
            }
        }
    })
</script>
@stop