<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Homework extends Model
{
    use HasFactory;
    protected $fillable = [
        'lecture_id',
        'name',
        'description'
    ];
    public function lecture(){
        return $this->belongsTo(Lecture::class);
    }
     public function task(){
        return $this->hasMany(Task::class);
     }
     public function gradeStatus(): HasMany {
        return $this->hasMany(GradeStatus::class, 'homework_id');
    }
}