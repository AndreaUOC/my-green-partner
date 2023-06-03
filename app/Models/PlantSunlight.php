<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlantSunlight extends Model
{
    use HasFactory;

    protected $table = 'plants_sunlights'; //El nombre de la tabla es diferente al que busca el modelo

    protected $fillable = [
        'plant_id',
        'sunlight_id' 
    ];
}
