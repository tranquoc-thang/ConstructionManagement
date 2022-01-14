<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;
use App\Models\User;
use App\Models\Project;
use App\Models\Position;
use App\Models\Employees_Project;
use App\Models\Materials_Project;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $employee = Employees::all();
        $topproject = Project::orderby('Cost', 'DESC')->paginate(5);
        $project = Project::all();
        $user = User::all();
        $position = Position::all();
        $material_project = Materials_Project::all();
        $employee_project = Employees_Project::all();
        return view('dashboard', compact('employee', 'project', 'user', 'position', 'material_project', 'topproject', 'employee_project'));
    }
}
