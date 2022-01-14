<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        if(Auth::user()->level == 2 || Auth::user()->level == 3) {
            return redirect()->back();
        }

        $user = User::orderby('id','DESC')->paginate(5);
        if(request()->dataTable_length) {
            $user = User::orderby('id','DESC')->paginate(request()->dataTable_length);
        }
        $totalUser = User::all();
        if(request()->search) {
            $user = User::where('name','like','%'.request()->search.'%')
                                ->orwhere('email','like','%'.request()->search.'%')
                                ->orderby('id','DESC')
                                ->paginate(5);
        }
        return view('user', compact('user', 'totalUser'));
    }

    public function insert(Request $request) {
        if(Auth::user()->level == 2 || Auth::user()->level == 3) {
            return redirect()->back();
        }
        $messages = [
            'name.required' => 'You need to enter Name',
            'name.max' => 'Name is to long (maximum is 20 characters)',
            'email.required' => 'You need to enter Email',
            'email.email' => 'Email invalidate',
            'email.max' => 'Email is to long (maximum is 50 characters)',
            'email.unique' => 'Email is already exists',
            'password.required' => 'You need to enter Pass Word',
            'password.min' => 'Pass Word must be 6-20 characters',
            'password.max' => 'Pass Word must be 6-20 characters',
            'password.confirmed' => 'The password confirmation does not match',
            'level.required' => 'You need to select Role',
    	];
    	$controls = [
    		'name' => 'required|max:20',
    		'email' => 'required|email|max:50|unique:users',
    		'password' => 'required|min:6|max:20|confirmed',
    		'level' => 'required',
    	];
    	$validator = Validator::make($request->all(), $controls, $messages);
    	$validator->validate();

        $user = User::create([
    		'name'=>$request->name,
    		'email'=>$request->email,
    		'password'=>bcrypt($request->password),
    		'level'=>$request->level
    	]);

        return redirect()->route('userlist')->with('success', 'Add user succesfully!');
    }

    public function delete($id)
    {
        if(Auth::user()->level == 2 || Auth::user()->level == 3) {
            return redirect()->back();
        }
    	$record = User::where('id', $id)->first();
    	User::where('id', $id)->delete();
    	return redirect()->route('userlist')->with('success', 'Remove user succesfully!');
    }

    public function edit($id)
    {
        if(Auth::user()->level == 2 || Auth::user()->level == 3) {
            return redirect()->back();
        }
    	$record = User::where('id', $id)->first();
    	return view('edituser', compact('record'));
    }

    public function update(Request $request, $id)
    {
        if(Auth::user()->level == 2 || Auth::user()->level == 3) {
            return redirect()->back();
        }
        $messages = [
            'name.required' => 'You need to enter Name',
            'name.max' => 'Name is to long (maximum is 20 characters)',
            'email.required' => 'You need to enter Email',
            'email.email' => 'Email invalidate',
            'email.max' => 'Email is to long (maximum is 50 characters)',
            'email.unique' => 'Email is already exists',
            'password.required' => 'You need to enter Pass Word',
            'password.min' => 'Pass Word must be 6-20 characters',
            'password.max' => 'Pass Word must be 6-20 characters',
            'password.confirmed' => 'The password confirmation does not match',
            'level.required' => 'You need to select Role',
    	];
    	$controls = [
    		'name' => 'required|max:20',
    		'email' => 'required|email|max:50|unique:users',
    		'password' => 'required|min:6|max:20|confirmed',
    		'level' => 'required',
    	];
    	$validator = Validator::make($request->all(), $controls, $messages);
    	$validator->validate();

        $user = User::where('id', $id)
        ->update(
            ['name' => request()->name,
            'email' => request()->email,
            'password' => bcrypt(request()->password),
            'level' => request()->level],
        );

    	return redirect()->route('userlist')->with('success', 'Update user succesfully!');
    }
}
