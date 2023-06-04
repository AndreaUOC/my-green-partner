<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlantSunlight extends Model
{
    use HasFactory;

    protected $table = 'plants_sunlights'; 

    protected $fillable = [
        'plant_id',
        'sunlight_id' 
    ];
}
