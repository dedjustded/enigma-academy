<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'phone',
        'country',
        'city',
        'language',    
        'repository',   
        'info',
        'link',
        'web_page_name',
        'messenger_name',
        'hoby',
        'skils'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
