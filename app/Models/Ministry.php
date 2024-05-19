<?php

namespace App\Models;

use WendellAdriel\Lift\Lift;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ministry extends Model
{
    use HasFactory, Lift;

    public function getImageAttribute()
    {
        return asset('storage/' . $this->thumbnail);
    }
}
