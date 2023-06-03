<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App;

class Sunlight extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function plants():BelongsToMany {
        return $this->belongsToMany(Plant::class, 'plants_sunlights', 'sunlight_id','plant_id');
    }
}
