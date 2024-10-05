<?php

namespace App\Domains\Experience\Models;

use App\Domains\RoleSoftware\Models\RoleSoftware;
use App\Domains\User\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Experience extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'role_software_id',
        'company_name',
        'job_title',
        'job_description',
        'level',
        'is_current',
        'start_date',
        'end_date',
        'status',
    ];

    public static array $levels = ['intern', 'fresher', 'junior', 'middle', 'senior', 'expert'];

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
