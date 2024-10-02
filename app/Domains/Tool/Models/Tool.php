<?php

namespace App\Domains\RoleSoftware\Models;

use App\Domains\Relation\Models\ProjectTools;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Tool extends Model
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

    public function project_tools(): HasMany
    {
        return $this->hasMany(ProjectTools::class);
    }
}
