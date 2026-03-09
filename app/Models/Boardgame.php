<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boardgame extends Model
{
    protected $fillable = ['title', 'price', 'availability', 'author', 'url', 'status', 'created_at', 'updated_at'];
    use HasFactory;

    public function learningClasses() {
        return $this->hasMany(LearningClass::class, 'Boardgame_id');
    }
}