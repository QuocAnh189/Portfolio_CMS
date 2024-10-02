<?php

namespace App\Domains\Relation\Models;

use App\Domains\Project\Models\Project;
use App\Domains\RoleSoftware\Models\Tool;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class ProjectTools extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $keyType = 'string';

    public static function boot(): void
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = Str::uuid();
        });
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function tool(): BelongsTo
    {
        return $this->belongsTo(Tool::class);
    }
}
