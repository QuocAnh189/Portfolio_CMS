<?php

namespace App\Domains\Education\Models;

use App\Domains\Major\Models\Major;
use App\Domains\User\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Education extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'major_id',
        'gpa',
        'logo',
        'university_name',
        'description',
        'degree',
        'start_date',
        'end_date',
        'status',
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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function major(): BelongsTo
    {
        return $this->belongsTo(Major::class);
    }
}
