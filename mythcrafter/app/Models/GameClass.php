<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GameClass extends Model
{
    protected $table = 'game_classes';

    protected $fillable = ['name', 'description', 'hit_dice', 'abilities'];
    // Add a relationship: A GameClass has many Characters
    public function characters()
    {
        return $this->hasMany(Character::class, 'class_id');
    }
}

// This model represents a game class in the application.

