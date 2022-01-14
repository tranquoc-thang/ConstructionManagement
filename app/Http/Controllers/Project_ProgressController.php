<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project_Progress;
use Illuminate\Support\Facades\Auth;

class Project_ProgressController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function update($id) {
        Project_Progress::where('ProjectID', $id)
                        ->where('ActivityID', request()->activityid)
                        ->update([
                            'Progress' => request()->progress,
                        ]);
        return redirect()->back()->with('success', 'Update progress succesfully!');
    }
}
