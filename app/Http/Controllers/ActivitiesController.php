<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Activities;
use App\Models\ProjectType;
use Illuminate\Support\Facades\Auth;

class ActivitiesController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index() {
        if(Auth::user()->level == 3) {
            return redirect()->back();
        }

        $projectType = ProjectType::all();
        $activity = Activities::orderby('ActivityID','DESC')->paginate(5);
        if(request()->dataTable_length) {
            $activity = Activities::orderby('ActivityID','DESC')->paginate(request()->dataTable_length);
        }
        $totalActivity = Activities::all();
        if(request()->search) {
            $activity = Activities::where('ActivityName','like','%'.request()->search.'%')
                                ->orderby('ActivityID','DESC')
                                ->paginate(5);            
        }
        return view('division', compact('activity', 'totalActivity', 'projectType'));
    }

    public function insert(Request $request)
    {
        if(Auth::user()->level == 3) {
            return redirect()->back();
        }

        $messages = [
    	'projecttype.required' => 'You need to select Project Type',
    	'activityname.required' => 'You need to enter Division Name',
    	];
    	$controls = [
    		'projecttype' => 'required',
    		'activityname' => 'required',
    	];
    	$validator = Validator::make($request->all(), $controls, $messages);
    	$validator->validate();

        $position = Activities::create([
    		'ProjectTypeID'=>$request->projecttype,
    		'ActivityName'=>$request->activityname
    	]);
        return redirect()->route('divisionlist')->with('success', 'Add division succesfully!');
    }

    public function delete($id)
    {
        if(Auth::user()->level == 3 || Auth::user()->level == 2) {
            return redirect()->back();
        }

    	$record = Activities::where('ActivityID', $id)->first();
    	Activities::where('ActivityID', $id)->delete();
    	return redirect()->route('divisionlist')->with('success', 'Remove division succesfully!');
    }

    public function edit($id)
    {
        if(Auth::user()->level == 3 || Auth::user()->level == 2) {
            return redirect()->back();
        }

    	$record = Activities::where('ActivityID', $id)->first();
        $projectType = ProjectType::all();
    	return view('editdivision', compact('record', 'projectType'));
    }

    public function update(Request $request, $PositionID)
    {
        if(Auth::user()->level == 3 || Auth::user()->level == 2) {
            return redirect()->back();
        }

        $messages = [
    	'projecttype.required' => 'You need to select Project Type',
    	'activityname.required' => 'You need to enter Division Name',
    	];
    	$controls = [
    		'projecttype' => 'required',
    		'activityname' => 'required',
    	];
    	$validator = Validator::make($request->all(), $controls, $messages);
    	$validator->validate();

        $activity = Activities::where('ActivityID', $PositionID)
        ->update(
            ['ProjectTypeID' => request()->projecttype,
            'ActivityName' => request()->activityname],
        );
    	return redirect()->route('divisionlist')->with('success', 'Update division succesfully!');
    }
}
