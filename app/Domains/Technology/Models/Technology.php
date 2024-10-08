<?php

namespace App\Domains\Technology\Models;

use App\Domains\Relation\UserTechnologies\Models\UserTechnologies;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Technology extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['image', 'name', 'status'];

    public $incrementing = false;

    protected $keyType = 'string';

    public static function boot(): void
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = Str::uuid();
        });
    }

    public function user_technologies(): HasMany
    {
        return $this->hasMany(UserTechnologies::class);
    }
}
