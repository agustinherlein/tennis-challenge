<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = ['name', 'gender_id', 'skill', 'strength', 'speed', 'reaction'];
}
