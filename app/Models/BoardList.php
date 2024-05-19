<?php

namespace App\Models;

use WendellAdriel\Lift\Lift;
use Illuminate\Database\Eloquent\Model;
use WendellAdriel\Lift\Attributes\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

#[HasMany(Card::class)]
class BoardList extends Model
{
    use HasFactory, Lift;
}
