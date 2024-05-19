<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Str;
use WendellAdriel\Lift\Lift;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use WendellAdriel\Lift\Attributes\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;

#[BelongsTo(Directorate::class)]
#[BelongsTo(Position::class)]
#[BelongsTo(Role::class)]
class User extends Authenticatable
{
    use HasFactory, HasRoles, Lift, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function getImageAttribute()
    {
        $string = $this->name;
        $words = explode(" ", $string);

        $firstLetters = array_map(function($word) {
            return Str::ucfirst($word[0]);
        }, $words);

        $result = implode("", $firstLetters);
        if(!$this->avatar){
            return $result;
        }else{
            return asset('storage/' . $this->avatar);
        }
    }
}
