<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Role extends Model
{
    use HasFactory;
    public const ROLE_ADMIN = 'admin';
    public const ROLE_TEACHER = 'teacher';
    public const ROLE_EMPLOYEER = 'employeer';
    public const ROLE_STUDENT = 'student';
    public const ROLE_USER = 'user';

   protected $fillable = [
    'id',
    'name'
   ];
   public function user(){
    return $this->belongsTo(User::class);
   }
}
