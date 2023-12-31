<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'details'];
    public function training() {
        return $this->belongsTo(Training::class);
    }

    public function lecture() {
        return $this->hasMany(Lecture::class);
    }
}
