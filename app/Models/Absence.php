<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Absence extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'lecture_id',
        'absence',
        'note'
    ];

    public function user(): BelongsToMany {
        return $this->belongsToMany(User::class);
    }

    public function lecture(): BelongsToMany {
        return $this->belongsToMany(Lecture::class);
    }
}
