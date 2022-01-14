<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Position;
use Illuminate\Support\Facades\Auth;

class PositionController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->level == 3) {
            return redirect()->back();
        }

        $position = Position::orderby('PositionID','DESC')->paginate(5);
        if(request()->dataTable_length) {
            $position = Position::orderby('PositionID','DESC')->paginate(request()->dataTable_length);
        }
        $totalPosition = Position::all();
        if(request()->search) {
            $position = Position::where('PositionName','like','%'.request()->search.'%')
                                ->orwhere('Salary','like','%'.request()->search.'%')
                                ->orderby('PositionID','DESC')
                                ->paginate(5);
        }
        return view('position', compact('position', 'totalPosition'));
    }

    public function insertPosition(Request $request)
    {
        if(Auth::user()->level == 3) {
            return redirect()->back();
        }

        $messages = ['positionname.required'=>'Please enter the Position',
                     'salary.required'=>'Please enter Daily Rate',
                     'salary.min'=> 'The salary at least 10$',
                     'salary.max'=> 'The salary must not be greater than 10.000$'                     
                    ];
        $controls =['positionname'=>'required', 
                    'salary'=>'required|numeric|min:10|max:10000',];                    
    	
    	$validator = Validator::make($request->all(), $controls, $messages);
    	$validator->validate();

        $position = Position::create([
    		'PositionName'=>$request->positionname,
    		'Salary'=>$request->salary
    	]);
        return redirect()->route('positionlist')->with('success', 'Add position succesfully!');
    }

    public function delPosition($id)
    {
        if(Auth::user()->level == 3 || Auth::user()->level == 2) {
            return redirect()->back();
        }
    	$record = Position::where('PositionID', $id)->first();
    	Position::where('PositionID', $id)->delete();
    	return redirect()->route('positionlist')->with('success', 'Remove position succesfully!');
    }

    public function editPosition($id)
    {
        if(Auth::user()->level == 3 || Auth::user()->level == 2) {
            return redirect()->back();
        }
    	$record = Position::where('PositionID', $id)->first();
    	return view('editposition', compact('record'));
    }

    public function updatePosition(Request $request, $PositionID)
    {
        if(Auth::user()->level == 3 || Auth::user()->level == 2) {
            return redirect()->back();
        }
        $messages = ['positionname.required'=>'Please enter the Position',
        'salary.required'=>'Please enter Daily Rate',
        'salary.min'=> 'The salary at least 10$',
        'salary.max'=> 'The salary must not be greater than 10.000$'                    
       ];

        $controls =['positionname'=>'required', 
            'salary'=>'required|numeric|min:10|max:10000',];

        $validator = Validator::make(request()->all(),$controls, $messages);
        $validator->validate();

        // edit - update
        if(request()->positionname && request()->salary) {
            $position = Position::where('PositionID', $PositionID)
            ->update(
                ['PositionName' => request()->positionname,
                'Salary' => request()->salary],
            );
        }
    	return redirect()->route('positionlist')->with('success', 'Update position succesfully!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PositionController  $positionController
     * @return \Illuminate\Http\Response
     */
    public function show(PositionController $positionController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PositionController  $positionController
     * @return \Illuminate\Http\Response
     */
    public function edit(PositionController $positionController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PositionController  $positionController
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PositionController $positionController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PositionController  $positionController
     * @return \Illuminate\Http\Response
     */
    public function destroy(PositionController $positionController)
    {
        //
    }
}