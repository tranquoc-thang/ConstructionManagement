<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectType extends Model
{
    protected $table = "ProjectType";
    public $timestamps = false;
    protected $fillable = ['ProjectTypeID', 'ProjectTypeName'];
    use HasFactory;
}
