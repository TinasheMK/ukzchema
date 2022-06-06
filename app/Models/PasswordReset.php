<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    protected $fillable = [
        "user_id",
        "token",
        "used"
    ];

    public function tokenExpired(){
        return $this->created_at->addDay() < now();
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
