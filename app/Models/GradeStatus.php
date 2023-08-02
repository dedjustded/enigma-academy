<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GradeStatus extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'homework_id',
        'has_homework',
        'not_works',
        'on_time',
        'grade'
    ];

    public function homework(): BelongsToMany {
        return $this->belongsToMany(Homework::class, 'grade_statuses');
    }

    public function user(): BelongsToMany {
        return $this->belongsToMany(User::class, 'grade_statuses');
    }
}
