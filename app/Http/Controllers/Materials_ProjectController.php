<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materials_Project;
use Illuminate\Support\Facades\Auth;

class Materials_ProjectController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function update($ProjectID) {
        $id = request()->id;
        $name = request()->name;
        $rate = request()->rate;
        $quantity = request()->quantity;
        $total = request()->total;

        for($i = 0; $i < count($rate); $i++) {
            Materials_Project::where('ProjectID', $ProjectID)
                             ->where('MaterialsID', $id[$i])
                             ->update(
                                ['Quantity' => $quantity[$i],
                                'Price' => $rate[$i],
                                'Total' => $total[$i]]
                             );
        }
        return redirect()->back()->with('success', 'Update materials succesfully!');
    }
}
