<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];
    protected $table = 'races';

    public function characters()
    {
        return $this->hasMany(Character::class);
    }
}
