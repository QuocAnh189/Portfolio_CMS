<?php

namespace App\Domains\Profile\Models;

use App\Domains\RoleSoftware\Models\RoleSoftware;
use App\Domains\User\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Profile extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'resume_link',
        'avatar',
        'fullname',
        'contact_number',
        'bio',
        'role_software_id',
        'facebook_link',
        'github_link',
        'youtube_link',
        'instagram_link',
    ];

    public $incrementing = false;

    protected $keyType = 'string';

    public static function boot(): void
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = Str::uuid();
        });
    }

    public function role_software(): BelongsTo
    {
        return $this->belongsTo(RoleSoftware::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
