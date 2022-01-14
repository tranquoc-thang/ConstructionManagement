<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project_Progress extends Model
{
    use HasFactory;
    protected $table = "Project_Progress";
    public $timestamps = false;
    protected $fillable = ['ProjectID', 'ActivityID', 'ProjectTypeID', 'Progress'];
}
