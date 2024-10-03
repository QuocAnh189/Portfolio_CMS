<?php

namespace App\Domains\User\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Domains\Experience\Models\Experience;
use App\Domains\Profile\Models\Profile;
use App\Domains\Project\Models\Project;
use App\Domains\Relation\Models\UserTechnologies;
use App\Domains\Technology\Models\Skill;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public static function boot(): void
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = Str::uuid();
        });
    }

    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    public function skills(): HasMany
    {
        return $this->hasMany(Skill::class);
    }

    public function user_technologies(): HasMany
    {
        return $this->hasMany(UserTechnologies::class);
    }

    public function experiences(): HasMany
    {
        return $this->hasMany(Experience::class);
    }
}
