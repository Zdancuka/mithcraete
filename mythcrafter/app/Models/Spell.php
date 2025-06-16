<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Spell extends Model
{
    protected $fillable = [
        'name',
        'level',
        'casting_time',
        'components',
        'description',
        'school',
    ];

    public function characters()
    {
        return $this->belongsToMany(Character::class);
    }
}
