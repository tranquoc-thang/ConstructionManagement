<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    protected $table = "Position";
    public $timestamps = false;
    protected $fillable = ['PositionID', 'PositionName', 'Salary'];
    // public function Category() {
    // 	return $this->hasMany(Employees::class, "PositionID", "PositionID");
    // }
}
