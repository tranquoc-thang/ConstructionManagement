<?php

namespace App\Http\Controllers;
use App\Models\Employees;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class EmployeesController extends Controller
{
		public function __construct() {
			$this->middleware('auth');
		}

    public function index() {
        $employees = Employees::orderby('EmployeeID','DESC')->paginate(5);
        $position = Position::all();
        $totalEmployees = Employees::all();

        if(request()->dataTable_length) {
            $employees = Employees::orderby('EmployeeID','DESC')->paginate(request()->dataTable_length);
        }

        if(request()->search) {
            $employees = Employees::where('EmployeeName','like','%'.request()->search.'%')
                                ->orwhere('EmployeeID','like','%'.request()->search.'%')
								->orwhere('Phone','like','%'.request()->search.'%')
								->orwhere('Gender','like','%'.request()->search.'%')
                                ->orderby('EmployeeID','DESC')
                                ->paginate(5);
        }

        return view('employee', compact('employees', 'position', 'totalEmployees'));
    }

    public function show($id) {
        $record = Employees::where('EmployeeID', $id)->first();
        $positionRecord = Position::where('PositionID', $record->PositionID)->first();
        return view('employeedetail', compact('record', 'positionRecord'));
    }

    public function insert(Request $request)
    {
			if(Auth::user()->level == 3) {
					return redirect()->back();
			}
			$messages = [
				'name.required' => 'You need to enter Employee Name',
				'gender.required' => 'You need to select Gender',
				'birth.required' => 'You need to enter Birth Day',
				'address.required' => 'You need to enter Address',
				'phone.required' => 'You need to enter Phone',
				'email.required' => 'You need to enter Email',
				'position.required' => 'You need to select Position',
    	];
    	$controls = [
    		'name' => 'required',
    		'gender' => 'required',
    		'birth' => 'required',
    		'address' => 'required',
    		'phone' => 'required|numeric',
    		'email' => 'required',
    		'position' => 'required',
    	];
    	$validator = Validator::make($request->all(), $controls, $messages);
    	$validator->validate();

        $filename = "";
    	if($request->file('inputFile'))
    	{
    		$filename = $request->inputFile->getClientOriginalName();
    		$request->inputFile->move('images/', $filename);
    	}
        $employees = Employees::create([
    		'EmployeeName'=>$request->name,
    		'Gender'=>$request->gender,
    		'BirthDate'=>$request->birth,
    		'Address'=>$request->address,
    		'Phone'=>$request->phone,
    		'Email'=>$request->email,
    		'PositionID'=>$request->position,
    		'Picture'=>$filename
    	]);
        return redirect()->route('employeelist')->with('success', 'Add employee succesfully!');
    }
    
    public function delete($id)
    {
			if(Auth::user()->level == 3 || Auth::user()->level == 2) {
					return redirect()->back();
			}
    	$record = Employees::where('EmployeeID', $id)->first();
    	Employees::where('EmployeeID', $id)->delete();
    	return redirect()->route('employeelist')->with('success', 'Remove employee succesfully!');
    }

    public function update(Request $request, $id)
    {
			if(Auth::user()->level == 3) {
					return redirect()->back();
			}
			$messages = [
				'name.required' => 'You need to enter Employee Name',
				'gender.required' => 'You need to select Gender',
				'birth.required' => 'You need to enter Birth Day',
				'address.required' => 'You need to enter Address',
				'phone.required' => 'You need to enter Phone',
				'email.required' => 'You need to enter Email',
				'position.required' => 'You need to select Position',
    	];
    	$controls = [
    		'name' => 'required',
    		'gender' => 'required',
    		'birth' => 'required',
    		'address' => 'required',
    		'phone' => 'required|numeric',
    		'email' => 'required',
    		'position' => 'required',
    	];
    	$validator = Validator::make($request->all(), $controls, $messages);
    	$validator->validate();

        $filename = "";
    	if($request->file('inputFile'))
    	{
    		$filename = $request->inputFile->getClientOriginalName();
    		$request->inputFile->move('images/', $filename);
    	}

        $employees = Employees::where('EmployeeID', $id)
        ->update([
            'EmployeeName'=>$request->name,
            'Gender'=>$request->gender,
            'BirthDate'=>$request->birth,
            'Address'=>$request->address,
            'Phone'=>$request->phone,
            'Email'=>$request->email,
            'PositionID'=>$request->position,
            'Picture'=>$filename
        ]);
    	return redirect()->route('employeelist')->with('success', 'Update employee succesfully!');
    }

    public function edit($id)
    {
			if(Auth::user()->level == 3) {
					return redirect()->back();
			}
    	$record = Employees::where('EmployeeID', $id)->first();
    	$position = Position::all();
    	return view('editemployee', compact('record', 'position'));
    }
}
