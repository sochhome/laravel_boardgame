<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearningClass extends Model
{
    /** @use HasFactory<\Database\Factories\LearningClassFactory> */
    use HasFactory;
    
    protected $fillable = ['name', 'instructor', 'description', 'location', 
    'start_time', 'duration', 'hourly_price'];

    public function boardgame() {
        return $this->belongsTo(Boardgame::class, 'Boardgame_id');
    }
    
}
