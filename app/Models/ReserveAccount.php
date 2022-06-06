<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReserveAccount extends Model
{
    protected $fillable = [
        "type", //application_fee, 5_percent_dropouts_adjustment,
        "username",
        "amount",
        "transaction_ref" 
    ];
}
