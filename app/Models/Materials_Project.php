<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materials_Project extends Model
{
    use HasFactory;
    protected $table = "Materials_Project";
    public $timestamps = false;
    protected $fillable = ['ProjectID', 'MaterialsID', 'Quantity', 'Price', 'Total'];
}
