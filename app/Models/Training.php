<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;
    protected $fillable =['course_name', 'description', 'schedule_from', 'schedule_to'];

    public function module()
    {
        return $this->hasMany(Module::class);
    }

    public function user(){
        return $this->belongsToMany(User::class, 'training_student', 'training_id', 'user_id');
    }
}