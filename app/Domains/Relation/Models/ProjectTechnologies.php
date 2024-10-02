<?php

namespace App\Domains\Relation\Models;

use App\Domains\Project\Models\Project;
use App\Domains\RoleSoftware\Models\Tool;
use App\Domains\Technology\Models\Technology;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class ProjectTechnologies extends Model
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

    public function technology(): BelongsTo
    {
        return $this->belongsTo(related: Technology::class);
    }
}
