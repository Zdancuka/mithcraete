<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $table = 'characters';
    protected $fillable = [
        'name',
        'level',
        'race_id',
        'class_id',
        'user_id',
        'description',
        'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function race()
    {
        return $this->belongsTo(Race::class);
    }

    public function class()
    {
        return $this->belongsTo(GameClass::class, 'class_id');
    }

    public function spells()
    {
        return $this->belongsToMany(Spell::class);
    }

}
