<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materials extends Model
{
    use HasFactory;
    protected $table = "Materials";
    public $timestamps = false;
    protected $fillable = ['MaterialsID', 'MaterialsName', 'CalculationUnit'];
}
