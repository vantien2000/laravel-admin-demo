<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Users;

class Message extends Model
{
    use HasFactory;

    protected $table = 'messages';

    protected $fillable = [
        'id','body','user_id','created_at'
    ];

    public function users(){
        return $this->belongsTo(Users::class,'user_id','id');
    } 
}
