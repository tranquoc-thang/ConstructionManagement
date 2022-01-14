<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;
    protected $table = "Employees";
    public $timestamps = false;
    protected $fillable = ['EmployeeID', 'EmployeeName', 'Gender', 'BirthDate', 'Address', 'Phone', 'Email', 'PositionID', 'Picture'];
}
