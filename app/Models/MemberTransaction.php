<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberTransaction extends Model
{
    protected $fillable = [
        'member_id',
        'amount',
        'transaction_ref'
    ];

    public function member(){
        return $this->belongsTo(Member::class);
    }
}
