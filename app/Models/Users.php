<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Message;
use App\Models\Users;

class Users extends Model
{
    use HasFactory;

    protected $table = 'users';
    // protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public function message()
    {
        return $this->hasMany(Message::class,'user_id');
    }
    
}
