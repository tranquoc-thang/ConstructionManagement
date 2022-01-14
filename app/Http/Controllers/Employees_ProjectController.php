<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees_Project;
use Illuminate\Support\Facades\Auth;

class Employees_ProjectController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function insert($idproject) {
        $record = Employees_Project::where('ProjectID', $idproject)
                                   ->where('EmployeeID', request()->employeeID)
                                   ->first();
        if($record) {
            if($record->count() > 0) {
                return redirect()->route('projectdetail', [$idproject])->with('fail', 'Member already exists!');
            }
        }
        $employee_project = Employees_Project::create([
            'ProjectID' => $idproject,
            'EmployeeID' => request()->employeeID
        ]);
        return redirect()->route('projectdetail', [$idproject])->with('success', 'Add member succesfully!');
    }

    public function delete() {
        $record = Employees_Project::where('ProjectID', request()->projectid)
                                   ->where('EmployeeID', request()->employeeid)
                                   ->first();
    	Employees_Project::where('ProjectID', request()->projectid)
                         ->where('EmployeeID', request()->employeeid)
                         ->delete();
        return redirect()->route('projectdetail', [request()->projectid])->with('success', 'Remove member succesfully!');
    }
}
