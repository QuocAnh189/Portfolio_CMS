<?php

namespace App\Domains\Project\Models;

use App\Domain\Feature\Models\Feature;
use App\Domains\Category\Models\Category;
use App\Domains\Link\Models\Link;
use App\Domains\ProjectGallery\Models\ProjectGallery;
use App\Domains\Relation\Models\ProjectTools;
use App\Domains\Technology\Models\Technology;
use App\Domains\User\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    public $incrementing = false;

    protected $keyType = 'string';

    public static function boot(): void
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = Str::uuid();
        });
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function features(): HasMany
    {
        return $this->hasMany(Feature::class);
    }

    public function project_galleries(): HasMany
    {
        return $this->hasMany(ProjectGallery::class);
    }

    public function project_technologies(): HasMany
    {
        return $this->hasMany(Technology::class);
    }

    public function links(): HasMany
    {
        return $this->hasMany(Link::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
