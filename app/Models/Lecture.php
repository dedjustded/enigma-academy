<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lecture extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function module(): BelongsTo {
        return $this->belongsTo(Module::class);
    }

    public function homework(): HasMany {
        return $this->hasMany(Homework::class);
    }

    public function absence(): HasMany {
        return $this->hasMany(Absence::class);
    }

    
}