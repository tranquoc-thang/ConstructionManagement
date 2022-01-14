<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees_Project extends Model
{
    use HasFactory;
    protected $table = "Employees_Project";
    public $timestamps = false;
    protected $fillable = ['EmployeeID', 'ProjectID', 'StartDate', 'DayWorking', 'Total'];
}
