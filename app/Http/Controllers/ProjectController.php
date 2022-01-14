<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Employees;
use App\Models\ProjectType;
use App\Models\Activities;
use App\Models\Position;
use App\Models\Materials;
use App\Models\Materials_Project;
use App\Models\Employees_Project;
use App\Models\Project_Progress;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class ProjectController extends Controller
{
		public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $project = Project::where('Status', '0')->orderby('ProjectID','DESC')->paginate(5);
				$totalProject = Project::all();
				if(request()->dataTable_length) {
            $project = Project::where('Status', '0')->orderby('ProjectID','DESC')->paginate(request()->dataTable_length);
        }
				if(request()->statusend) {
						$project = Project::where('Status', '1')->orderby('ProjectID','DESC')->paginate(5);
        }
				if(request()->search) {
            $project = Project::where('Status', '0')
																->where('ProjectName','like','%'.request()->search.'%')
                                ->orwhere('Location','like','%'.request()->search.'%')
                                ->orwhere('EndDate','like','%'.request()->search.'%')
                                ->orderby('ProjectID','DESC')
                                ->paginate(5);
        }
        return view('project', compact('project', 'totalProject'));
    }

    public function show($id) {
        $record = Project::where('ProjectID', $id)->first();
        $employee = Employees::all();
				$position = Position::all();
        $projectType = ProjectType::all();
        $material = Materials::all();
        $project_progress = Project_Progress::all();
        $material_project = Materials_Project::all();
				$activity = Activities::all();
				$employee_project = Employees_Project::where('ProjectID', $id)->pluck('ProjectID', 'EmployeeID');
        return view('projectdetail', compact('record', 'employee', 'projectType', 'position', 'employee_project', 'material', 'material_project', 'project_progress', 'activity'));
    }

    public function create() {
        if(Auth::user()->level == 3) { 
					return redirect()->back();
				}

        $manager = Employees::where('PositionID', 10)->pluck('EmployeeID', 'EmployeeName');
        $projectType = ProjectType::all();
        $activity = Activities::all();
        $material = Materials::all();
        $position = Position::all();
        $employee = Employees::all();
        return view('newproject', compact('manager', 'projectType', 'activity', 'material', 'position', 'employee'));
    }

    public function insert(Request $request) {
			if(Auth::user()->level == 3) { 
				return redirect()->back();
			}
			$messages = [
				'projectname.required' => 'You need to enter Project Name',
				'location.required' => 'You need to enter Location',
				'manager.required' => 'You need to enter Manager',
				'startdate.required' => 'You need to enter Start Date',
				'enddate.required' => 'You need to enter End Date',
				'budget.required' => 'You need to enter Budget',
				'budget.max' => 'Budget max value is 999.999.999',
				'description.required' => 'You need to enter Description',
				'projecttype.required' => 'You need to enter Project Type',
				'inputFile.required' => 'You need to upload Image',
    	];
    	$controls = [
    		'projectname' => 'required',
    		'location' => 'required',
    		'manager' => 'required',
    		'startdate' => 'required',
    		'enddate' => 'required',
    		'budget' => 'required|max:999999999',
    		'description' => 'required',
    		'projecttype' => 'required',
    		'inputFile' => 'required',
    	];

    	$validator = Validator::make($request->all(), $controls, $messages);
    	$validator->validate();

			$filename = "";
    	if($request->file('inputFile')->isValid())
    	{
    		$filename = $request->inputFile->getClientOriginalName();
    		$request->inputFile->move('images/', $filename);
    	}
        
			$project = Project::create([
				'ProjectName'=>$request->projectname,
				'EmployeeID'=>$request->manager,
				'Location'=>$request->location,
				'StartDate'=>$request->startdate,
				'EndDate'=>$request->enddate,
				'Cost'=>$request->budget,
				'Descriptions'=>$request->description,
				'no_Worker'=>5,
				'Picture'=>$filename,
				'ProjectTypeID'=>$request->projecttype
    	]);

			// Add Materials_Project Default
			$last = Project::orderby('ProjectID', 'DESC')->first();
			$material = Materials::all();
			for($i = 0; $i < $material->count(); $i++) {
				Materials_Project::create([
					'ProjectID'=>$last->ProjectID,
					'MaterialsID'=>$material[$i]->MaterialsID
				]);
			}
			// Add Project_Progress Default
			$activity = Activities::all();
			for($i = 0; $i < $activity->count(); $i++) {
				if($activity[$i]->ProjectTypeID == $last->ProjectTypeID) {
					Project_Progress::create([
						'ProjectID'=>$last->ProjectID,
						'ActivityID'=>$activity[$i]->ActivityID
					]);
				}
			}
			return redirect()->route('projectlist')->with('success', 'Add project succesfully!');
    }

    public function delete($id) {
			if(Auth::user()->level == 3 || Auth::user()->level == 2) { 
				return redirect()->back();
			}
			$record = Project::where('ProjectID', $id)->first();
    	Project::where('ProjectID', $id)->delete();
    	return redirect()->route('projectlist')->with('success', 'Delete project succesfully!');
    }

    public function edit($id)
    {
			if(Auth::user()->level == 3 ) { 
				return redirect()->back();
			}
    	$record = Project::where('ProjectID', $id)->first();
			$manager = Employees::where('PositionID', 10)->pluck('EmployeeID', 'EmployeeName');
			$activity = Activities::all();
			$projectType = ProjectType::all();
    	return view('editproject', compact('record', 'manager', 'activity', 'projectType'));
    }

		public function update(Request $request, $ProjectID)
    {
		if(Auth::user()->level == 3 ) { 
			return redirect()->back();
		}
		$messages = [
				'projectname.required' => 'You need to enter Project Name',
				'location.required' => 'You need to enter Location',
				'manager.required' => 'You need to enter Manager',
				'startdate.required' => 'You need to enter Start Date',
				'enddate.required' => 'You need to enter End Date',
				'budget.required' => 'You need to enter Budget',
				'description.required' => 'You need to enter Description',
				'projecttype.required' => 'You need to enter Project Type',
    	];
    	$controls = [
    		'projectname' => 'required',
    		'location' => 'required',
    		'manager' => 'required',
    		'startdate' => 'required',
    		'enddate' => 'required',
    		'budget' => 'required',
    		'description' => 'required',
    		'projecttype' => 'required',
    	];

    	$validator = Validator::make($request->all(), $controls, $messages);
    	$validator->validate();

			$filename = "";
    	if($request->file('inputFile'))
    	{
    		$filename = $request->inputFile->getClientOriginalName();
    		$request->inputFile->move('images/', $filename);
    	}

			$Project = Project::where('ProjectID', $ProjectID)
			->update(
					['ProjectName' => request()->projectname,
					'EmployeeID' => request()->manager,
					'Location' => request()->location,
					'StartDate' => request()->startdate,
					'EndDate' => request()->enddate,
					'Cost' => request()->budget,
					'Descriptions' => request()->description,
					'no_Worker' => 6,
					'ProjectTypeID' => request()->projecttype]
			);

			if($filename) {
				$image = Project::where('ProjectID', $ProjectID)
				->update(
						['Picture' => $filename]
				);
			}
    	return redirect()->route('projectlist')->with('success', 'Update project succesfully!');
    }

		public function endProject($ProjectID) {
			if(Auth::user()->level == 3 ) { 
				return redirect()->back();
			}

			$Project = Project::where('ProjectID', $ProjectID)
			->update(
					['Status' => 1]
			);

    	return redirect()->back()->with('success', 'End project succesfully!');
		}
}
