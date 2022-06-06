<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BoardMember extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        "member_id",
        "selected_on", //date
        "position",
        "fb",
        "twitter",
        "telegram",
    ];

    public function member(){
        return $this->belongsTo(Member::class);
    }
}
