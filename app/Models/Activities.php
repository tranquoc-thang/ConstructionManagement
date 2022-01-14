<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activities extends Model
{
    use HasFactory;
    protected $table = "Activities";
    public $timestamps = false;
    protected $fillable = ['ActivityID', 'ProjectTypeID', 'ActivityName'];
}