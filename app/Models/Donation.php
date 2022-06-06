<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Donation extends Model
{
    use SoftDeletes;

    protected $fillable = [
        "member_id", //paid by
        "obituary_id",
        "amount",
        "on",
        "orderID"
    ];

    protected $casts = [
        'on' => 'datetime:d M Y',
    ];

    protected $hidden = [
        'deleted_at',
    ];


    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function obituary()
    {
        return $this->belongsTo(Obituary::class);
    }

    public function scopeCurrentUser($query)
    {
        logger("Test Scope");
        dd(request()->all(), $query);
        return $query->where('unpaid', 1);
    }
}
