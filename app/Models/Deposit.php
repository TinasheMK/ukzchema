<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    protected $fillable = [
        "member_id",
        "payment_ref",
        "amount",
        "date",
        "invoice_id",
        "type",
        "balance"
    ];
}
