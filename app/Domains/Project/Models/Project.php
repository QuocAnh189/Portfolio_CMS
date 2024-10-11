<?php

namespace App\Domains\Project\Models;

use App\Domains\Feature\Models\Feature;
use App\Domains\Category\Models\Category;
use App\Domains\Link\Models\Link;
use App\Domains\ProjectGallery\Models\ProjectGallery;
use App\Domains\Relation\ProjectTechnologies\Models\ProjectTechnologies;
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

    protected $fillable = [
        'user_id',
        'category_id',
        'cover_image',
        'name',
        'description',
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

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function features(): HasMany
    {
        return $this->hasMany(Feature::class)->withTrashed();
    }

    public function project_galleries(): HasMany
    {
        return $this->hasMany(ProjectGallery::class)->withTrashed();;
    }

    public function project_technologies(): HasMany
    {
        return $this->hasMany(ProjectTechnologies::class)->withTrashed();;
    }

    public function links(): HasMany
    {
        return $this->hasMany(Link::class)->withTrashed();;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
