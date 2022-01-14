<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = "Project";
    public $timestamps = false;
    protected $fillable = ['ProjectID', 'ProjectName', 'EmployeeID', 'Location', 'StartDate', 'EndDate', 
                            'no_Worker', 'Cost', 'Descriptions', 'Picture', 'ProjectTypeID', 'Status'];

}
