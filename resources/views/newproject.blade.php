@extends('layout')
@section('content')
<link rel="stylesheet" href="/css/style.css">
<div class="collapse-new-project" style="margin-top: 16px;">
  <div class="card">
      <div class="card-header">
          <h5>New Project</h5>
      </div>
      <div class="card-body">
          <form method="POST" action="{{route('projectinsert')}}" enctype="multipart/form-data">
            {{csrf_field()}}
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Project Name</label>
                <div class="col-sm-10">
                  <input name="projectname" type="text" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Location</label>
                <div class="col-sm-10">
                  <input name="location" type="text" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Manager Name</label>
                  <div class="col-sm-10">
                      <select name="manager" class="form-control">
                            @foreach($manager as $m => $val)
                            <option value="{{$val}}">{{$m}}</option>
                            @endforeach
                      </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Start Date</label>
                  <div class="col-sm-10">
                    <input name="startdate" type="date" class="form-control">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">End Date</label>
                  <div class="col-sm-10">
                    <input name="enddate" type="date" class="form-control">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Budget</label>
                  <div class="col-sm-10">
                    <input name="budget" type="number" class="form-control">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Description</label>
                  <div class="col-sm-10">
                    <input name="description" type="text" class="form-control">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Image for project</label>
                  <div class="col-sm-6">
                      <input type="file" class="form-control" id="inputFile" name="inputFile">
                      <img id="img-preview-project" style="max-width: 100%;" class="col-sm-2 form-control offset-md-0" src="/images/defaultproject.jpg" alt="">
                  </div>
                </div>
                <script>
                    const reader = new FileReader()
                    document.querySelector('#inputFile').addEventListener('change', function () {
                        const file = this.files[0]
                        if(file) {
                            reader.onload = function() {
                                document.querySelector('#img-preview-project').setAttribute("src", this.result)
                            }
                        } else {
                            document.querySelector('#img-preview-project').setAttribute("src", '/images/defaultproject.jpg')
                        }
                        reader.readAsDataURL(file)
                    })
                </script>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Project Type</label>
                  <div class="col-sm-10">
                      <select name="projecttype" class="form-control" id="slt0">
                          @foreach($projectType as $pt)
                            <option name="value-projecttype" id="value-projecttype" value="{{$pt->ProjectTypeID}}">{{$pt->ProjectTypeName}}</option>
                          @endforeach
                      </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Project Divisions</label>
                  <div class="col-sm-10">
                      <div class="form-control">
                          <ul style="margin-left: 20px;" id="listDivision">
                            @foreach($projectType as $pt)
                            @foreach($activity as $a)
                                @if($pt->ProjectTypeID == $a->ProjectTypeID)
                                    <li>{{$a->ActivityName}}</li>
                                @endif
                            @endforeach
                            @break
                            @endforeach
                          </ul>
                      </div>
                  </div>
                </div>
                    
                <div style="float: right; margin-top: 24px;">
                  <input type="submit" class="btn btn-dark" value="Save">
                  <input type="button" class="btn btn-dark" value="Cancel">
                </div>
            </form>
      </div>
  </div>
</div>
<script>
    var optionArray = <?php echo $position ?>;
    var optionEmployee = <?php echo $employee ?>;
    
    // Select Position
    // document.querySelector('#slt1').addEventListener('change', function() {
    //     var s1 = document.getElementById('slt1')
    //     var s2 = document.getElementById('slt2')
    //     s2.innerHTML = ""
        
    //     for(var i = 0; i < optionArray.length; i++) { 
    //         for(var j = 0; j < optionEmployee.length; j++) {
    //             if(s1.value == optionArray[i].PositionID && s1.value == optionEmployee[j].PositionID) {
    //                 var newOption = document.createElement("option")
    //                 newOption.value = optionEmployee[j].EmployeeID
    //                 newOption.innerHTML = optionEmployee[j].EmployeeName
    //                 s2.options.add(newOption)
    //             }
    //         }
    //     }
    // })

    // Change divisions when select project type
    var projectType = <?php echo $projectType ?>;
    var activity = <?php echo $activity ?>;

    document.querySelector('#slt0').addEventListener('change', function() {
        var s1 = document.getElementById('slt0')
        var s2 = document.getElementById('listDivision')
        s2.innerHTML = ""
        
        for(var i = 0; i < projectType.length; i++) { 
            for(var j = 0; j < activity.length; j++) {
                if(s1.value == projectType[i].ProjectTypeID && s1.value == activity[j].ProjectTypeID) {
                    var li = document.createElement("li");
                    li.appendChild(document.createTextNode(`${activity[j].ActivityName}`));
                    s2.appendChild(li);
                }
            }
        }
    })
        

    // Add member
    // const btnAddMember = document.querySelector("#btn-addmember");
    // const table = document.querySelector("#dataTable");
    // btnAddMember.addEventListener("click", () => {
    //     let idMember = document.querySelector('#slt2').selectedOptions[0].value
    //     if(idMember) {
    //         for(var i = 0; i < optionEmployee.length; i++) {
    //             if(idMember == optionEmployee[i].EmployeeID) {
    //                 var result = optionEmployee[i]
    //                 let html = "";
    //                 html = table.innerHTML;
    //                 html += `
    //                     <td>1</td>
    //                     <td name="${result.EmployeeID}">${result.EmployeeID}</td>
    //                     <td>${result.EmployeeName}</td>
    //                     <td><button class="btn btn-dark" onclick="this.parentElement.parentElement.remove()">X</button></td>
    //                 `;
    //                 table.innerHTML = html;
    //             }
    //         }
    //     }

        
    // });

</script>
@stop
                