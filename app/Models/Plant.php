<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App;

class Plant extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'image',
        'watering',
        'cycle'
    ];

    public function sunlights():BelongsToMany {
        return $this->belongsToMany(Sunlight::class, 'plants_sunlights', 'plant_id', 'sunlight_id');
    }
}
