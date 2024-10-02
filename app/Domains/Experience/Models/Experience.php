<?php

namespace App\Domains\Experience\Models;

use App\Domains\RoleSoftware\Models\RoleSoftware;
use App\Domains\User\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Experience extends Model
{
    use HasFactory;

    public static array $levels = ['intern', 'fresher', 'middle', 'junior', 'senior', 'expert'];

    public $incrementing = false;

    protected $keyType = 'string';

    public static function boot(): void
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = Str::uuid();
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function role_software(): BelongsTo
    {
        return $this->belongsTo(RoleSoftware::class);
    }
}
